

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Nuevo usuario
                    </div>
                    <div class="card-body">
                        <form action="{{ url('Usuario') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre de Usuario</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Nombre">Nombres</label>
                                <input type="text" name="Nombre" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Apellido">Apellidos</label>
                                <input type="text" name="Apellido" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Telefono</label>
                                <input type="text" name="Telefono" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Direccion</label>
                                <input type="text" name="Direccion" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Rol</label>
                                <select class="form-control" name="rol">
                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
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

