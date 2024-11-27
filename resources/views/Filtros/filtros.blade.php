@extends('layouts.app')
@section('css')

@endsection
@section('name')
  <a href="{{route('dashboard')}}">>>> Filtros</a>
@endsection
@section('content')
<!-- Row start -->
<div class="row">
    <div class="col-xxl-12">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title">Listado de Filtros de Arena</h5>
        </div>
        <div class="card-body">
          <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-info" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>Diámetro Interior</th>
                  <th>Área de Filtrado</th>
                  <th>Velocidad de Filtrado</th>
                  <th>Caudal Filtrado</th>
                </tr>
              </thead>
              <tbody>
                @foreach($filtros as $filtros)
                  <tr>
                    <td>
                      <div class="d-flex flex-row align-items-center">
                        <p class="m-0">{{ $filtros->modelo }}</p>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex flex-row align-items-center">
                        <p class="m-0">{{ $filtros->diametro }}</p>
                      </div>
                    </td>
                    <td>
                      <p class="m-0">{{ $filtros->area }}</p>
                    </td>
                    <td>
                      <span class="badge bg-primary">{{ $filtros->velocidad }}</span>
                    </td>
                    <td>
                      <p class="m-0">{{ $filtros->caudalf }}</p>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
    <!-- MODAL DE AÑADIR -->
    <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Filtro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                    <form action="{{ route('filtro.store') }}" method="POST" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
                        <!-- Carga -->
                        <div id="loader" class="overlay" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="mb-3">
                            <label for="diametro" class="form-label">Diámetro de Interior</label>
                            <input type="text" class="form-control" id="diametro" name="diametro" required>
                        </div>
                        <div class="mb-3">
                            <label for="area" class="form-label">Área de Filtrado</label>
                            <input type="text" class="form-control" id="area" name="area" required>
                        </div>
                        <div class="mb-3">
                            <label for="velocidad" class="form-label">Velocidad de Filtrado</label>
                            <input type="text" class="form-control" id="velocidad" name="velocidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="caudalf" class="form-label">Caudal Filtrado</label>
                            <input type="text" class="form-control" id="caudalf" name="caudalf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir <i class="fa-solid fa-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function showLoader() {
        document.getElementById('loader').style.display = 'block';
    }
    function hideLoader() {
        document.getElementById('loader').style.display = 'none';
    }
    function showMessage() {
        document.getElementById('message').style.display = 'block';
    }
</script>
@endsection