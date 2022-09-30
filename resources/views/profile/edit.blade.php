@extends('layouts.app')

@section('template_title')
    Update Profile
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Profile</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('profiles/'. $profile->id)}}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
                                                {{ Form::text('nombres', $profile->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                                                {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                {{ Form::label('apellidos') }}
                                                {{ Form::text('apellidos', $profile->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                                                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('dni') }}
                                                {{ Form::text('dni', $profile->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
                                                {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('correo') }}
                                                {{ Form::text('correo', $profile->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                                                {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                         <div class="form-group">
                                            {{ Form::label('fecha_nac') }}
                                            {{ Form::date('fecha_nac', \Carbon\Carbon::parse($profile->fecha_nac), ['class' => 'form-control' . ($errors->has('fecha_nac') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nac']) }}
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
                                                {{ Form::text('area', $profile->businessprofile->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
                                                {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                {{ Form::label('cargo') }}
                                                {{ Form::text('cargo', $profile->businessprofile->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
                                                {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('local') }}
                                                {{ Form::text('local', $profile->businessprofile->local, ['class' => 'form-control' . ($errors->has('local') ? ' is-invalid' : ''), 'placeholder' => 'Local']) }}
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
                                                {{ Form::date('fecha_inicio', \Carbon\Carbon::parse($profile->contractprofile->fecha_inicio), ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Inicio']) }}
                                                {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                {{ Form::label('fecha_fin') }}
                                                {{ Form::date('fecha_fin', \Carbon\Carbon::parse($profile->contractprofile->fecha_fin), ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de fin']) }}
                                                {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('tipo') }}
                                                {{ Form::select('tipo', [0 => "Contrato Fijo", 1 => "Contrato indenifido", 2 => "Contrato de Aprendizaje", 3 => 'Finalizado'], $profile->contractprofile->tipo , ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Elige de Contrato']) }}
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
