
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar usuario
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Usuario.update', $Usuario->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required class="form-control" value="{{ $Usuario->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" required class="form-control" value="{{ $Usuario->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Nombres">Nombres</label>
                                <input type="text" name="Nombre" required class="form-control" value="{{ $Usuario->Nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="Apellidos">Apellidos</label>
                                <input type="text" name="Apellido" required class="form-control" value="{{ $Usuario->Apellido }}">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Telefono</label>
                                <input type="text" name="Telefono" required class="form-control" value="{{ $Usuario->Telefono }}">
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Direccion</label>
                                <input type="text" name="Direccion" required class="form-control" value="{{ $Usuario->Direccion }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Rol</label>
                                <select class="form-control" name="rol">
                                    @foreach ($roles as $key => $value)
                                        @if ($Usuario->hasRole($value))
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="justify-content-end">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
