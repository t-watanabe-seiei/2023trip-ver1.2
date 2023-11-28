<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <h1>初めてのLivewire@@</h1>
    <h2>{{ $count }}</h2>
    <p><button wire:click="inc">+1</button></p>

    <input type="text" wire:model.lazy="message" />{{ $message }}

    @if(!$message)
    <p style="color:red;font-weight:bold">文字を入力してください。</p>
    @else
    <p>文字を入力しました。</p>
    @endif


  <div>
    <h2>ユーザ一覧</h2>
    <ul>
      @foreach($schedules as $schedule)
        <li>{{ $schedule->id }}　{{ $schedule->caption }}  <button wire:click="delSchedule({{ $schedule->id }})">削除</button></li>
      @endforeach
    </ul>
  </div>

</div>

