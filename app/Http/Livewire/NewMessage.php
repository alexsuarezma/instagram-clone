<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Follow;
use App\Models\User;

class NewMessage extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.new-message',[            
            'usersFollows' => User::whereIn('id', Follow::select('user_id_followed')
            ->where('user_id_follower', '=', \Auth::user()->id)
            ->where(function($query) {
                    $query->where('users.name','LIKE',"%{$this->search}%")
                    ->orWhere('users.nick','LIKE',"%{$this->search}%");
            }))
            ->get()
        ]);
    }
    
    public function createNewMessage($idUser){
        $this->emit('reciveCreateNewMessage', $idUser);
    }
}
