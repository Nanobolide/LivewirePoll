<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => 'Cette option est vide !'
    ];

    public function render()
        {
            return view('livewire.create-poll');
        }

    public function addOption()
        {
            $this->options[] = '';
        }
    
    public function removeOption($index)
        {
                unset($this->options[$index]);
                $this->options =array_values($this->options);
        }

        public function updated($propertyName){

            $this->validateOnly($propertyName);
        }

    public function createPoll()
        {  
            $this->validate();
            
            // Laravel Query Builder
          Poll::create([
                'title' => $this->title
            ])->option()->createMany(
                collect($this->options)->map( fn ($options) => ['name' => $options])
                 ->all()
            );
            
            // foreach($this->options as $optionName)
            // {
            //     // Associate one poll with one option
            //     $poll->option()->create(['name'=> $optionName]);
            // }

            $this->reset(['title','options']);

            $this->emit('pollCreated');
            
        } 
 
}
