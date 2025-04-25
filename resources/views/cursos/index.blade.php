<x-layouts.app title="Dashboard">

    <div class="mb-5">
        <x-botones.enlace href=""> Agregar nuevo </x-botones.enlace>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
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
                            {{ $c->precio }}
                        </td>
                        <td class="px-6 py-4">
                            <x-botones.enlace href=""> Ingresar </x-botones.enlace>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
