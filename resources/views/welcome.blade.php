<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="container-fluid">

        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header">
                                <h4>Create Task</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-header">
                                <h4>My Tasks</h4>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        @livewire('tasks')

                    </div>
                </div>
            </div>

        </div>

    </div>
    @livewireScripts
</body>

</html>