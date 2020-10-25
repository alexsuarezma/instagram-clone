<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Chat;

class ChatForm extends Component
{
    public $content;
    public $idChat;
    public $idUserNewChat;

    protected $listeners = ['changeIdChatForm','changeIdNewChatForm'];

    public function mount(){
        $this->content = '';
        $this->idChat = '';
        $this->idUserNewChat = '';
        if(isset($_GET['message'])){
            $this->changeIdNewChatForm($_GET['message']);
        }
    }

    public function changeIdChatForm($idChat){
        $this->idChat = $idChat;
    }

    public function changeIdNewChatForm($idUser){
        $this->idUserNewChat = $idUser;
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    // public function updated($field){
    //     $this->validateOnly($field, [
    //         'content' => 'required|min:1'
    //     ]);
    // }
    
    public function enviarMensaje(){
        $this->validate([
            'content' => 'required|min:1'
        ]);

        // $this->emit('mensajeEnviado');
        // GUARDAR MENSAJE
        $message = new Message();
        $message->content =  $this->content;
        $message->user_id_emisor = \Auth::user()->id;

        if($this->idUserNewChat){
            $chat = new Chat();
            $chat->user_id_one = \Auth::user()->id;
            $chat->user_id_two = $this->idUserNewChat;
            $chat->save();

            $message->chat_id = $chat->id;
        }else{
            $message->chat_id = $this->idChat;
        }    
        
        $message->save();
        
        if($this->idUserNewChat){
            $this->emit('renderUserChat', $chat->id, $this->idUserNewChat);
            $this->emit('shutDownNewMessage', $chat->id);    
            $this->idUserNewChat = '';
        }

        $this->emit('mensajeRecibido', $message->id);
        event(new \App\Events\EnviarMensaje($this->idChat));
        
        $this->content = '';

    }
}
