<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TasksList extends Component
{

    public $title = '';
    public $search = '';

    public function add()
    {
        Task::create([
            'title' => $this->title
        ]);
        $this->title = '';
    }

    public function change(Task $task)
    {
        $completed = !$task->completed;
        $task->update([
            'completed' => $completed
        ]);
    }
    
    public function render()
    {

        $search = $this->search;

        $tasks = Task::select(['id', 'title', 'completed'])
            ->when($search, function (Builder $query, string $search) {
                $query->where('title', 'like', "%$search%");
            })
            ->get();

        return view('livewire.tasks-list', [
            'tasks' => $tasks
        ]);

    }

}
