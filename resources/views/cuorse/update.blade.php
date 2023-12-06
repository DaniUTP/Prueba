@extends('layouts.plantilla')
@section('tittle','Actualizar cursos')<!--Titulo de la pagina-->
@section('content')
<style>
    <style>
.formulario-curso {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.alert {
    margin-top: 10px;
}
   
</style>
<h1>Actualizar cursos</h1>
<a href="{{route('cuorse.show')}}">Regresar</a>
@foreach($cursoFind as $curso)
<form action="{{route('cuorse.updateCuorse',['id'=>$curso->id])}}" method="POST">
    @csrf
    @method('put')
<label>Nombre:</label>
<input type="text" name="nombre" value="{{$curso->nameCourse}}">
@error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>
<br>
<label>Descripcion:</label>
<br>
<textarea name="descripcion">{{$curso->descriptionCourse}}</textarea>
@error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>
<br>
<input type="submit" value="Actualizar curso">
</form>
@endforeach
@endsection