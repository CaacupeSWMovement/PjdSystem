<?php

namespace PJD\Http\Controllers;

use Illuminate\Http\Request;
use PJD\Persona;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use PJD\Http\Requests\PersonaFormRequest;
use DB;

class PersonaController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
         if ($request){
            $query=trim($request->get('searchText'));
            $personas=DB::table('personas as p')
            ->join('localidads as l','p.localidads_id','=','l.id')
            ->select('p.id','p.cedula','p.nombre','p.apellido','p.edad','p.remera','p.email','p.foto','p.fotopermiso','p.animador','p.miembrocj','p.dinamizador','p.experiencia','p.zona','p.aprobado','l.ciudad_parroquia as parroquia')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orwhere('p.cedula','LIKE','%'.$query.'%')
            ->orderBy('p.id','asc')
            ->paginate(10);
            return view('inscripcion.index', ['personas' => $personas,"searchText"=>$query]);
         }
    }
    public function create() {
        $parroquias=DB::table('localidads')->where('condicion','=','1')->get();
        return view("inscripcion.create",["parroquias"=>$parroquias]);
    }
    public function store(PersonaFormRequest $request) {
        $persona=new Persona;
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->edad = $request->get('edad'); 
        $persona->remera = $request->get('remera');
        $persona->cedula = $request->get('cedula');
        $persona->email = $request->get('email');
        // se asigna por defecto aprobado 0 osea NO
        $persona->aprobado = 0;
        $persona->localidads_id = $request->input('localidad');
        /*
            ==========otros metodos usados para guardar en carpetas publicas
            ->resize(300,200)->save('storage/app/foto/'.$nombrefoto,60);
            ->fit puede usarse tambien
            $fotomodificada->storeAs('foto', $nombrefoto);
            ===========
            ===========Compresion de imagen
            con intervention image hacemos 'encajar' la imagen en tamaño 
            400 * 400 pixeles sin perder el aspecto de imagen
            y de paso evitar que si la imagen es pequeña no se 
            agrande la imagen
            la imagen es guardada en 'storage/app/fotos'
            el nombre de la imagen es el numero de cedula y todos son codificados a JPG
            =========== 
        */
        //foto del permiso de menor
        if( $request->edad<18 ) {
            $fotopermiso = $fotopermiso= $request->file('fotopermiso');
            $nombrepermiso = 'permiso-'.$request->input('cedula').'.jpg';
            $persona->fotopermiso = $nombrepermiso;
            $fotopermmod = Image::make($fotopermiso)->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            });; 
            $pathpermiso = 'permisos/'.$nombrepermiso;
            Storage::put($pathpermiso, (string) $fotopermmod->encode('jpg',70));
        } else {
            $persona->fotopermiso = 'nulo';
        }
        //foto de la persona
        $foto = $request->file('foto');
        $nombrefoto = $request->input('cedula').'.jpg';
        $persona->foto = $nombrefoto;
        $fotomodificada = Image::make($foto)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });; 
        $path = 'fotos/'.$nombrefoto;
        Storage::put($path, (string) $fotomodificada->encode('jpg',70));
        // comprobar datos de modalidad de participante
        if( $request->input('animador') == "a" ) {
            $persona->animador = 1;
        } else {
            $persona->animador = 0;
        }
        if( $request->input('miembrocj') == "m" ) {
            $persona->miembrocj = 1;
        } else {
            $persona->miembrocj = 0;
        }
        if( $request->input('dinamizador') == "d" ) {
            $persona->dinamizador = 1;
        } else {
            $persona->dinamizador = 0;
        }
        if( $request->input('experiencia') == "1" ) {
            $persona->experiencia = 1;
        } else {
            $persona->experiencia = 0;
        }
        /* ==========Zonas
            asignacion de zonas 1 = A, 2 = B, 3 = C
            revisar la ultima zona asignada y sumarle 1
            en caso que sea 3 el ultimo se asigna 1 
            si el campo es nulo(caso de bd vacia) se asigna 1 (!!!!!!)
        */
        $ultimapersona = Persona::orderBy('id','desc')->first();
        if( $ultimapersona == NULL ) {
            $persona->zona = 1;
        }
        $ultimazona = $ultimapersona['zona'];
        if ( $ultimazona == NULL ) {
            $persona->zona = 1;
        }
        if( $ultimazona < 3 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 4 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 5 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 6 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 7 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 8 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 9 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 10 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 11 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 12 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 13 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 14 ) {
            $persona->zona = $ultimazona+1;
        }
        if( $ultimazona < 15 ) {
            $persona->zona = $ultimazona+1;
        }
        else if( $ultimazona == 15) {
            $persona->zona = 1;
        }
        $persona->save();
        return Redirect::to('inscripcion');
    }
    public function show($id) {
        return view("inscripcion.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id) {
        $persona=Persona::findOrFail($id);
        $parroquias=DB::table('localidads')->where('condicion','=','1')->get();
        return view("inscripcion.edit",["persona"=>$persona,"parroquias"=>$parroquias]);
    }
    public function update(PersonaFormRequest $request,$id) {
        $persona=Persona::findOrFail($id);
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->edad = $request->get('edad'); 
        $persona->remera = $request->get('remera');
        $persona->email = $request->get('email');
        // se asigna por defecto aprobado 0 osea NO
        $persona->aprobado = 0;
        $persona->localidads_id = $request->input('localidad');
        if( $request->input('animador') == "a" ) {
            $persona->animador = 1;
        } else {
            $persona->animador = 0;
        }
        if( $request->input('miembrocj') == "m" ) {
            $persona->miembrocj = 1;
        } else {
            $persona->miembrocj = 0;
        }
        if( $request->input('dinamizador') == "d" ) {
            $persona->dinamizador = 1;
        } else {
            $persona->dinamizador = 0;
        }
        if( $request->input('experiencia') == "1" ) {
            $persona->experiencia = 1;
        } else {
            $persona->experiencia = 0;
        }
        $persona->zona = $request->get('zona'); ;
        $persona->update();
        return Redirect::to('inscripcion');
    }
    public function destroy($id){
        $persona=Persona::findOrFail($id);
        $persona->aprobado='1';
        $persona->update();
        return Redirect::to('inscripcion');
    }
}
