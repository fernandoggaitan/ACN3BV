<x-layouts.app title="{{ $curso->titulo }}">

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')
        <flux:input
            type="text" 
            placeholder="Ingrese el título del curso"
            class="mb-3"
            name="titulo"
            value="{{ old('titulo', $curso->titulo) }}"
        />
        <flux:input 
            type="number" 
            placeholder="Ingrese el precio del curso" 
            class="mb-3"
            name="precio"
            value="{{ old('precio', $curso->precio) }}"
        />
        <flux:textarea 
            placeholder="Ingrese la descripción del curso" 
            class="mb-3"
            name="descripcion">{{ old('descripcion', $curso->descripcion) }}</flux:textarea>
        <x-botones.btn-success type="submit"> Modificar curso </x-botones.btn-success>
        <x-botones.enlace href="{{ route('cursos.index') }}"> Volver </x-botones.enlace>
    </form>

</x-layouts.app>