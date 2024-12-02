@extends('layouts.app')
@section('name')
    <a href="{{route('dashboard')}}">>>> Usuarios</a>
@endsection
@section('content')
<div class="row">
    <div class="col-xxl-12">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title">Listado de Usuarios</h5>
        </div>
        <div class="card-body">                
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
                @foreach($users as $user)
                  <tr>
                    <td>
                      <p class="m-0">{{ $user->id }}</p>
                    </td>
                    <td>
                      <span class="badge bg-primary">{{ $user->name }}</span>
                    </td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#ModalEditarRol{{ $user->id }}" class="btn btn-outline-success">Editar</a>
                    </td>
                    <!-- Modal para Editar Rol -->
              <div class="modal fade" id="ModalEditarRol{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Roles para {{ $user->name }}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('asignar.update', $user->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <ul class="list-unstyled">
                          @foreach($role as $roles)
                            <li>
                              <input type="checkbox" name="roles[]" value="{{ $roles->id }}" id="role_{{ $roles->id }}">
                              <label for="role_{{ $roles->id }}">{{ $roles->name }}</label>
                            </li>
                          @endforeach  
                        </ul>
                        <button class="btn btn-outline-success" type="submit">Asignar Rol</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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