<form>
    <input type="hidden" wire:model="task_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
  
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
</form>