@extends('layouts.app')
@section('name')
<a href="{{route('profile.edit')}}">>>> Perfil</a>
@endsection
@section('content')
            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h2 class="card-title">Informacion del perfil</h2>
                  </div>
                  <div class="card-body p-4">
                  <p class="mt-1 text-sm text-gray-600">
                        {{ __("Actualiza la informacion de tu perfil") }}
                    </p>
                        @include('profile.partials.update-profile-information-form')
<!--
                        @include('profile.partials.update-password-form')

                        @include('profile.partials.delete-user-form')-->
                    </div>
                </div>
              </div>
            </div>
@endsection
