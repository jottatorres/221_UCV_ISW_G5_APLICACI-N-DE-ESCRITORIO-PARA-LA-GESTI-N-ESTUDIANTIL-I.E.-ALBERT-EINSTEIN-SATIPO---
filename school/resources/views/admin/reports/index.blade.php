@extends('adminlte::page')

@section('title', 'Gestión Escolar - Reportes')

@section('content_header')
    <h3 class="font-weight-bold px-4 py-6">Módulo de Reportes</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <select class="form-control select2" name="state">
                <option value="AL">Reportes de Usuarios</option>
                <option value="WY">Reportes de Alumnos</option>
                <option value="WY">Reportes de Profesores</option>
                <option value="WY">Reportes de Notas</option>
              </select>
        </div>
        <div class="card-body">
            gsdds
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
