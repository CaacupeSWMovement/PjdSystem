<?php

namespace PJD\Http\Controllers;

use Illuminate\Http\Request;
use PJD\Localidad;
use Illuminate\Support\Facades\Redirect;
use PJD\Http\Requests\LocalidadFormRequest;
use DB;

class LocalidadController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
         if ($request){
         	$query=trim($request->get('searchText'));
         	$localidades=DB::table('localidads')->where('ciudad_parroquia','LIKE','%'.$query.'%')
         	->where('condicion','=','1')
         	->orderBy('id','asc')
         	->paginate(10);
         	return view('localidad/parroquia.index', ['localidades' => $localidades,"searchText"=>$query]);
         }
    }
    public function create() {
		return view("localidad/parroquia.create");
	}
    public function store(LocalidadFormRequest $request) {
		$localidad=new Localidad;
		$localidad->ciudad_parroquia=$request->get('ciudad_parroquia');
		$localidad->condicion='1';
		$localidad->save();
		return Redirect::to('localidad/parroquia');
	}
    public function show($id) {
		 return view("localidad.parroquia.show",["localidad"=>Localidad::findOrFail($id)]);
	}
    public function edit($id) {
    	 return view("localidad.parroquia.edit",["localidad"=>Localidad::findOrFail($id)]);
    }
    public function update(LocalidadFormRequest $request,$id) {
        $localidad=Localidad::findOrFail($id);
        $localidad->ciudad_parroquia=$request->get('ciudad_parroquia');
        $localidad->update();
        return Redirect::to('localidad/parroquia');
    }
    public function destroy($id){
    	$localidad=Localidad::findOrFail($id);
    	$localidad->condicion='0';
    	$localidad->update();
    	return Redirect::to('localidad/parroquia');
    }
}
