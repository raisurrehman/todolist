<div class="row">
    <div class="col-md-6" style="border-right: 1px solid #ced4da;">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @if($updateMode)
        @include('livewire.update')
        @elseif($startMode)
        @include('livewire.tasks.create')
        @else
        @include('livewire.create')
        @endif

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Task Name</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>
                        <button wire:click="edit({{ $task->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $task->id }})" class="btn btn-danger btn-sm">Delete</button>
                        @if($task->status == 'in_progress')
                        <span class="badge badge-warning">In Progress</span>
                        @elseif($task->status == 'done')
                        <span class="badge badge-success">Done</span>
                        @else
                        <button wire:click="startTask({{ $task->id }})" class="btn btn-success btn-sm">Start Task</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Task Name</th>
                    <th>Category</th>
                    <th>User Name</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->category }}</td>
                    <td>{{ $task->user_name }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>
                        @if($task->status == 'in_progress')
                        <button wire:click="taskDone({{ $task->id }})" class="btn btn-primary btn-sm">Finish</button>
                        @else
                        <span class="badge badge-success">Done</span>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>