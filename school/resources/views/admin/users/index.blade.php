@extends('adminlte::page')

@section('title', 'Gestión Escolar - Usuarios')

@section('content_header')
    <h3 class="font-weight-bold px-4 py-6">Módulo de Usuarios</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @livewire('users.create-user')
        </div>
        <div class="card-body">
            @livewire('users.user-index')
        </div>
    </div>
@stop
