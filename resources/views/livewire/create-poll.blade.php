<div class="card card-body">
        <p class="d-flex justify-content-center">Create App Poll Livewire !</p>
        <form wire:submit.prevent="createPoll" class="form-group">
                 <label for="">Poll Title</label>

                <input type="text" wire:model="title" class="form-control">
                @error("title")
                <div class="text-red-500">{{$message}}</div>
            @enderror

                <p class="title"> Current title: {{$title}}</p>  
                
               
                <div class="mb-4">
                    <button class="btn btn-secondary" wire:click.prevent="addOption">Add Option</button>
                 </div>


              
                @foreach ($options  as $index=>$option)
                <div class="mt-4">
                       <label for="">Option {{$index + 1}}</label>
                </div>

                <div class="form-row">
                        <div class="col">
                                 <input type="text" class="form-control" wire:model="options.{{$index}}">
                         @error("options.{{$index}}")
                                 <div class="text-red">{{$message}}</div>
                        @enderror
                        </div>

                        <div class="col">
                                <button class="btn btn-secondary" wire:click.prevent="removeOption({{$index}})">Remove</button>
                         </div>
                </div>
                
                       
                @endforeach
                <div class="btn mt-5 card-footer">
                        <button type="submit" class="btn btn-secondary">Create poll</button>

                </div>
        </form>
 
</div>