<x-layouts.app title="Comentarios">

    <ul>
        @foreach ($comments as $c)
            <li class="mb-3">
                <strong> {{ $c->user->name }} dice:  </strong>
                {{ $c->comment }}
            </li>
        @endforeach
    </ul>

</x-layouts.app>