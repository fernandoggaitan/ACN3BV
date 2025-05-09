<x-layouts.app title="Agregar curso nuevo">

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <flux:input
            type="text" 
            placeholder="Ingrese el título del curso"
            class="mb-3"
            name="titulo"
        />
        <flux:input 
            type="number" 
            placeholder="Ingrese el precio del curso" 
            class="mb-3"
            name="precio"
        />
        <flux:textarea 
            placeholder="Ingrese la descripción del curso" 
            class="mb-3"
            name="descripcion"
        />
        <x-botones.btn-success type="submit"> Agregar curso </x-botones.btn-success>
        <x-botones.enlace href="{{ route('cursos.index') }}"> Volver </x-botones.enlace>
    </form>

</x-layouts.app>