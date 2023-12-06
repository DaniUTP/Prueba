@extends('layouts.plantilla')
@section('tittle','Listado de cursos')<!--Titulo de la pagina-->
@section('content')
<style>
  table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
  }

  th, td {
      text-align: center;
      padding: 10px;
      border: 1px solid #ddd;
  }

  th {
      background-color: #f2f2f2;
  }

  a {
      text-decoration: none;
  }

  input[type="submit"] {
      background-color: #dc3545;
      color: #fff;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
  }
</style>

<h1>Listado de cursos</h1>
<a href="{{route('cuorse.create')}}">Crear un nuevo curso</a>
<table>
    <tr>
  <th>Id</th>
  <th>Nombre</th>
  <th>Descripcion</th>
  <th>Editar</th>
  <th>Eliminar</th>
</tr>  
@foreach ($resultado as $curso)
<tr>
    <td>{{ $curso->id }}</td>
    <td><a href="{{route('cuorse.listCuorse',['id'=>$curso->id])}}">{{ $curso->nameCourse }}</a></td>
    <td>{{ $curso->descriptionCourse }}</td>
    <td><a href="{{ route('cuorse.find', ['id' => $curso->id]) }}">Editar</a></td>
    <form action="{{route('cuorse.delete',['id'=>$curso->id])}}" method='POST'>
    @csrf
    @method('delete')
    <td><input type="submit" value="Eliminar"></td>
    </form>
</tr>
@endforeach
</table>

@endsection