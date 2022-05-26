@extends('adminlte::page')

@section('title', 'Gestión Escolar - Cursos')

@section('content_header')
<h3 class="font-weight-bold px-4 py-6">Módulo de Cursos</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @livewire('courses.create-course')
        </div>
        <div class="card-body">
            @livewire('courses.courses-index')
        </div>
    </div>
@stop

