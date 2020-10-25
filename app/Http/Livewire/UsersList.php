<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;
use App\Models\User;
use App\Models\Message;

class UsersList extends Component
{
    public $chat;
    public $newMessage;
    public $message;
    public $idUser;

    protected $queryString = ['chat' => ['except' => ''], 'message' => ['except' => '']];
    protected $listeners = ['reciveCreateNewMessage','shutDownNewMessage', 'notificacionNuevoMensaje'];

    public function mount(){
        $this->chat = '';
        $this->newMessage = '';
        $this->message = '';

        if(isset($_GET['message'])){
            $this->reciveCreateNewMessage($_GET['message']);
        }
    }

    public function changeChatUser($idChat,$idUser,$lastRead=NULL){
        $this->chat = $idChat;
        $this->newMessage = '';
        $this->message = '';
        $this->emit('renderUserChat', $this->chat, $idUser);
        if($lastRead != null){
            // poner en leido los ultimos lastRead, mensajes del usuario idUser
            Message::where('user_id_emisor', $idUser)
            ->orderBy('created_at','desc')
            ->limit($lastRead)
            ->update(['was_read' => 1]);
        }

    }

    public function shutDownNewMessage($idChat){
        $this->chat = $idChat;
        $this->newMessage = '';
        $this->idUser = '';
    }

    public function notificacionNuevoMensaje($idChat){
        $existChat = Chat::where('id', $idChat)
        ->where( function($query) {
            $query->where('user_id_two', \Auth::user()->id)->orWhere('user_id_one', \Auth::user()->id);
        })
        ->first();
        if($existChat){
            if($this->chat == $idChat){
                //renderizo los mensajes del chat list
                $this->emit('mensajeRecibido', $idChat);
             
                $usuarioChat;
             
                if($existChat->user_id_one == \Auth::user()->id){
                    $usuarioChat = $existChat->user_id_two;
                }else{
                    $usuarioChat = $existChat->user_id_one;
                }
    
                Message::where('user_id_emisor', $usuarioChat)
                ->where('chat_id', $idChat)
                ->orderBy('created_at','desc')
                ->limit(1)
                ->update(['was_read' => 1]);
            }
        }
    }

    public function reciveCreateNewMessage($idUser){
        $this->idUser = $idUser;
        $existChat = Chat::where('user_id_one', $idUser)
        ->where('user_id_two', \Auth::user()->id)
        ->orWhere( function($query) {
            $query->where('user_id_two', $this->idUser)->where('user_id_one', \Auth::user()->id);
        })
        ->first();
        if($existChat){
            // seleccionar en mi lista el chat
            $this->changeChatUser($existChat->id, $idUser);
        }else{
            // crear un chat temporal (NO GUARDADO EN LA BASE DE DATOS)
            $this->newMessage = User::where('id', $this->idUser)->first();
            // emitir evento a chat list y form
            $this->emit('renderNewChat', $this->idUser);
        }
    }

    public function render()
    {
        return view('livewire.users-list',[
            'chatsUsers' => Chat::orderBy('created_at','desc')
            ->where('user_id_one', \Auth::user()->id)
            ->orWhere('user_id_two', \Auth::user()->id)
            ->get()
        ]);
    }
}
