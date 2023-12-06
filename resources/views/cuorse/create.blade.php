@extends('layouts.plantilla')
@section('tittle','Crear curso')<!--Titulo de la pagina-->
@section('content')
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
<h1>Bienvenido a la sección de crear nuevos cursos</h1>
<a href="{{route('cuorse.show')}}">Regresar</a>
<form action="{{route('cuorse.save')}}" method="POST">
    @csrf <!--Se envia token oculto-->
<label>Nombre:</label>
<input type="text" name="nombre">
@error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>
<br>
<label>Descripcion:</label>
<br>
<textarea name="descripcion"></textarea>
@error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<br>
<br>
<input type="submit" value="Crear curso">
</form>
@endsection