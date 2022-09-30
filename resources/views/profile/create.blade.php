@extends('layouts.app')

@section('template_title')
    Create Profile
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Profile</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('profiles')}}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="bg-info rounded border-2">
                                        <p class="text-white m-2">Datos del Perfil</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('nombres') }}
                                                {{ Form::text('nombres', null, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                                                {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                {{ Form::label('apellidos') }}
                                                {{ Form::text('apellidos', null, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                                                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('dni') }}
                                                {{ Form::text('dni', null, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
                                                {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('correo') }}
                                                {{ Form::text('correo', null, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                                                {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                         <div class="form-group">
                                            {{ Form::label('fecha_nac') }}
                                            {{ Form::date('fecha_nac', null, ['class' => 'form-control' . ($errors->has('fecha_nac') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nac']) }}
                                            {!! $errors->first('fecha_nac', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        </div>
                                    </div>
                                    <div class="bg-secondary rounded border-2 col-12">
                                        <p class="text-white m-2">Datos Empresariales</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('area') }}
                                                {{ Form::text('area', null, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
                                                {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                {{ Form::label('cargo') }}
                                                {{ Form::text('cargo', null, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
                                                {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('local') }}
                                                {{ Form::text('local', null, ['class' => 'form-control' . ($errors->has('local') ? ' is-invalid' : ''), 'placeholder' => 'Local']) }}
                                                {!! $errors->first('local', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-warning rounded border-2 col-12">
                                        <p class="text-white m-2">Datos de Contrato</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('fecha_inicio') }}
                                                {{ Form::date('fecha_inicio', null, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Inicio']) }}
                                                {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                {{ Form::label('fecha_fin') }}
                                                {{ Form::date('fecha_fin', null, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de fin']) }}
                                                {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('tipo') }}
                                                {{ Form::select('tipo', [0 => "Contrato Fijo", 1 => "Contrato indenifido", 2 => "Contrato de Aprendizaje"], null , ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Elige de Contrato']) }}
                                                {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer mt-2">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
