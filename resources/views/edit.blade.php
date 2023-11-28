<body>

  <form action="/update" method="POST" enctype="multipart/form-data">
   <table>
    @csrf
    <input type="hidden" name="id" value="{{$schedule->id}}">
    <tr><th>caption: </th><td><input type="text" name="caption" value="{{$schedule->caption}}"></td></tr>
    <tr><th>detail: </th><td><textarea name="detail">{{$schedule->detail}}</textarea></td></tr>
    <tr><th>date: </th><td><input type="date" name="date" value="{{ Str::before($schedule->datetime, ' ') }}"></td></tr>
    <tr><th>time: </th><td><input type="time" name="time" value="{{ Str::after($schedule->datetime, ' ') }}"></td></tr>

<tr><th>image1: </th>
<td>
@if(isset( $schedule->image1 ))
<a href="/storage/{{$schedule->image1}}"><img src="/storage/{{$schedule->image1}}" style="width: auto;height: 1em;" alt=""></a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="image1" value="{{$schedule->image1}}" accept=".jpg, .png" style="display:none;">
<input type="hidden" name="image1del" value="false">
@else
<input type="file" name="image1" value="{{$schedule->image1}}" accept=".jpg, .png">
@endif
</td></tr>


<tr><th>image2: </th>
<td>
@if(isset( $schedule->image2 ))
<a href="/storage/{{$schedule->image2}}"><img src="/storage/{{$schedule->image2}}" style="width: auto;height: 1em;" alt=""></a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="image2" value="{{$schedule->image2}}" accept=".jpg, .png" style="display:none;">
<input type="hidden" name="image2del" value="false">
@else
<input type="file" name="image2" value="{{$schedule->image2}}" accept=".jpg, .png">
@endif
</td></tr>


<tr><th>image3: </th>
<td>
@if(isset( $schedule->image3 ))
<a href="/storage/{{$schedule->image3}}"><img src="/storage/{{$schedule->image3}}" style="width: auto;height: 1em;" alt=""></a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="image3" value="{{$schedule->image3}}" accept=".jpg, .png" style="display:none;">
<input type="hidden" name="image3del" value="false">
@else
<input type="file" name="image3" value="{{$schedule->image3}}" accept=".jpg, .png">
@endif
</td></tr>


<tr><th>image4: </th>
<td>
@if(isset( $schedule->image4 ))
<a href="/storage/{{$schedule->image4}}"><img src="/storage/{{$schedule->image4}}" style="width: auto;height: 1em;" alt=""></a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="image4" value="{{$schedule->image4}}" accept=".jpg, .png" style="display:none;">
<input type="hidden" name="image4del" value="false">
@else
<input type="file" name="image4" value="{{$schedule->image4}}" accept=".jpg, .png">
@endif
</td></tr>


<tr><th>image5: </th>
<td>
@if(isset( $schedule->image5 ))
<a href="/storage/{{$schedule->image5}}"><img src="/storage/{{$schedule->image5}}" style="width: auto;height: 1em;" alt=""></a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="image5" value="{{$schedule->image5}}" accept=".jpg, .png" style="display:none;">
<input type="hidden" name="image5del" value="false">
@else
<input type="file" name="image5" value="{{$schedule->image5}}" accept=".jpg, .png">
@endif
</td></tr>


<tr><th>file1: </th>
<td>
@if(isset( $schedule->file1 ))
<a href="/storage/{{$schedule->file1}}">{{$schedule->file1}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="file1" value="{{$schedule->file1}}" accept=".pdf, .xlsx" style="display:none;">
<input type="hidden" name="file1del" value="false">
@else
<input type="file" name="file1" value="{{$schedule->file1}}" accept=".pdf, .xlsx">
@endif
</td></tr>


<tr><th>file2: </th>
<td>
@if(isset( $schedule->file2 ))
<a href="/storage/{{$schedule->file2}}">{{$schedule->file2}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="file2" value="{{$schedule->file2}}" accept=".pdf, .xlsx" style="display:none;">
<input type="hidden" name="file2del" value="false">
@else
<input type="file" name="file2" value="{{$schedule->file2}}" accept=".pdf, .xlsx">
@endif
</td></tr>


<tr><th>file3: </th>
<td>
@if(isset( $schedule->file3 ))
<a href="/storage/{{$schedule->file3}}">{{$schedule->file3}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="file3" value="{{$schedule->file3}}" accept=".pdf, .xlsx" style="display:none;">
<input type="hidden" name="file3del" value="false">
@else
<input type="file" name="file3" value="{{$schedule->file3}}" accept=".pdf, .xlsx">
@endif
</td></tr>


<tr><th>file4: </th>
<td>
@if(isset( $schedule->file4 ))
<a href="/storage/{{$schedule->file4}}">{{$schedule->file4}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="file4" value="{{$schedule->file4}}" accept=".pdf, .xlsx" style="display:none;">
<input type="hidden" name="file4del" value="false">
@else
<input type="file" name="file4" value="{{$schedule->file4}}" accept=".pdf, .xlsx">
@endif
</td></tr>


<tr><th>file5: </th>
<td>
@if(isset( $schedule->file5 ))
<a href="/storage/{{$schedule->file5}}">{{$schedule->file5}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="file" name="file5" value="{{$schedule->file5}}" accept=".pdf, .xlsx" style="display:none;">
<input type="hidden" name="file5del" value="false">
@else
<input type="file" name="file5" value="{{$schedule->file5}}" accept=".pdf, .xlsx">
@endif
</td></tr>


<tr><th>maplink: </th>
<td>
@if(isset( $schedule->maplink ))
<a href="{{$schedule->maplink}}">{{$schedule->maplink}}</a>
<button type="button" class="btn iza" onclick="delButtonClick(this)">del</button>
<input type="text" name="maplink" value="" style="display:none;">
<input type="hidden" name="maplinkdel" value="false">
@else
<input type="text" name="maplink" value="">
@endif
</td></tr>


    </table>
<button type="submit">更新</button>
  </form>





<script>
function delButtonClick(button){
  button.setAttribute('style', 'display: none;');    //ボタンを非表示
  let next = button.nextElementSibling;
  next.setAttribute('style', 'display: inline;');    //<input type="file" ******  accept=".jpg, .png">の非表示を解除
  let next2 = next.nextElementSibling;
  next2.setAttribute('value', 'true');  
  let prev = button.previousElementSibling;
  prev.setAttribute('style', 'display: none;');    //<a href***><img src****></a> を非表示
}

</script>

</body>