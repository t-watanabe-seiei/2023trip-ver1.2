<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Schedule;
use Illuminate\Support\Str;

class Timetable extends Component
{
  use WithFileUploads;
  public $schedules;
  public $images = [];
  public $files = [];
  public $path;

  public $caption;
  public $detail;
  public $date;
  public $time;
  public $image1;
  public $image2;
  public $image3;
  public $file1;
  public $file2;
  public $file3;
  
  public $schedule;

  public $isNewScheduleCard = false;
  public $isEditScheduleCard = false;

  // protected $listeners = ['accordion' => 'openAccordion'];
  
  public function mount(){

  }

  public function render()
  {   
    $this->schedules = Schedule::all()->sortBy('datetime');
    foreach ($this->schedules as $row){
      //URL抽出の正規表現
      $pattern = '/https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+/';
      //該当する文字列に処理
      $row->detail = preg_replace_callback($pattern,function ($matches) {
          return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
      },nl2br(htmlspecialchars($row->detail)));      
    }
    return view('livewire.timetable');
  }

  
  public function openAccordion()
  {
    logger('openAccordionが実行されました');
  }

  //javascriptのイベント実行
  public function openEditCard($id , $caption , $date)
  {
      $this->schedule = Schedule::find($id);  
      $this->caption = $this->schedule->caption;
      $this->detail = $this->schedule->detail;
      $this->date = Str::before($this->schedule->datetime, ' ');
      $this->time = Str::after($this->schedule->datetime, ' ');
      $this->image1 = $this->schedule->image1;
      $this->image2 = $this->schedule->image2;
      $this->image3 = $this->schedule->image3;
      $this->file1 = $this->schedule->file1;
      $this->file2 = $this->schedule->file2;
      $this->file3 = $this->schedule->file3;
    
      if($this->isNewScheduleCard){
        $this->isNewScheduleCard = false;
      }
      $this->isEditScheduleCard = true;      

      //jsのイベントを発火させる
      $this->dispatchBrowserEvent('show_card',['currentDate' => Str::before($this->schedule->datetime, ' ')]);
  }
  
  public function save()
  {

      //バリデーション発動、ひっかかったらここで止まります
      $this->validate([
        'caption' => 'required',
        'detail' => 'required',
        'images.*' => 'image|max:10240', // 最大１0ＭＢ
        'files.*' => 'max:10240', // 最大１0ＭＢ
      ],
      [
        'caption.required' => 'captionを入力してください',
        'detail.required' => '詳細を入力してください',
        'images.*.image' => '画像ファイルを選択してください。',
        'images.*.max:10240' => '画像ファイルサイズが大きすぎ',
        'files.*.max:10240' => 'ファイルサイズが大きすぎです',
      ]);
    

      $schedule = new Schedule();
      $schedule->caption = $this->caption;
      $schedule->detail = $this->detail;
      $schedule->datetime = $this->date . " " . $this->time;
    
      $counter = 1;
      foreach ($this->images as $image) {
          $path = pathinfo($image->store('public'), PATHINFO_BASENAME);//ファイル名.拡張子のみ

          switch ($counter){
            case 1:
              $schedule->image1 = $path;
              break;
            case 2:
              $schedule->image2 = $path;
              break;
            case 3:
              $schedule->image3 = $path;
              break;
            default:
          }    
        
          if($counter >= 3) {break;}    //ファイルアップロードは3つまで
          $counter++;
      }
      $counter = 1;
      foreach ($this->files as $file) {
          $path = pathinfo($file->store('public'), PATHINFO_BASENAME);//ファイル名.拡張子のみ
  
          switch ($counter){
            case 1:
              $schedule->file1 = $path;
              break;
            case 2:
              $schedule->file2 = $path;
              break;
            case 3:
              $schedule->file3 = $path;
              break;
            default:
          }    

          if($counter >= 3) {break;}    //ファイルアップロードは3つまで
          $counter++;
      }
      
      // dd($schedule);
      // logger($schedule);

      $schedule->save();
  
  }

  
}
