@extends('layouts.app')
@section('css')

@endsection
@section('name')
  <a href="{{route('dashboard')}}">>>> Accesorios</a>
@endsection
@section('content')
<!-- Row start -->
<div class="row">
    <div class="col-xxl-12">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title">Listado de Accesorios</h5>
        </div>
        <div class="card-body">
          <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-info" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Foto</th>
                  <th>Descripcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach($accesorios as $accesorios)
                  <tr>
                    <td>
                      <p class="m-0">{{ $accesorios->codigo }}</p>
                    </td>
                    <td>
                      <span class="badge bg-primary">{{ $accesorios->nombre }}</span>
                    </td>
                    <td>
                    <img src="{{ $accesorios->foto }}" class="img-5x" alt="Foto" />
                    </td>
                    <td>
                      <p class="m-0">{{ $accesorios->descripcion }}</p>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Accesorio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                    <form action="{{ route('accesorio.store') }}" method="POST"  enctype="multipart/form-data" onsubmit="showLoader(); setTimeout(hideLoader, 7000); showMessage();">
                        <!-- Carga -->
                        <div id="loader" class="overlay" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="foto"><strong>Seleccionar Foto</strong></label>
                            <input type="file" id="foto" name="foto" accept="image/png, image/jpeg" class="form-control" style="width: 70%;">
                        </div>
                        <div id="contenedorVistaPrevia" style="display: none;">
                            <img id="vistaPrevia" src="#" alt="Vista previa de la imagen" style="max-width: 200px; max-height: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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
<script>
    const inputFoto = document.getElementById('foto');
    const vistaPrevia = document.getElementById('vistaPrevia');
    const contenedorVistaPrevia = document.getElementById('contenedorVistaPrevia');

    inputFoto.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const lector = new FileReader();
            lector.onload = function(e) {
                vistaPrevia.src = e.target.result;
                contenedorVistaPrevia.style.display = 'block';
            }
            lector.readAsDataURL(this.files[0]);
        } else {
            vistaPrevia.src = '#';
            contenedorVistaPrevia.style.display = 'none';
        }
    });
</script>
@endsection