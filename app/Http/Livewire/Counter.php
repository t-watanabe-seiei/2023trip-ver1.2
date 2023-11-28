<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Schedule;

class Counter extends Component
{
    public $count = 10;
    public $message;
    public $schedules;

    public function mount(){
      $this->schedules = Schedule::all();
    }
  
    public function delSchedule($id){
        //$idを引き継いで、trueを返したアイテムだけが残る
        $this->schedules = $this->schedules->filter(function($value, $key) use($id){    
            return $value['id'] != $id;
        });
        //データベースから削除
        $schedule = Schedule::find($id);
        $schedule->delete();
    }
  
    public function inc(){
        $this->count++;
    }
  
    public function render()
    {
        return view('livewire.counter');
    }
}
