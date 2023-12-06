@extends('layouts.plantilla')
@section('tittle','Listar detalle curso')<!--Titulo de la pagina-->
@section('content')
<style>
    h1 {
        text-align: center;
    }

    #tabla {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
</style>
<h1>Bienvenido a la sección de lista de alumnos registrados con su calificación</h1>
<a href="{{route('cuorse.show')}}">Regresar</a>
<table id="tabla">
<tr>
<th>Nombre del curso</th>
<th>Estudiante</th>
<th>Fecha de registro</th>
<th>Fecha de actualización</th>
<th>Nombre de evaluación</th>
<th>Puntaje obtenido</th>
</tr>
<tr>
@foreach($resultado as $curso)
<td>{{$curso->nameCourse}}</td>
<td>{{$curso->nameStudent}}</td>
<td>{{$curso->created_at}}</td>
<td>{{$curso->updated_at}}</td>
<td>{{$curso->evaluationName}}</td>
<td>{{$curso->score}}</td>
@endforeach
</tr>
</table>
</form>
@endsection