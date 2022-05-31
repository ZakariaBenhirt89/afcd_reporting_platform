<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AppLogo extends Component
{
    use WithFileUploads;
    public $logoUrl ;
    public $saved = false;
    protected $listeners = ['logoAdded' => 'send'];

    public function render()
    {
        return view('livewire.app-logo');
    }
    public function save()
    {
        $this->validate([
            'logoUrl' => 'required',
        ]);
        $this->logoUrl->store("logos");
        $this->emit('logoAdded');
    }
    public function send(){
          $this->saved = true;
    }
}
