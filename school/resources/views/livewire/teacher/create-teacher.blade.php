<div>
    <x-adminlte-modal id="CreateTeacher" title="Crear Profesor" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('first_name', 'Nombres:') !!}
            {!! Form::text('first_name', 'first_name', ['class' => 'form-control', 'wire:model.defer' => 'first_name', 'placeholder' => 'Ingrese nombre del profesor...']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos:') !!}
            {!! Form::text('last-name', 'last_name', ['class' => 'form-control', 'wire:model.defer' => 'last_name', 'placeholder' => 'Ingrese apellidos del profesor...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', 'email', ['class' => 'form-control', 'wire:model.defer' => 'email', 'placeholder' => 'Ingrese email del profesor...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Género:') !!}
            {!! Form::text('gender', 'gender', ['class' => 'form-control', 'wire:model.defer' => 'gender', 'placeholder' => 'Ingrese género del profesor...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Teléfono:') !!}
            {!! Form::text('phone', 'phone', ['class' => 'form-control', 'wire:model.defer' => 'phone', 'placeholder' => 'Ingrese teléfono del profesor...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Dirección:') !!}
            {!! Form::text('address', 'address', ['class' => 'form-control', 'wire:model.defer' => 'address', 'placeholder' => 'Ingrese dirección del profesor...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
            {!! Form::text('birthday', 'birthday', ['class' => 'form-control', 'wire:model.defer' => 'birthday', 'placeholder' => 'Ingrese F.N del profesor...']) !!}
        </div>

        {!! Form::close() !!}
        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" wire:click="ClearData"/>
            <x-adminlte-button theme="success" label="Guardar" wire:click="save" data-dismiss="modal" data-backdrop="false" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Crear Profesor" data-toggle="modal" data-target="#CreateTeacher" class="bg-purple" />
</div>
