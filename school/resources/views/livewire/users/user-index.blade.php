<div>
    <div class="px-6 py-4">
        <input type="text" wire:model="search" class="form-control form-control-md" placeholder="Ingresa tu búsqueda">
    </div>


    <table class="table table-striped table-bordered" style="width:100%" id="demo">
        <thead>
            <tr style="cursor: pointer;">
                <th wire:click="order('id')">Id</th>
                <th wire:click="order('first_name')">Nombres</th>
                <th wire:click="order('last_name')">Apellidos</th>
                <th>Email</th>
                <th>Género</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Accciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count())
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td width="300px">
                            <a href="" class="btn btn-info btn-md rounded" wire:click="edit({{ $item }})"
                                data-toggle="modal" data-target="#ViewUser">
                                <i class="fas fa-eye"></i>
                                Ver
                            </a>

                            <a class="btn btn-primary btn-md rounded" wire:click="edit({{ $item }})"
                                data-toggle="modal" data-target="#EditUser">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            <a class="btn btn-danger btn-md rounded"
                                wire:click="$emit('deleteUser', {{ $item->id }})">
                                <i class="fas fa-trash-alt"></i>
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="odd">
                    <td colspan="5">No existe ningún registro con su búsqueda</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="float-right">
        {{ $users->links() }}
    </div>


    <x-adminlte-modal id="EditUser" title="Editar Usuario" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('first_name', 'Nombres:') !!}
            {!! Form::text('first_name', 'first_name', ['class' => 'form-control', 'wire:model.defer' => 'user.first_name', 'placeholder' => 'Ingrese nombre del usuario...']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos:') !!}
            {!! Form::text('last-name', 'last_name', ['class' => 'form-control', 'wire:model.defer' => 'user.last_name', 'placeholder' => 'Ingrese apellidos del usuario...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', 'email', ['class' => 'form-control', 'wire:model.defer' => 'user.email', 'placeholder' => 'Ingrese email del usuario...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', 'password', ['class' => 'form-control', 'wire:model.defer' => 'user.password', 'placeholder' => 'Ingrese password del usuario...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Género:') !!}
            {!! Form::text('gender', 'gender', ['class' => 'form-control', 'wire:model.defer' => 'user.gender', 'placeholder' => 'Ingrese género del usuario...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Teléfono:') !!}
            {!! Form::text('phone', 'phone', ['class' => 'form-control', 'wire:model.defer' => 'user.phone', 'placeholder' => 'Ingrese teléfono del usuario...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Dirección:') !!}
            {!! Form::text('address', 'address', ['class' => 'form-control', 'wire:model.defer' => 'user.address', 'placeholder' => 'Ingrese dirección del usuario...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
            {!! Form::text('birthday', 'birthday', ['class' => 'form-control', 'wire:model.defer' => 'user.birthday', 'placeholder' => 'Ingrese F.N del usuario...']) !!}
        </div>

        <div class="form-group">

            @foreach ($roles as $role)
                <div>
                    <label for="">
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>

        {!! Form::close() !!}

        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" />
            <x-adminlte-button theme="success" label="Actualizar" data-dismiss="modal" data-backdrop="false"
                wire:click="update" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="ViewUser" title="Ver Usuario" theme="purple" icon="fas fa-bolt" size='lg'>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('first_name', 'Nombres:') !!}
            {!! Form::text('first_name', 'first_name', ['class' => 'form-control', 'wire:model.defer' => 'user.first_name', 'placeholder' => 'Ingrese nombre del usuario...', 'disabled']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos:') !!}
            {!! Form::text('last-name', 'last_name', ['class' => 'form-control', 'wire:model.defer' => 'user.last_name', 'placeholder' => 'Ingrese apellidos del usuario...', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', 'email', ['class' => 'form-control', 'wire:model.defer' => 'user.email', 'placeholder' => 'Ingrese email del usuario...', 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', 'password', ['class' => 'form-control', 'wire:model.defer' => 'user.password', 'placeholder' => 'Ingrese password del usuario...', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Género:') !!}
            {!! Form::text('gender', 'gender', ['class' => 'form-control', 'wire:model.defer' => 'user.gender', 'placeholder' => 'Ingrese género del usuario...', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Teléfono:') !!}
            {!! Form::text('phone', 'phone', ['class' => 'form-control', 'wire:model.defer' => 'user.phone', 'placeholder' => 'Ingrese teléfono del usuario...', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Dirección:') !!}
            {!! Form::text('address', 'address', ['class' => 'form-control', 'wire:model.defer' => 'user.address', 'placeholder' => 'Ingrese dirección del usuario...', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
            {!! Form::text('birthday', 'birthday', ['class' => 'form-control', 'wire:model.defer' => 'user.birthday', 'placeholder' => 'Ingrese F.N del usuario...', 'disabled']) !!}
        </div>

        {!! Form::close() !!}

        <x-slot name="footerSlot">
            <x-adminlte-button theme="secondary" label="Cerrar" data-dismiss="modal" />
            <x-adminlte-button theme="success" label="Actualizar" data-dismiss="modal" data-backdrop="false"
                wire:click="update" class="disabled:opacity-25" />
        </x-slot>
    </x-adminlte-modal>
    @push('js')
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
                Livewire.on('deleteUser', UserId => {
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
                            Livewire.emit('delete', UserId);
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
