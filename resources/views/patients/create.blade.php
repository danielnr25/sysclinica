@extends('layouts.panel')

@section('content')


    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registar pacientes</h3>
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
              @foreach ($erros->all() as $error )
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclmation-triangle"></i>
                  <strong>Por favor!!</strong> {{ $error }}
                </div>
              @endforeach
            @endif
            <form action="{{ url('/pacientes') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del paciente</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input class="form-control" type="text" name="cedula" value="{{ old('cedula') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input class="form-control" type="text" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

@endsection
