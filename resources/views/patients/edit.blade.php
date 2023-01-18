<?php
    use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar pacientes</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/pacientes') }}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclmation-triangle"></i>
                  <strong>Por favor!!</strong> {{ $error }}
                </div>
              @endforeach
            @endif
            <form action="{{ url('/pacientes/'.$patient->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del médico</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name', $patient->name) }}">
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email', $patient->email) }}">
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input class="form-control" type="text" name="cedula" value="{{ old('cedula', $patient->cedula) }}">
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input class="form-control" type="text" name="address" value="{{ old('address', $patient->address) }}">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone', $patient->phone) }}">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="text" name="password">
                    <small>Llenar el campo si desea modificar la contraseña</small>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

@endsection
