<form>
    <input type="hidden" wire:model="task_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Your Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" wire:model="user_name">
        @error('user_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput1">Start Date:</label>
                <input type="date" class="form-control" id="exampleFormControlInput2" wire:model="start_date">
                @error('start_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput1">End Date:</label>
                <input type="date" class="form-control" id="exampleFormControlInput3" wire:model="end_date">
                @error('end_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

    </div>

    <div class="form-group">
        <label for="exampleFormControlInput4">Category:</label>
        <select class="form-control" wire:model="category">
            <option value="urgent">Urgent</option>
            <option value="normal">Normal</option>

        </select>
        @error('category') <span class="text-danger">{{ $message }}</span>@enderror
    </div>


    <button wire:click.prevent="taskUpdate()" class="btn btn-dark">Submit</button>
</form>