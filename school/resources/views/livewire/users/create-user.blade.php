<div>
    <x-adminlte-modal id="CreateUser" title="Crear Usuario" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open(['method' => 'POST']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('first_name', 'Nombres:') !!}
                    {!! Form::text('first_name', 'first_name', ['class' => 'form-control', 'wire:model.defer' => 'first_name', 'placeholder' => 'Ingrese nombre del usuario...']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('last_name', 'Apellidos:') !!}
                    {!! Form::text('last-name', 'last_name', ['class' => 'form-control', 'wire:model.defer' => 'last_name', 'placeholder' => 'Ingrese apellidos del usuario...']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', 'email', ['class' => 'form-control', 'wire:model.defer' => 'email', 'placeholder' => 'Ingrese email del usuario...']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::text('password', 'password', ['class' => 'form-control', 'wire:model.defer' => 'password', 'placeholder' => 'Ingrese password del usuario...']) !!}
                </div>
                <div class="col-md-6">
                    {{-- {!! Form::label('password', 'Password:') !!}
                    {!! Form::text('password', 'password', ['class' => 'form-control', 'wire:model.defer' => 'password', 'placeholder' => 'Ingrese password del usuario...']) !!} --}}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('gender', 'Género:') !!}
                    {!! Form::text('gender', 'gender', ['class' => 'form-control', 'wire:model.defer' => 'gender', 'placeholder' => 'Ingrese género del usuario...']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('phone', 'Teléfono:') !!}
                    {!! Form::text('phone', 'phone', ['class' => 'form-control', 'wire:model.defer' => 'phone', 'placeholder' => 'Ingrese teléfono del usuario...']) !!}
                </div>
            </div>

        </div>


        <div class="form-group">
            {!! Form::label('address', 'Dirección:') !!}
            {!! Form::text('address', 'address', ['class' => 'form-control', 'wire:model.defer' => 'address', 'placeholder' => 'Ingrese dirección del usuario...']) !!}
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
                    {!! Form::text('birthday', 'birthday', ['class' => 'form-control', 'wire:model.defer' => 'birthday', 'placeholder' => 'Ingrese F.N del usuario...']) !!}
                    {{-- <input type="text" class="datepicker-here form-control"> --}}

                    {{-- @if (!empty($users->getRoleNames()))



                    @endif --}}



                </div>
                <div class="col-md-6">
                    {!! Form::label('roles_id', 'Roles:') !!}
                    {!! Form::select('roles_id[]', $roles, null, ['class' => 'form-control select2','wire:model.defer' => 'roles_id']) !!}
                </div>
            </div>
        </div>


        {!! Form::close() !!}
        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" wire:click="ClearData" />
            <x-adminlte-button theme="success" label="Guardar" wire:click="save" data-dismiss="modal"
                data-backdrop="false" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Crear Usuario" data-toggle="modal" data-target="#CreateUser" class="bg-purple" />
</div>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <style>
        .datepickers-container {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 10000;
        }

    </style>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.es.min.js"></script>

    <script>
        $('.datepicker-here').datepicker({
            language: 'es'
        });
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
