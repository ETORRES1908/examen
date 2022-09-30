@extends('layouts.app')

@section('template_title')
    Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">

                <form action="{{ url('profiles') }}" method="get">
                    <div class="d-md-flex justify-content-md-start">
                        <div class="btn-group">
                            <input type="text" class="form-control" name="buscar" id="buscar"
                                placeholder="Busqueda dato empresarial">
                            <input type="submit" value="Busqueda" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-6">

                <form action="{{ route('profiles.index') }}" method="get">
                    <div class="d-md-flex justify-content-md-end">
                        <div class="btn-group">
                            <input type="date" class="form-control" name="from" id="from"
                                placeholder="Ingresa para buscar">
                            <input type="date" class="form-control" name="to" id="to"
                                placeholder="Ingresa para buscar">
                            <input type="submit" value="Busqueda" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Profile') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('profiles.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nuevo Empleado') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Dni</th>
                                        <th>Correo</th>
                                        <th>Fecha Nac</th>
                                        <th>Estado de Contrato</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profiles as $profile)
                                        <tr>
                                            <td>{{ $profile->id }}</td>

                                            <td>{{ $profile->nombres }}</td>
                                            <td>{{ $profile->apellidos }}</td>
                                            <td>{{ $profile->dni }}</td>
                                            <td>{{ $profile->correo }}</td>
                                            <td>{{ $profile->fecha_nac }}</td>
                                            <td>
                                                @foreach ($contrato as $con)
                                                    @if ($con->id == $profile->co_pro_id)
                                                        @switch ($con->tipo)
                                                            @case(0)
                                                                <span class="text-success">Activo</span>
                                                            @break

                                                            @case(1)
                                                                <span class="text-success">Activo</span>
                                                            @break

                                                            @case(2)
                                                                <span class="text-success">Activo</span>
                                                            @break

                                                            @case(3)
                                                                <span class="text-danger">Inactivo</span>
                                                            @break
                                                        @endswitch
                                                    @endif
                                                @endforeach

                                            </td>
                                            <td>
                                                <form action="{{ route('profiles.delete', $profile->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('profiles.show', $profile->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('profiles.edit', $profile->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $profiles->links() !!}
            </div>
        </div>
    </div>
@endsection
