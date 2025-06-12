@extends('adminlte::page')
@section('title', 'ListadoPacientes')

@section('css')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@stop

@section('content_header')
    <h1>Lista de pacientes</h1>
@stop

@section('content')




@php
    $sectores = collect([
        (object)['id' => 1, 'nombre' => 'Sector A'],
        (object)['id' => 2, 'nombre' => 'Sector B'],
    ]);

    $nacionalidades = collect([
        (object)['id' => 1, 'nombre' => 'Chilena'],
        (object)['id' => 2, 'nombre' => 'Argentina'],
    ]);

    $pueblos = collect([
        (object)['id' => 1, 'nombre' => 'Mapuche'],
        (object)['id' => 2, 'nombre' => 'Aymara'],
    ]);

    $previciones = collect([
        (object)['id' => 1, 'nombre' => 'Fonasa'],
        (object)['id' => 2, 'nombre' => 'Isapre'],
    ]);

    $familias = collect([
        (object)['cod_familia' => 'FAM001'],
        (object)['cod_familia' => 'FAM002'],
    ]);
@endphp

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPaciente">
  Agregar Paciente
</button>

<!-- Modal -->
<div class="modal fade" id="modalPaciente" tabindex="-1" aria-labelledby="modalPacienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form  method="POST" action="{{ route('pacientes.store') }}">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="modalPacienteLabel">Nuevo Paciente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body row g-3">
          <div class="col-md-4">
            <label for="rut_paciente" class="form-label">RUT</label>
            <input type="text" name="rut_paciente" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input type="text" name="apellido_materno" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" class="form-select" required>
              <option value="">Seleccione</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
          </div>

          <div class="col-md-4">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="num_ficha" class="form-label">Número de Ficha</label>
            <input type="text" name="num_ficha" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
              <option value="">Seleccione</option>
              <option value="Inscrito">Inscrito</option>
              <option value="Trasladado">Trasladado</option>
              <option value="Fallecido">Fallecido</option>
            </select>
          </div>

          <!-- Select de relaciones foráneas -->
          <div class="col-md-4">
            <label for="id_sector" class="form-label">Sector</label>
            <select name="id_sector" class="form-select" required>
              <option value="">Seleccione</option>
              @foreach($sectores as $sector)
                <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="id_nacionalidad" class="form-label">Nacionalidad</label>
            <select name="id_nacionalidad" class="form-select" required>
              <option value="">Seleccione</option>
              @foreach($nacionalidades as $nac)
                <option value="{{ $nac->id }}">{{ $nac->nombre }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="id_pueblo_originario" class="form-label">Pueblo Originario</label>
            <select name="id_pueblo_originario" class="form-select" required>
              <option value="">Seleccione</option>
              @foreach($pueblos as $pueblo)
                <option value="{{ $pueblo->id }}">{{ $pueblo->nombre }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="id_previcion" class="form-label">Previsión</label>
            <select name="id_previcion" class="form-select" required>
              <option value="">Seleccione</option>
              @foreach($previciones as $prev)
                <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="cod_familia" class="form-label">Código Familia</label>
            <select name="cod_familia" class="form-select" required>
              <option value="">Seleccione</option>
              @foreach($familias as $familia)
                <option value="{{ $familia->cod_familia }}">{{ $familia->cod_familia }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>





    <p></p>
<table
    id="tablaPacientes"
    class="table table-bordered table-striped"
    data-search="true"
    data-filter-control="true"
    data-show-export="true"
    data-click-to-select="true"
    data-toolbar="#toolbar"
>
    <thead class="table">
        <tr>
            <th data-field="rut" data-filter-control="input">RUT</th>
            <th data-field="nombre" data-filter-control="input">Nombre completo</th>
            <th data-field="sexo" data-filter-control="select">Sexo</th>
            <th data-field="fecha" data-filter-control="input">Fecha nacimiento</th>
            <th data-field="ficha" data-filter-control="input">N° Ficha</th>
            <th data-field="estado" data-filter-control="select">Estado</th>
            <th data-field="sector" data-filter-control="select">Sector</th>
            <th data-field="nacionalidad" data-filter-control="select">Nacionalidad</th>
            <th data-field="pueblo" data-filter-control="select">Pueblo originario</th>
            <th data-field="previcion" data-filter-control="select">Previsión</th>
            <th data-field="familia" data-filter-control="input">Familia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->rut_paciente }}</td>
                <td>{{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                <td>{{ $paciente->sexo }}</td>
                <td>{{ $paciente->fecha_nacimiento }}</td>
                <td>{{ $paciente->num_ficha }}</td>
                <td>{{ $paciente->estado }}</td>
                <td>{{ $paciente->sector->nombre ?? '—' }}</td>
                <td>{{ $paciente->nacionalidad->nombre ?? '—' }}</td>
                <td>{{ $paciente->puebloOriginario->nombre ?? '—' }}</td>
                <td>{{ $paciente->previcion->nombre ?? '—' }}</td>
                <td>{{ $paciente->familia->cod_familia ?? '—' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
<script>
    $(document).ready(function () {
        // Evitar mensaje "Loading, please wait..."
        $.extend($.fn.bootstrapTable.defaults, {
            formatLoadingMessage: function () {
                return 'Aqui va la tabla con el listado de todos';
            }
        });

        // Inicialización manual de la tabla
        $('#tablaPacientes').bootstrapTable({
            search: false,
            filterControl: true,
            showExport: true,
            clickToSelect: true,
            toolbar: '#toolbar'
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery y Bootstrap Bundle -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Table y filtro -->
<script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

@stop