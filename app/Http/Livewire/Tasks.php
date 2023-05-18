<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;


class Tasks extends Component
{
    public $tasks, $name, $task_id,$user_name,$start_date, $end_date,$category;
    public $updateMode = false;
    public $startMode = false;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->tasks = Task::all();
        return view('livewire.tasks');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        Task::create($validatedDate);

        session()->flash('message', 'Task Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->name = $task->name;
        $this->updateMode = true;

 
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        $task = Task::find($this->task_id);
        $task->update([
            'name' => $this->name,
            
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Task Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }

    public function startTask($id)
    {

        $task = Task::findOrFail($id);
        $this->task_id = $id;

        $this->startMode = true;


    }




    public function taskUpdate()
    {

        $validatedDate = $this->validate([
            'user_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category' => 'required',
        ]);

        $task = Task::find($this->task_id);
        $task->update([
            'user_name' => $this->user_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'category' => $this->category,
            'status' => 'in_progress',
            
        ]);

    
        session()->flash('message', 'Task Start Successfully.');
        $this->resetInputFields();
    }

    public function taskDone($id)
    {

        $task = Task::find($id);
        $task->update([
            'status' => 'done',
            
        ]);

        session()->flash('message', 'Task Finished Successfully.');
    }


    
}
