<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\EmployeeRequest;
use biox2020\User;
use biox2020\Employee;


class EmployeeController extends Controller
{
    
    // Funcion para mostrar la tabla de Trabajadores
    public function index(){
        return view('adminviews.employees.index');
    }

    // Funcion para Consultar Datos de la Tabla Employees
    public function indexApi(){
        return datatables(Employee::query())
        ->setRowClass('filasTable')
        ->editColumn('slugTrabajador','adminviews.employees.actions')
        ->rawColumns(['slugTrabajador'])
        ->toJson();
    }

    // Funcion para Mostrar Formulario
    public function create(){
        return view('adminviews.employees.create');
    }

    // Funcion para guardar Datos en la Base de datos
    public function store(EmployeeRequest $request){
        Employee::guardarTrabajador($request);
        return redirect(route('admin.employees.index'));
    }

    // Funcion para mostrar informacion del Trabajador
    public function show($slug){ 
        $trabajador = Employee::verTrabajador($slug);
        return view('adminviews.employees.show', compact('trabajador'));
    }

    // Funcion para mostrar Formulario con Datos del trabajador
    public function edit($slug){
        $trabajador = Employee::verTrabajador($slug);
        return view('adminviews.employees.edit', compact('trabajador'));
    }

    public function update(Request $request){
        // Validando datos del Formulario
        $request->validate([
            'nombres'           => 'required',
            'apellido_paterno'  => 'required',
            'apellido_materno'  => 'required',
            'telefono'          => 'required',
            'direccion'         => 'required',
            'sexo'              => 'required',
            'dni'               => 'required',
            'correo'            => 'required'
        ]);

        Employee::actualizarTrabajador($request);
        return redirect(route('admin.employees.index'));
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroTrabajadores(){
        $numero_trabajadores = Employee::count();

        return $numero_trabajadores;
    }
}