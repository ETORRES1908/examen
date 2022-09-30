@extends('layouts.app')

@section('template_title')
    {{ $profile->name ?? 'Ver Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('profiles.index')}}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $profile->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $profile->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $profile->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $profile->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nac:</strong>
                            {{ $profile->fecha_nac }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $profile->businessprofile->area }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $profile->businessprofile->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Local:</strong>
                            {{ $profile->businessprofile->local }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha inicio de Contrato:</strong>
                            {{ $profile->contractprofile->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha fin de Contrato:</strong>
                            {{ $profile->contractprofile->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            @switch ($profile->contractprofile->tipo)
                                @case(0)
                                    <span">Contrato Fijo</span>
                                    @break

                                    @case(1)
                                        <span>Contrato Indefinido</span>
                                    @break

                                    @case(2)
                                        <span>Contrato de Aprendizaje</span>
                                    @break

                                    @case(3)
                                        <span>Inactivo</span>
                                    @break
                                @endswitch
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
