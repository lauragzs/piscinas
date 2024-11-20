@extends('layouts.app')
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
                            <th>Cliente</th>
                            <th>Pais</th>
                            <th>Telefono</th>
                            <th>Tipo</th>
                            <th>Profundidad</th>
                            <th>Longitud</th>
                            <th>Largo</th>
                            <th>Ancho</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($piscinas as $piscinas)
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <p class="m-0">{{ $piscinas->cliente }}</p>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">{{ $piscinas->pais }}</a>
                            </td>
                            <td>{{ $piscinas->telefono }}</td>
                            <td>
                              <span class="badge bg-danger">{{ $piscinas->tipo }}</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">{{ $piscinas->profundidad }}</span>
                            </td>
                            <td>
                                {{ $piscinas->largo }}
                              <!--<div class="rate2 rating-stars"></div> -->
                            </td>
                            <td>
                                {{ $piscinas->ancho }}
                              <!--<div id="sparkline1"></div>-->
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                              {{ $piscinas->longitud }}
                              </p>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
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
                                    <label for="ubicacionSucursal" class="form-label">Tipo</label><br>
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
                    </div>
                </div>
            </div>
@endsection