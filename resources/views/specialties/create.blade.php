@extends('layouts.panel')

@section('content')


    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registar especialidades</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/especialidades') }}" class="btn btn-sm btn-success">
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
            <form action="{{ url('/especialidades') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de la especialidad</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

@endsection
