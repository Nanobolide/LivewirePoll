<div>
           @forelse ($polls as $poll)
               <div class="mb-4">
                    <h3 class="mb-4 text-xl">
                        {{$poll->title}}
                    </h3>
                    @foreach($poll->option as $option)
                        <div class="mb-2">
                            <button class="btn btn-secondary" wire:click="vote({{$option->id}})" >Vote</button>
                            {{$option->name}} ({{$option->votes->count()}})
                        </div>
                    @endforeach
               </div>
           @empty
                <div class="text-gray-500">
                    No polls available
                </div>
           @endforelse
</div>
