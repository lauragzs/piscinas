@extends('layouts.app')
@section('css')
<style>
  .tabset > input[type="radio"] {
    position: absolute;
    left: -200vw;
  }
  .tabset .tab-panel {
    display: none;
  }
  .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
  .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
  .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
  .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
  .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
  .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
    display: block;
  }
  body {
    color: #333;
    font-weight: 300;
  }
  .tabset > label {
      font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
    position: relative;
    display: inline-block;
    padding: 15px 15px 25px;
    border: 1px solid transparent;
    border-bottom: 0;
    cursor: pointer;
    font-weight: 600;
  }
  .tabset > label::after {
    content: "";
    position: absolute;
    left: 15px;
    bottom: 10px;
    width: 22px;
    height: 4px;
    background: #8d8d8d;
  }
  input:focus-visible + label {
    outline: 2px solid rgba(0,102,204,1);
    border-radius: 3px;
  }
  .tabset > label:hover,
  .tabset > input:focus + label,
  .tabset > input:checked + label {
    color: #06c;
  }
  .tabset > label:hover::after,
  .tabset > input:focus + label::after,
  .tabset > input:checked + label::after {
    background: #06c;
  }
  .tabset > input:checked + label {
    border-color: #8d8d8d;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
  }
  .tab-panel {
    padding: 30px;
    border-top: 1px solid #ccc;
  }
  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }
</style>
@endsection
@section('name')
  <a href="{{route('dashboard')}}">>>> Piscinas</a>
@endsection
@section('content')
<!-- Row start -->
<div class="row">
  <div class="col-xxl-12">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="card-title">Listado de piscinas registradas</h5>
      </div>
      <div class="card-body">
        <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-info" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Pais</th>
                <th>Telefono</th>
                <th>Tipo</th>
                <th>Profundidad(m)</th>
                <th>Longitud(m)</th>
                <th>Largo(m)</th>
                <th>Ancho(m)</th>
                <th>Area(m²)</th>
                <th>Perimetro(m)</th>
                <th>Volumen(m³)</th>
              </tr>
            </thead>
            <tbody>
              @foreach($piscinas as $piscinas)
                <tr>
                  <td>
                    <div class="d-flex flex-row align-items-center">
                      <p class="m-0">{{ $piscinas->nombrep }}</p>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-row align-items-center">
                      <p class="m-0">{{ $piscinas->cliente }}</p>
                    </div>
                  </td>
                  <td>
                    <p class="m-0">{{ $piscinas->pais }}</p>
                  </td>
                  <td>{{ $piscinas->telefono }}</td>
                  <td>
                    <span class="badge bg-primary">{{ $piscinas->tipo }}</span>
                  </td>
                  <td>
                    <p class="m-0">{{ $piscinas->profundidad }}</p>
                  </td>
                  <td>
                    {{ $piscinas->longitud }}
                    <!--<div class="rate2 rating-stars"></div> -->
                  </td>
                  <td>
                    {{ $piscinas->largo }}
                    <!--<div id="sparkline1"></div>-->
                  </td>
                  <td>
                    {{ $piscinas->ancho }}
                  </td>
                  <td>
                    {{ $piscinas->area }}
                  </td>
                  <td>
                    {{ $piscinas->perimetro }}
                  </td>
                  <td>
                    <p class="m-0 text-danger"></p>
                    {{ $piscinas->volumen }}
                    
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
<!-- Modal para Añadir Piscina -->
  <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
        <form action="{{ route('piscina.store') }}" method="POST">
          @csrf
          <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
            <label for="tab1">Paso 1</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
            <label for="tab2">Paso 2</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
            <label for="tab3">Paso 3</label>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="tab-panels">
                <section id="marzen" class="tab-panel">
                <h2>Datos del Proyecto</h2>
                  <div class="mb-3">
                    <label for="nombrep" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control" id="nombrep" name="nombrep" required>
                  </div>
                  <div class="mb-3">
                    <label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" value="{{ Auth::user()->name }}" readonly>
                    </div>
                  <div class="mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" required>
                  </div>
                  <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                  </div>
                  <button type="button" aria-controls="rauchbier" class="btn btn-info" id="btnContinuar">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="rauchbier" class="tab-panel">
                  <h2>Tipo de Piscina</h2>
                  <div class="row mb-3">
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="regular" value="regular" checked>
                        <label class="form-check-label" for="regular">Regular</label>
                      </div>
                      <img src="https://3dwarehouse.sketchup.com/warehouse/v1.0/content/public/1fd3d2bd-be01-4477-bbe4-55bf8f2dcd21" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="irregular" value="irregular">
                        <label class="form-check-label" for="irregular">Irregular</label>
                      </div>
                      <img src="https://3dwarehouse.sketchup.com/warehouse/v1.0/content/public/70adfffb-55e0-42c3-966e-89369c781b24" alt="" class="img-fluid">
                    </div>
                  </div>
                  <!-- Campos para Regular -->
                  <div id="regular-fields" class="row mb-3">
                    <div class="col-md-4">
                      <label for="profundidad" class="form-label">Profundidad (m)</label>
                      <input type="number" class="form-control" id="profundidad" name="profundidad">
                    </div>
                    <div class="col-md-4">
                      <label for="largo" class="form-label">Largo (m)</label>
                      <input type="number" class="form-control" id="largo" name="largo">
                    </div>
                    <div class="col-md-4">
                      <label for="ancho" class="form-label">Ancho (m)</label>
                      <input type="number" class="form-control" id="ancho" name="ancho">
                    </div>
                  </div>
                  <!-- Campos para Irregular -->
                  <div id="irregular-fields" class="row mb-3">
                    <div class="col-md-6">
                      <label for="profundidad" class="form-label">Profundidad (m)</label>
                      <input type="number" class="form-control" id="profundidad-irregular" name="profundidad" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="longitud" class="form-label">Longitud (m)</label>
                      <input type="number" class="form-control" id="longitud" name="longitud" disabled>
                    </div>
                  </div>
                  <button type="button" aria-controls="dunkles" class="btn btn-info" id="btnContinuar2">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="dunkles" class="tab-panel">
                  <h2>Paso 3</h2>
                  <div class="mb-3">
                    <label for="area" class="form-label">Area (m²)</label>
                    <input type="number" class="form-control" id="area" name="area" step="0.01" min="0" placeholder="0,00" required>
                  </div>
                  <div class="mb-3">
                    <label for="perimetro" class="form-label">Perimetro (m)</label>
                    <input type="number" class="form-control" id="perimetro" name="perimetro" step="0.01" min="0" placeholder="0,00" required>
                  </div>                              
                  <div class="mb-3">
                    <label for="volumen" class="form-label">Volumen (m³)</label>
                    <input type="number" class="form-control" id="volumen" name="volumen" step="0.001" min="0" placeholder="0,00" required>
                  </div>
                  <button type="submit" class="btn btn-info">Añadir <i class="fa-solid fa-plus"></i></button>
                </section>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  document.getElementById('btnContinuar').addEventListener('click', () => {
    document.getElementById('tab2').checked = true;
  });
  document.getElementById('btnContinuar2').addEventListener('click', () => {
    document.getElementById('tab3').checked = true;
  });
  // Obtener los elementos
const regularRadio = document.getElementById('regular');
const irregularRadio = document.getElementById('irregular');
const regularFields = document.getElementById('regular-fields');
const irregularFields = document.getElementById('irregular-fields');
const profundidadRegular = document.getElementById('profundidad');
const largoRegular = document.getElementById('largo');
const anchoRegular = document.getElementById('ancho');
const profundidadIrregular = document.getElementById('profundidad-irregular');
const longitudIrregular = document.getElementById('longitud');

// Función para mostrar/ocultar campos según la selección
function toggleFields() {
  if (regularRadio.checked) {
    regularFields.style.display = 'flex';  // Mostrar campos para piscina regular
    irregularFields.style.display = 'none';  // Ocultar campos para piscina irregular

    // Habilitar campos de Regular
    profundidadRegular.disabled = false;
    largoRegular.disabled = false;
    anchoRegular.disabled = false;

    // Deshabilitar campos de Irregular
    profundidadIrregular.disabled = true;
    longitudIrregular.disabled = true;
  } else if (irregularRadio.checked) {
    regularFields.style.display = 'none';  // Ocultar campos para piscina regular
    irregularFields.style.display = 'flex';  // Mostrar campos para piscina irregular

    // Habilitar campos de Irregular
    profundidadIrregular.disabled = false;
    longitudIrregular.disabled = false;

    // Deshabilitar campos de Regular
    profundidadRegular.disabled = true;
    largoRegular.disabled = true;
    anchoRegular.disabled = true;
  }
}

// Escuchar los cambios en los radios
regularRadio.addEventListener('change', toggleFields);
irregularRadio.addEventListener('change', toggleFields);

// Inicializar el estado de los campos según la selección por defecto
toggleFields();

</script>
@endsection
                      <!--<div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Piscina</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                            <form action="{{ route('piscina.store') }}" method="POST" onsubmit="showLoader(); showMessage();">
                                @csrf
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Cliente</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pais" class="form-label">Pais</label>
                                    <input type="text" class="form-control" id="pais" name="pais" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="regular" value="Regular" checked>
                                        <label class="form-check-label" for="regular">Regular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="irregular" value="Irregular">
                                        <label class="form-check-label" for="irregular">Irregular</label>
                                    </div>                                
                                </div>
                                <div class="mb-3">
                                    <label for="profundidad" class="form-label">Profundidad</label>
                                    <input type="number" class="form-control" id="profundidad" name="profundidad" required>
                                </div>
                                <div class="mb-3">
                                    <label for="largo" class="form-label">Largo</label>
                                    <input type="number" class="form-control" id="largo" name="largo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ancho" class="form-label">Ancho</label>
                                    <input type="number" class="form-control" id="ancho" name="ancho" required>
                                </div>
                                <div class="mb-3">
                                    <label for="longitud" class="form-label">Longitud</label>
                                    <input type="number" class="form-control" id="longitud" name="longitud" required>
                                </div>
                                <button type="submit" class="btn btn-info">Añadir <i class="fa-solid fa-plus"></i></button>
                            </form>
                        </div>
                    </div>-->