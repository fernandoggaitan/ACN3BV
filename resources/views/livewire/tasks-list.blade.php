<div>

    <form class="mb-5" wire:submit="add">
        <flux:input type="text" class="mb-1" wire:model="title" />
        <flux:button type="submit"> Agregar tarea </flux:button>
    </form>

    <form class="mb-5">
        {{ $search }}
        <flux:input type="text" class="mb-1" placeholder="Ingrese la tarea a buscar" wire:model.live.debounce.1000ms="search" />
    </form>
    
    <ul wire:poll.15000ms>
        @foreach ($tasks as $t)
            <li> 
                <input type="checkbox" 
                    @checked($t->completed) 
                    wire:change="change({{ $t }})"
                />
                {{ $t->title }}                
            </li>
        @endforeach
    </ul>

</div>
