<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class ChatList extends Component
{
    public $messages;
    public $idUserChat;
    public $newChat;
    public $idUser;

    protected $listeners = ['mensajeRecibido','renderUserChat', 'renderNewChat'];

    public function mount(){
        $this->messages = [];
        $this->newChat = false;
        if(isset($_GET['message'])){
            $this->renderNewChat($_GET['message']);
        }
    }

    public function mensajeRecibido($lastId){
        // $this->messages = Message::latest()->where('id', $lastId)->first();
    }

    public function renderUserChat($idChat,$idUser){
        $this->idUserChat = $idChat;
        $this->newChat = false;
        $this->idUser = User::where('id',$idUser)->first();

        $this->emit('changeIdChatForm', $this->idUserChat);
    }
    
    public function renderNewChat($idUser){
        $this->newChat = true;
        $this->idUser = User::where('id',$idUser)->first();

        $this->emit('changeIdNewChatForm', $idUser);
    }

    public function render()
    {
        if($this->idUserChat){

            $this->messages = Message::orderBy('created_at','asc')
            ->where('chat_id', $this->idUserChat)
            ->get();
        }

        return view('livewire.chat-list');
    }
}
