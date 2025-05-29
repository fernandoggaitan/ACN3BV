<x-layouts.app title="Lista de cursos">

    @if (session('status'))
        <x-alertas.success>
            {{ session('status') }}
        </x-alertas.success>
    @endif

    <div class="mb-5">
        <x-botones.enlace href="{{ route('cursos.create') }}"> Agregar nuevo </x-botones.enlace>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/4">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/4">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/4">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/4" colspan="2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $c)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $c->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $c->titulo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $c->precio_format() }}
                        </td>
                        <td class="px-6 py-4">
                            <x-botones.enlace href="{{ route('cursos.edit', $c) }}"> Editar </x-botones.enlace>                            
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('cursos.destroy', $c) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-botones.btn-danger type="submit"> Eliminar </x-botones.btn-danger>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $cursos->links() }}

</x-layouts.app>
