<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
  private $schedule;
  public function __construct()
  {
      $this->schedule = new Schedule();
  }

  public function trip(Request $request)
  {
    $records = Schedule::all()->sortBy('datetime');
    foreach ($records as $row){
      //URL抽出の正規表現
      $pattern = '/https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+/';
      //該当する文字列に処理
      $row->detail = preg_replace_callback($pattern,function ($matches) {
          return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
      },nl2br(htmlspecialchars($row->detail)));      
    }
    return view('trip', ['schedules' => $records]);
  }

  
  
  public function alldata(Request $request)
  {
    $records = Schedule::all();
    return view('show', ['schedules' => $records]);
  }

  //データ登録
  public function store(Request $request)
  {
      // $request->datetime = '2020-01-01 13:30' という形式で保存
      $request->datetime = $request->date . ' ' . $request->time;

      if ($request->has('file1')) {
          $path1 = $request->file('file1')->store('public');    //ファイルを保存し、パスを保存 dd($path1)
          $request->file1 = pathinfo($path1, PATHINFO_BASENAME);//ファイル名.拡張子のみ
      }
      if ($request->has('file2')) {
          $request->file2 = pathinfo($request->file('file2')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('file3')) {
          $request->file3 = pathinfo($request->file('file3')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('file4')) {
          $request->file4 = pathinfo($request->file('file4')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('file5')) {
          $request->file5 = pathinfo($request->file('file5')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('image1')) {
          $request->image1 = pathinfo($request->file('image1')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('image2')) {
          $request->image2 = pathinfo($request->file('image2')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('image3')) {
          $request->image3 = pathinfo($request->file('image3')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('image4')) {
          $request->image4 = pathinfo($request->file('image4')->store('public'), PATHINFO_BASENAME);
      }
      if ($request->has('image5')) {
          $request->image5 = pathinfo($request->file('image5')->store('public'), PATHINFO_BASENAME);
      }

      $this->schedule->InsertSchedule($request);   
      // dd($request->all());  //$requestの中身表示    
      // return redirect()->route('schedule.all');
      return redirect()->route('schedule.route');
  }


  // public function edit(Request $request)
  // {
  //     $param = ['id' => $request->id];
  //     $item = DB::select('select * from schedules where id = :id',$param);
  //     return view('edit',['schedule' => $item[0]]);
  // }

  public function edit2($id)
  {
      $schedule = Schedule::find($id);  
      return view('edit',['schedule' => $schedule]);
  }
  // public function update(Request $request)
  // {
  //     if ($request->has('file1')) {
  //         $path1 = $request->file('file1')->store('public');    //ファイルを保存し、パスを保存 dd($path1)
  //         $request->file1 = pathinfo($path1, PATHINFO_BASENAME);//ファイル名.拡張子のみ
  //     }

  //     $param = [
  //         'id' => $request->id,
  //         'caption' => $request->caption,
  //         'detail' => $request->detail,
  //         'file1' => $request->file1,
  //     ];
    
  //     DB::update('update schedules set caption = :caption, detail = :detail, file1 = :file1 where id = :id',$param);

  //     return redirect()->route('schedule.all');
  // }

  public function update(Request $request)  
  {  
    $schedule = Schedule::find($request->id);  
    $schedule->caption = $request->caption;
    $schedule->detail = $request->detail;
    // $request->datetime = '2020-01-01 13:30' という形式で保存
    $schedule->datetime = $request->date . ' ' . $request->time;
    
    if ($request->image1del == 'true') {
      $schedule->image1 = Null;
    }
    if ($request->image2del == 'true') {
      $schedule->image2 = Null;
    }
    if ($request->image3del == 'true') {
      $schedule->image3 = Null;
    }
    if ($request->image4del == 'true') {
      $schedule->image4 = Null;
    }
    if ($request->image5del == 'true') {
      $schedule->image5 = Null;
    }
    if ($request->file1del == 'true') {
      $schedule->file1 = Null;
    }
    if ($request->file2del == 'true') {
      $schedule->file2 = Null;
    }
    if ($request->file3del == 'true') {
      $schedule->file3 = Null;
    }
    if ($request->file4del == 'true') {
      $schedule->file4 = Null;
    }
    if ($request->file5del == 'true') {
      $schedule->file5 = Null;
    }
    if ($request->maplinkdel == 'true') {
      $schedule->maplink = Null;
    }
    if ($request->has('image1')) {
      $schedule->image1 = pathinfo($request->file('image1')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('image2')) {
      $schedule->image2 = pathinfo($request->file('image2')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('image3')) {
      $schedule->image3 = pathinfo($request->file('image3')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('image4')) {
      $schedule->image4 = pathinfo($request->file('image4')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('image5')) {
      $schedule->image5 = pathinfo($request->file('image5')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('file1')) {
      $schedule->file1 = pathinfo($request->file('file1')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('file2')) {
      $schedule->file2 = pathinfo($request->file('file2')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('file3')) {
      $schedule->file3 = pathinfo($request->file('file3')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('file4')) {
      $schedule->file4 = pathinfo($request->file('file4')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('file5')) {
      $schedule->file5 = pathinfo($request->file('file5')->store('public'), PATHINFO_BASENAME);
    }
    if ($request->has('maplink')) {
      $schedule->maplink = $request->maplink;
    }

    $schedule->save();
    return redirect()->route('schedule.all');
  }


  //非同期通信テスト
  public function getIndex()
  {
      return view('ajaxtest');
  }
  public function showAll()
  {   
      //インデックス配列を、sortBy() すると、順番が入れ替わる場合に連想配列になるので values() メソッドを利用し配列の番号を振り直し、インデックス配列に強制。
      $records = Schedule::all()->sortByDesc('datetime')->values();  
      // ヘッダーを指定することによりjsonの動作を安定させる
      header('Content-type: application/json');
      // htmlへ渡す配列$productListをjsonに変換する
      echo json_encode($records);
  }
  
}
