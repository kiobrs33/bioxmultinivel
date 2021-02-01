<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;

use biox2020\Price;
use biox2020\Stock;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'codigoProducto',
        'nombreProducto',
        'descripcionProducto',
        'puntosProducto',
        'precioProducto',
        'tipoUnidadProducto',
        'urlImagenProducto',
        'slugProducto',
        'categories_id'
    ];
    
    // Funcion para GUARDAR EL NUEVO PRODUCTO
    public static function guardarProducto($request){
        // TRANSACTION controla cualquier error que se genere aL GUARDAR DATOS
        DB::transaction(function() use($request){
            $producto = Product::create([
                'codigoProducto'        => $request->codigo,
                'nombreProducto'        => $request->nombre,
                'descripcionProducto'   => $request->descripcion,
                'precioProducto'        => $request->precio,
                'puntosProducto'        => $request->puntos,
                'tipoUnidadProducto'    => $request->tipo_unidad,
                'urlImagenProducto'     => $request->url_imagen,
                'slugProducto'          => str_random(10),
                'categories_id'         => $request->categoria,
            ]);
            foreach ($request->almacen as $position => $value) {
                Stock::create([
                    'cantidadStock' => $request->cantidad[$position],
                    'products_id'   => $producto->id,
                    'warehouses_id' => $request->almacen[$position]
                ]);
            }
        });
    }

    // Funcion para ver informacion del PRODUCTO
    public static function verProducto($slug){
        //Esta consulta contiene INFORMACION DE LA TABLAS PRODUCTOS Y CATEGORIA
        $data1 = DB::table('products as p')
                ->join('categories as c','c.id','=','p.categories_id')
                ->select('p.*','c.nombreCategoria as categoriaProducto','c.id as categoria_id')
                ->where('p.slugProducto','=',$slug)
                ->get();

        //Esta consulta contiene INFORMACION DE LOS ALAMACENES EN LA QUE ESTA EL PRODUCTO
        $data2 = DB::table('stocks as s')
                ->join('products as p','s.products_id','=','p.id')
                ->join('warehouses as w','s.warehouses_id','=','w.id')
                ->select('s.cantidadStock','w.nombreAlmacen','w.tipoAlmacen')
                ->where('s.products_id','=',$data1[0]->id)
                ->get();

        return array("producto"=>$data1, "stocks"=>$data2);
    }

    // FUNCION - EN DESUSO
    public static function actualizarProducto($request){
        
        DB::transaction(function() use($request){

            $producto = Product::create([
                'codigo'            => $request->codigo_producto,
                'nombre_producto'   => $request->nombre_producto,
                'descripcion'       => $request->descripcion_producto,
                'tipo_unidad'       => $request->tipo_unidad_producto,
                'url_imagen'        => $request->url_imagen_producto,
                'slug'              => str_random(10),
                'categories_id'     => $request->categoria_id_producto,
            ]);

            foreach ($request->nombre_precio_producto as $position => $value) {
                Price::create([
                    'nombre_precio' => $request->nombre_precio_producto[$position],
                    'valor'         => $request->valor_precio_producto[$position],
                    'products_id'   => $producto->id
                ]);
            }

            foreach ($request->almacen_id_producto as $position => $value) {
                Stock::create([
                    'cantidad'      => $request->cantidad_producto[$position],
                    'products_id'   => $producto->id,
                    'warehouses_id' => $request->almacen_id_producto[$position]
                ]);
            }

        });
    }
}