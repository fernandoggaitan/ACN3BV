<x-layouts.app title="Agregar curso nuevo">

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">      
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <flux:input
            type="text" 
            placeholder="Ingrese el título del curso"
            class="mb-3"
            name="titulo"
            value="{{ old('titulo') }}"
        />
        <flux:input 
            type="number" 
            placeholder="Ingrese el precio del curso" 
            class="mb-3"
            name="precio"
            value="{{ old('precio') }}"
        />
        <flux:textarea 
            placeholder="Ingrese la descripción del curso" 
            class="mb-3"
            name="descripcion">{{ old('descripcion') }}</flux:textarea>
        <x-botones.btn-success type="submit"> Agregar curso </x-botones.btn-success>
        <x-botones.enlace href="{{ route('cursos.index') }}"> Volver </x-botones.enlace>
    </form>

</x-layouts.app>