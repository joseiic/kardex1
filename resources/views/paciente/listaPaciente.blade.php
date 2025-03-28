@extends('adminlte::page')
@section('title', 'ListadoPacientes')

@section('css')

@stop

@section('content_header')
    <h1>Lista de pacientes</h1>
@stop

@section('content')


<form class="form-inline">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">RUT paciente</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="RUT">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
</form>


    <p>Aqui va la tabla con el listado de todos los weas</p>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop