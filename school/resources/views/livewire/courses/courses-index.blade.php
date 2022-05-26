<div>

    <div class="px-6 py-4">
        <input type="text" wire:model="search" class="form-control form-control-md" placeholder="Ingresa tu búsqueda">
    </div>
    <table class="table table-striped table-bordered" style="width:100%" id="demo">
        <thead>
            <tr style="cursor: pointer;">
                <th wire:click="order('id')">Id</th>
                <th wire:click="order('course_name')">Nombre</th>
                <th wire:click="order('course_description')">Descripción</th>
                <th>Accciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($courses->count())
               @foreach ($courses as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->course_description }}</td>
                        <td width="300px">
                            <a href="" class="btn btn-info btn-md rounded" wire:click="edit({{ $item }})"
                                data-toggle="modal" data-target="#ViewCourse">
                                <i class="fas fa-eye"></i>
                                Ver
                            </a>

                            <a class="btn btn-primary btn-md rounded" wire:click="edit({{ $item }})"
                                data-toggle="modal" data-target="#EditCourse">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            <a class="btn btn-danger btn-md rounded"
                                wire:click="$emit('deleteCourse', {{ $item->id }})">
                                <i class="fas fa-trash-alt"></i>
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="odd">
                    <td valign="top" colspan="5">No existe ningún registro con su búsqueda</td>
                </tr>
            @endif
        </tbody>
    </table>


    <div class="float-right">
        {{ $courses->links() }}
    </div>

    <x-adminlte-modal id="EditCourse" title="Editar Curso" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('course_name', 'Nombre del Curso:') !!}
            {!! Form::text('course_name', 'course_name', ['class' => 'form-control', 'wire:model.defer' => 'course.course_name', 'placeholder' => 'Ingrese nombre del curso...']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('course_description', 'Apellidos:') !!}
            {!! Form::text('course_description', 'course_description', ['class' => 'form-control', 'wire:model.defer' => 'course.course_description', 'placeholder' => 'Ingrese la descripción del curso...']) !!}
        </div>

        {!! Form::close() !!}

        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" />
            <x-adminlte-button theme="success" label="Actualizar" data-dismiss="modal" data-backdrop="false"
                wire:click="update" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="ViewCourse" title="Ver Curso" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('course_name', 'Nombre del Curso:') !!}
            {!! Form::text('course_name', 'course_name', ['class' => 'form-control', 'wire:model.defer' => 'course.course_name', 'placeholder' => 'Ingrese nombre del curso...', 'disabled']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('course_description', 'Apellidos:') !!}
            {!! Form::text('course_description', 'course_description', ['class' => 'form-control', 'wire:model.defer' => 'course.course_description', 'placeholder' => 'Ingrese la descripción del curso...', 'disabled']) !!}
        </div>

        {!! Form::close() !!}

        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>

    @push('js')
        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {


                Livewire.on('alert', function($message) {
                    Swal.fire(
                        'Good job!',
                        $message,
                        'success',
                    )
                });
                Livewire.on('deleteCourse', CourseId => {
                    Swal.fire({
                        title: '¿Está seguro de querer eliminarlo?',
                        text: "¡Al eliminarlo no hay opción a recuperarlo!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('delete', CourseId);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
