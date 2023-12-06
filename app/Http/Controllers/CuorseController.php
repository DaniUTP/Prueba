<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use mysqli;
use App\Models\Cuorse;
use Illuminate\Support\Facades\Validator;

class CuorseController extends Controller
{
public function show(){
   $resultado=Cuorse::all();//Usando Eloquent
   //Usando consulta SQL directamente 
   //$consulta="SELECT*FROM cursos";
   //$resultado =DB::select($consulta);
return view('cuorse.show',compact('resultado'));
//return $resultado;
}

public function create(){
return view('cuorse.create');
}

public function save(Request $request){
    $reglas = [
        'nombre' => 'required|string|min:5|max:15|regex:/^[a-zA-Z]+$/',
        'descripcion' => 'required|string',
    ];
    $mensajes = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
        'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
        'nombre.regex' => 'El nombre no puede contener números ni caracteres especiales.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
    ];
    $validador = Validator::make($request->all(), $reglas, $mensajes);

    if ($validador->fails()) {
        return redirect()->back()
            ->withErrors($validador)
            ->withInput();
    }
//utilizando Eloquent
//$cursos= new curso();//Creamos un nuevo curso
//$cursos->nombre=$request->nombre;//En la variable nombre se guardará el valor con el name="nombre"
//$cursos->descripcion=$request->descripcion;//En la variable descripcion se guardará el valor con el name="descripcion"
//$cursos->save();
//Utilizando sentencia sql
$curso= new cuorse();
$curso->nombre=$request->nombre;
$curso->descripcion=$request->descripcion;
$consulta="INSERT INTO cuorses(nameCourse ,descriptionCourse) VALUES('$curso->nombre','$curso->descripcion')";
DB:: insert($consulta);//Ejecutamos la insercion
return redirect()->route('cuorse.show');
}



public function find($id){
 $consulta="SELECT * FROM cuorses WHERE id='$id'";
 $cursoFind=DB::select($consulta);   
//$cursoFind=curso::find($id);//Encontramos registro con ese id
return view('cuorse.update', compact('cursoFind'));
}
public function update(){
   return view('cuorse.update');
}





public function updateCuorse(Request $request, Cuorse $id){
    $reglas = [
        'nombre' => 'required|string|min:5|max:15|regex:/^[a-zA-Z]+$/',
        'descripcion' => 'required|string',
    ];
    $mensajes = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
        'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
        'nombre.regex' => 'El nombre no puede contener números ni caracteres especiales.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
    ];
    $validador = Validator::make($request->all(), $reglas, $mensajes);

    if ($validador->fails()) {
        return redirect()->back()
            ->withErrors($validador)
            ->withInput();
    } 
//Utilizando eloquent
//$id->nombre=$request->nombre;
//$id->descripcion=$request->descripcion;
//$id->save();
//sentencia sql
$id->nombre=$request->nombre;
$id->descripcion=$request->descripcion;
$consulta="UPDATE cuorses set nameCourse='$id->nombre', descriptionCourse='$id->descripcion' WHERE id='$id->id'";
DB::update($consulta);
return redirect()->route('cuorse.show');
}

public function delete(cuorse $id){
$id->delete();
return redirect()->route('cuorse.show');
}


public function listCuorse($id){// Se le envia el identificador del curso
$consulta="CALL listCourseStudent('$id')";
$resultado=DB::select($consulta);
return view('cuorse.listCuorse',compact('resultado'));
}
}
