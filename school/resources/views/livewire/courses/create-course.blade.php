<div>
    <x-adminlte-modal id="CreateCourse" title="Crear Curso" theme="purple" icon="fas fa-bolt" size='lg'>

        <div class="form-group">
            {!! Form::label('course_name', 'Nombres:') !!}
            {!! Form::text('course_name', 'course_name', ['class' => 'form-control', 'wire:model.defer' => 'course_name', 'placeholder' => 'Ingrese nombre del curso...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('course_description', 'Descripción:') !!}
            {!! Form::textarea('course_description', 'course_description', ['class' => 'form-control', 'wire:model.defer' => 'course_description', 'placeholder' => 'Ingrese la descripción del curso...']) !!}
        </div>


        {!! Form::close() !!}
        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" wire:click="ClearData" />
            <x-adminlte-button theme="success" label="Guardar" wire:click="save" data-dismiss="modal"
                data-backdrop="false" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Crear Curso" data-toggle="modal" data-target="#CreateCourse" class="bg-purple" />

</div>
