<?php

namespace biox2020\Http\Controllers\Socio;

use Illuminate\Http\Request;
use biox2020\Http\Controllers\Controller;

use biox2020\Http\Requests\InscriptionPartnerRequest;
use biox2020\Http\Requests\Multinivel\InscriptionPartnerSimpleRequest;
use biox2020\Http\Requests\Multinivel\InscriptionPartnerPackageRequest;
use biox2020\Http\Requests\Multinivel\InscriptionPartnerFreeRequest;

use biox2020\Product;
use biox2020\Inscription;
use biox2020\Package;
use biox2020\Partner;

use Illuminate\Support\Facades\Mail;
use biox2020\Mail\MensajeEnviado;

class InscriptionController extends Controller
{
    // Array con los sexos para las NUEVAS inscripciones
    protected $sexos = ['masculino', 'femenino'];

    // Constructor para verificar que el usuario este logueado en el sistema
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Funcion para OBTENER INFORMACION DEL SOCIO LOGUEADO
    private function socioLoguedo()
    {
        $socio = Auth()->user()->Socio;
        // STRTPUPPER - Transforma un string A mayusciula
        $patrocinador = strtoupper($socio->nombresSocio . ' ' . $socio->apellidoPaternoSocio . ' ' . $socio->apellidoMaternoSocio);
        return $patrocinador;
    }

    // Funcion para Consultar DATOS DE LA TABLA INSCRIPTIONS
    public function listInscriptions()
    {
        $slug_socio = Auth()->user()->Socio->slugSocio;
        return Inscription::listaInscripciones($slug_socio);
    }

    // Funcion para mostrar TABLA INSCRIPCIONES
    public function index()
    {
        return view('partnerviews.inscriptions.list-inscriptions');
    }

    // Funcion para enlistar Socios Directos del Usuario Logueado - Listo!
    // public function directPartners(){
    //     $slug_socio = Auth()->user()->Socio->slugSocio;
    //     $sociosDirectos = Partner::sociosDirectos($slug_socio);
    //     return view('partnerviews.inscriptions.directPartners', compact('sociosDirectos'));
    // }

    // Funcion para mostrar una vista de OPCIONES DE INSCRIPCION - Listo!
    public function typeInscription()
    {
        return view('partnerviews.inscriptions.type-inscription');
    }

    // Inscripcion POR SIMPLE - GRATIS ===========================================================
    public function createSimple()
    {
        $patrocinador = $this->socioLoguedo();
        $sexos = $this->sexos;
        return view('partnerviews.inscriptions.create-simple', compact('patrocinador', 'sexos'));
    }
    public function storeSimple(InscriptionPartnerSimpleRequest $request)
    {
        $credenciales = Inscription::guardarSocioSimple($request);

        // dd($request);
        
        Mail::to($request->correo_electronico)->queue(new MensajeEnviado($credenciales));

        // return 'Correo enviado';
        return redirect(route('partner.inscriptions.index'));
    }

    // Inscripcion POR PAQUETE ================================================================
    public function createPackage()
    {
        $patrocinador = $this->socioLoguedo();
        $sexos = $this->sexos;
        $paquetes = Package::all();
        return view('partnerviews.inscriptions.create-package', compact('patrocinador', 'sexos', 'paquetes'));
    }
    public function storePackage(InscriptionPartnerPackageRequest $request)
    {
        $credenciales = Inscription::guardarSocioPaquete($request);
        Mail::to($request->correo_electronico)->queue(new MensajeEnviado($credenciales));
        return redirect(route('partner.inscriptions.index'));
    }

    // Inscripcion POR ELECCION LIBRE =========================================================
    public function createFree()
    {
        $patrocinador = $this->socioLoguedo();
        $sexos = $this->sexos;
        $paquetes = Package::all();
        $productos = Product::all();
        return view('partnerviews.inscriptions.create-free', compact('productos', 'patrocinador', 'sexos', 'paquetes'));
    }
    public function storeFree(InscriptionPartnerFreeRequest $request)
    {
        $credenciales = Inscription::guardarSocioLibre($request);
        Mail::to($request->correo_electronico)->queue(new MensajeEnviado($credenciales));
        return redirect(route('partner.inscriptions.index'));
    }

    // Funcion para mostrar INSCRIPCION DEL USUARIO
    public function show($slug)
    {
        $inscripcion = Inscription::verInscripcion($slug);

        // Recibiendo DATOS DEL LA CUNSULTA ESPECIAL
        $insDataSocio = $inscripcion[0];
        $insPaquete = $inscripcion[1];
        $insLibre = $inscripcion[2];
        $insDetallesOrden = $inscripcion[3];

        return view('partnerviews.inscriptions.show', compact('insDataSocio', 'insPaquete', 'insLibre', 'insDetallesOrden'));
    }


    // Funcion para mostrar la informacion del Socio
    // public function showMyPartner($slug){
    //     $misocio =  Partner::verMiSocio($slug);
    //     return view('partnerviews.inscriptions.show-my-partner',compact('misocio'));
    // }


    //Funciones Especiales para JAVASCRIPT ========================================================
    // Funcion para obtener los PAQUETES PARA EL FORMULARIO DE REGISTRO
    public function paquetesParaInscripcion($id)
    {
        $paquete = Package::informacionPaqueteParaInscripcion($id);
        return $paquete;
    }

    // Funcion para OBTENER EL NUMERO DE REGISTRO DEL SOCIO
    public function numeroInscripciones()
    {
        $socio = Auth()->user()->socio->id;
        $res = Inscription::where('partners_id', $socio)->count();
        return $res;
    }
}
