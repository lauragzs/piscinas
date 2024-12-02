@extends('layouts.app')
@section('name')
<a href="{{route('dashboard')}}">>>> Roles</a>
@endsection
@section('content')
<div class="row">
    <div class="col-xxl-12">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title">Listado de Roles</h5>
        </div>
        <div class="card-body">
            <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-info" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
                <!-- MODAL DE AÑADIR -->
                <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Rol</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('rol.store') }}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="formNombre">Nombre</label>
                                        <input type="text" name="name" class="form-control" placeholder="Ingresa el Nombre" required/>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="formDescripcion">Guard Name</label>
                                        <input type="text" name="guard_name" class="form-control" placeholder="Ingresa el Guard Name" required/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rol as $rol)
                  <tr>
                    <td>
                      <p class="m-0">{{ $rol->id }}</p>
                    </td>
                    <td>
                      <span class="badge bg-primary">{{ $rol->name }}</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ModalMostrar{{ $rol->id }}">Ver</button>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalEditar{{ $rol->id }}">Editar</button>
                        <!--<form action="{{ route('rol.destroy', $rol->id) }}" method="POST" style="display:inline;">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
                        </form>-->
                        <!-- Modal para Mostrar Detalles del Rol -->
            <div class="modal fade" id="ModalMostrar{{ $rol->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles del Rol</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label"><strong>Nombre:</strong></label>
                              <p>{{ $rol->name }}</p>
                            </div>
                            <div class="mb-3">
                              <label class="form-label"><strong>Guard Name:</strong></label>
                              <p>{{ $rol->guard_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Modal para Editar Rol -->
          <div class="modal fade" id="ModalEditar{{ $rol->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Rol</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('rol.update', $rol->id) }}" method="post">
                              @csrf
                              {{ method_field('PUT') }}
                              <div class="mb-3">
                                  <label class="form-label">Nombre del rol:</label>
                                  <input type="text" name="name" value="{{ $rol->name }}" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Guard Name:</label>
                                  <input type="text" name="guard_name" value="{{ $rol->guard_name }}" class="form-control" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
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

            
@endsection