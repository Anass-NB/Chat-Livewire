<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
  public $message = "";
  public function render()
  {
    
    return view('livewire.chat',[
      "messages" => Message::with("user")->get(),
    ]);
  }

  public function send()
  {
    
    try{
      if($this->message != ""){
        Message::create([
          "user_id" => auth()->user()->id,
          "message" => $this->message,
        ]);
        $this->reset("message");
      }
    
    }catch(\Exception $ex){
      return $ex;
    }
    
  }
}
