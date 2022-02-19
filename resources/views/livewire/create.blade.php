<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Name</label>
        <input type="text" wire:model="name" class="form-control input-sm"  placeholder="name">
    </div>
    <div class="form-group">
        <label>Enter Email</label>
        <input type="email" class="form-control input-sm" placeholder="Enter email" wire:model="email">
    </div>
    <div class="form-group">
        <select name="form-control" id="" wire:model="keresmianval">
            <option value="">Select Keresmian</option>
            @foreach ($keresmian as $item)
            <option value="{{ $item->id }}">{{ $item->keresmian }}</option>
            @endforeach
        </select>
    </div>
    <button wire:click="store()" class="btn btn-primary">Submit</button>
</div>
