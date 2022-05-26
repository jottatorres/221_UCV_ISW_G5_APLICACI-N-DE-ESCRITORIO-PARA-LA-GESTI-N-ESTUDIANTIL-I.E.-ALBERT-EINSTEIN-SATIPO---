@extends('adminlte::page')

@section('title', 'Gestión escolar - Profesores')

@section('content_header')
<h3 class="font-weight-bold px-4 py-6">Módulo de Profesores</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @livewire('teacher.create-teacher')
        </div>
        <div class="card-body">
            @livewire('teacher.teacher-index')
        </div>
    </div>
@stop
