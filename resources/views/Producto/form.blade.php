@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">


            <div class="col-md-auto">
                <div class="card">
                    <div class="card-header">{{ $Modo == 'crear' ? 'Agregar Producto' : 'Modificar Producto' }}</div>
                    <div class="card-body">



                        @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li> {{$error}}</li>
                                </ul>
                                @endforeach
                            </div>
                        @endif



                            <div class="form-row">
                                <div class="form-group col-md-auto">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-auto">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                </div>
                            </div>
                        <div class=" form-inline mb-2 mb-lg-0 col v-center">
                            <div class="input-group">
                                <input type="submit" class="btn btn-success  mr-sm-3 d-block mx-auto " value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar' }}">

                                <a class="btn btn-primary mr-sm-3  d-block mx-auto" href=" {{ url('Producto') }}">Regrasar Producto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
