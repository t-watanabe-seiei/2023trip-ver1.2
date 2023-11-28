<body>

  <h1>show</h1>
  @foreach ($schedules as $schedule)
    <p>{{$schedule->id}}　　　　　{{$schedule->datetime}}</p>
    <p>{{$schedule->caption}}</p>
    <p>{{$schedule->detail}}</p>
  @endforeach





  
<h5>登録用フォーム</h5>
<form action="/store" method="POST" enctype="multipart/form-data">
@csrf
  <div>
    <label for="caption">caption</label>
    <input type="text" class="form-control" name="caption" id="caption">
  </div>
    
  <div>
    <label for="detail">detail</label>
    <input type="text" class="form-control" name="detail" id="detail">
  </div>

  <div>
    <label for="date">date</label>
    <input type="date" class="form-control" name="date" id="date">
  </div>
  
  <div>
    <label for="time">time</label>
    <input type="time" class="form-control" name="time" id="time">
  </div>

  <div>
    file1
    <input type="file" accept=".pdf, .xlsx"　id="file1" name="file1" class="form-control" />
  </div>
  <div>
    file2
    <input type="file" accept=".pdf, .xlsx"　id="file2" name="file2" class="form-control" />
  </div>
  <div>
    image1
    <input type="file" accept=".jpg, .jpeg, .png, .gif"　id="image1" name="image1" class="form-control" />
  </div>
  <div>
    image2
    <input type="file" accept=".jpg, .jpeg, .png, .gif"　id="image2" name="image2" class="form-control" />
  </div>
  <div>
    image3
    <input type="file" accept=".jpg, .jpeg, .png, .gif"　id="image3" name="image3" class="form-control" />
  </div>
  
  <button type="submit">登録</button>
 </form>

</body>