<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];
    
    public function render()
    {
        try {
            $polls = \App\Models\Poll::with('option.votes')->latest()->get();

        } catch (\Throwable $th) {
            dd($th->getMessage()); // Affichez le message d'erreur pour le débogage
            $polls = [];
        }
        
        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {   
         $option->votes()->create();
    }
}
