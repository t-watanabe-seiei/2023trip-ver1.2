<div> <!--  compornent ココから  -->

<!-- ***********************************  bootstrap navi-bar  ***************************************** -->
<div class='fixed-top'>  <!-- navi-barをTopに固定 -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="#">たびのしおり</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-3">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#">introduction</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link" href="#">What to bring</a>
        </li>

        <li class="nav-item mx-3">
          <a class="nav-link disabled">allowance</a>
        </li>

        <!-- li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li -->

      </ul>

      <button type="button" class="btn btn-success mx-1" wire:click="$toggle('isNewScheduleCard')">new</button>
      <button type="button" class="btn btn-success mx-1" wire:click="$toggle('isEditScheduleCard')">edit</button>

      <!-- form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form -->



    </div>
  </div>
</nav>
</div>
<!-- ***********************************  bootstrap navi-bar  ここまで***************************************** -->







<div class="container-fluid" style="margin-top: 4em;">　
　
  <div class="row">
    <h6>ーSCHEDULEー　{{ $date }}</h6>

    <div class="col-sm-7">
<!--  ***********************スケジュールの表示　view***************************************************** -->


      <div class="accordion mt-1" id="accordionExample2">    
      @php
        $scheduleDate = '';
      @endphp
      
      @foreach ($schedules as $schedule)  	     
          @if ($scheduleDate != Str::before($schedule->datetime, ' '))
      
              @if ($scheduleDate != '')　　	{{-- レコード２件目以降 前件のaccordion-item   accordion-collapse   accordion-body   ul を閉じる --}}
                   </ul>
                  </div>
                  </div>
                  </div>
              @endif
      
              <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ Str::before($schedule->datetime, ' ') }}" aria-expanded="false" aria-controls="{{ Str::before($schedule->datetime, ' ') }}">
                  {{ Str::before($schedule->datetime, ' ') }}   <!-- 半角スペースより左が日付 -->
                </button>
              </h2>

              <div id="{{ Str::before($schedule->datetime, ' ') }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">

              <div class="accordion-body">
                <ul class="time-schedule"> 
          @endif
      
              <li>
                <span class="time">{{ Str::after($schedule->datetime, ' ') }}</span>    <!-- 半角スペースより右が時刻 -->
                <div class="sch_box">
                  <p class="sch_title">
                    <span class="under">{{$schedule->caption}}</span>
                    <a class="btn" role="button" wire:click="openEditCard({{ $schedule->id }}, '{{ $schedule->caption }}' , '{{ Str::before($schedule->datetime, ' ') }}')"><i class="fa-solid fa-pen-to-square"></i></a>
                  </p>
                  <p class="sch_tx">
      
                  @if (!empty($schedule->image1))　　{{-- image1が空じゃなければ・・・ --}}
      
                    <!-- カルーセルで画像表示　画像をクリックすると、lighbox 用 modal で画像を表示 -->    
                        <div id="{{ $schedule->image1 }}" class="carousel slide mb-4" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <a 
                                data-bs-toggle="modal" 
                                data-bs-target="#lightboxModalFullscreen" 
                                data-bs-lightbox="storage/{{ $schedule->image1 }}" role="button">
                                  <img 
                                     src="storage/{{ $schedule->image1 }}" 
                                     class="img-fluid img-thumbnail rounded mx-auto d-block w-75"
                                  />
                              </a>
                            </div>
      
                          @if (!empty($schedule->image2))　　{{-- image2が空じゃなければ・・・ --}}
                            <div class="carousel-item">
                              <a 
                                data-bs-toggle="modal" 
                                data-bs-target="#lightboxModalFullscreen" 
                                data-bs-lightbox="storage/{{ $schedule->image2 }}" 
                                role="button">
                                  <img 
                                    src="storage/{{ $schedule->image2 }}" 
                                    class="img-fluid img-thumbnail rounded mx-auto d-block w-75" />
                              </a>
                            </div>
                          @endif
      
      
                          @if (!empty($schedule->image3))　　{{-- image3が空じゃなければ・・・ --}}
                            <div class="carousel-item">
                              <a 
                                data-bs-toggle="modal" 
                                data-bs-target="#lightboxModalFullscreen" 
                                data-bs-lightbox="storage/{{ $schedule->image3 }}" 
                                role="button">
                                  <img 
                                    src="storage/{{ $schedule->image3 }}" 
                                    class="img-fluid img-thumbnail rounded mx-auto d-block w-75" />
                              </a>
                            </div>
                          @endif
      
      
                          @if (!empty($schedule->image4))　　{{-- image4が空じゃなければ・・・ --}}
                            <div class="carousel-item">
                              <a 
                                data-bs-toggle="modal" 
                                data-bs-target="#lightboxModalFullscreen" 
                                data-bs-lightbox="storage/{{ $schedule->image4 }}" 
                                role="button">
                                  <img 
                                    src="storage/{{ $schedule->image4 }}" 
                                    class="img-fluid img-thumbnail rounded mx-auto d-block w-75" />
                              </a>
                            </div>
                          @endif
      
      
                          @if (!empty($schedule->image5))　　{{-- image5が空じゃなければ・・・ --}}
                            <div class="carousel-item">
                              <a 
                                data-bs-toggle="modal" 
                                data-bs-target="#lightboxModalFullscreen" 
                                data-bs-lightbox="storage/{{ $schedule->image5 }}" 
                                role="button">
                                  <img 
                                    src="storage/{{ $schedule->image5 }}" 
                                    class="img-fluid img-thumbnail rounded mx-auto d-block w-75" />
                              </a>
                            </div>
                          @endif
      
      
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#{{ $schedule->image1 }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#{{ $schedule->image1 }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                    <!-- カルーセル ここまで -->
                  @endif
      
      
      
      
      
      
      
      
                  <p class="text-start mx-5">
                    {!! $schedule->detail !!}
                  </p>
      
                    @if (!empty($schedule->file1))　　{{-- file1が空じゃなければボタン表示 --}}
                      <a class="btn btn-outline-primary btn-sm m-2" role="button" href="storage/{{ $schedule->file1 }}" target="_blank">添付ファイル１</a>
                    @endif
      
                    @if (!empty($schedule->file2))　　{{-- file2が空じゃなければボタン表示 --}}
                      <a class="btn btn-outline-primary btn-sm m-2" role="button" href="storage/{{ $schedule->file2 }}" target="_blank">添付ファイル２</a>
                    @endif

                    @if (!empty($schedule->file3))　　{{-- file2が空じゃなければボタン表示 --}}
                      <a class="btn btn-outline-primary btn-sm m-2" role="button" href="storage/{{ $schedule->file3 }}" target="_blank">添付ファイル３</a>
                    @endif
                  </p>
                </div>
              </li>
      
          @if ($loop->last)    	{{-- @foreachループの最後 --}}
              </ul>
            </div>
            </div>
            </div>
          @endif
      
          @php
            $scheduleDate = Str::before($schedule->datetime, ' ');
          @endphp
      
      @endforeach
      
      </div>




<!--  *************************スケジュールの表示　view end********************************************* -->
    </div>
    <div class="col-sm-5">


<!--  *****************new schedule 用のカード************************************************ -->

@if ($isNewScheduleCard)
  <div class="card mt-1 schedule_card" style="position: sticky;top: 60px;" id="new_schedule_card">
    <h5 class="card-header">new schedule</h5>
    <div class="card-body">
      <h5 class="card-title">Insert time schedule</h5>
      <p class="card-text">Please enter the required information.</p>
  
  
          <form wire:submit.prevent="save">
            <div class="mb-3">
              <label for="caption" class="form-label">caption</label>
              <input type="text" class="form-control" name="caption" id="caption" wire:model.defer="caption">
            </div>
  
            <div class="mb-3">
              <label for="detail" class="form-label">detail</label>
              <textarea class="form-control" id="detail" name="detail" rows="5" wire:model.defer="detail"></textarea>
            </div>
  
            <div class="row mb-3">
              <div class="col">
                <label for="date" class="form-label">date</label>
                <input type="date" class="form-control" name="date" id="date" wire:model.defer="date">
              </div>
              <div class="col">
                <label for="time" class="form-label">time</label>
                <input type="time" class="form-control" name="time" id="time" wire:model.defer="time">
              </div>
            </div>
  
            <div class="mb-3">
              <label for="images" class="form-label">images</label>
              <input type="file" wire:model="images" accept=".jpg, .jpeg, .png, .gif" class="form-control" multiple>
              @error('images.*') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div> 
  
            <div class="mb-3">
            <label for="images" class="form-label">files</label>
                <input type="file" wire:model="files" accept=".pdf, .xlsx, .docx" class="form-control" multiple>
                @error('files.*') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
  
            <div class="mb-3">
              <button type="submit">Save</button>
            </div>
  
          </form>
  
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
  
    </div>
  </div>
@endif





<!-- *******************new schedule 用のカード end********************* -->




<!--  *****************edit schedule 用のカード************************************************ -->

@if ($isEditScheduleCard)
      <div class="card mt-1 schedule_card" style="position: sticky;top: 60px;" id="edit_schedule_card">
        <h5 class="card-header">edit schedule</h5>
        <div class="card-body">
          <h5 class="card-title">edit time schedule</h5>
          <p class="card-text">Please enter the required information.</p>


              <form wire:submit.prevent="save">
                <div class="mb-3">
                  <label for="caption" class="form-label">caption</label>
                  <input type="text" class="form-control" name="caption" id="caption" wire:model.defer="caption">
                </div>

                <div class="mb-3">
                  <label for="detail" class="form-label">detail</label>
                  <textarea class="form-control" id="detail" name="detail" rows="5" wire:model.defer="detail"></textarea>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control" name="date" id="date" wire:model.defer="date">
                  </div>
                  <div class="col">
                    <label for="time" class="form-label">time</label>
                    <input type="time" class="form-control" name="time" id="time" wire:model.defer="time">
                  </div>
                </div>




<div class="row">　<!-- 画像１～３　-->
  <div class="col">
    @if(isset( $image1 ))
    <div class="mb-3">
      <label for="image1" class="form-label">image1</label>
      <a href="/storage/{{$image1}}" target="_blank"><img src="/storage/{{$image1}}" style="width: auto;height: 1em;" alt=""></a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="image1" value="{{$image1}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="image1del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="image1" class="form-label">image1</label>
      <input type="file" wire:model.defer="image1" value="{{$image1}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm">
      </div>
    @endif 
  </div>

  <div class="col">
    @if(isset( $image2 ))
    <div class="mb-3">
      <label for="image2" class="form-label">image2</label>
      <a href="/storage/{{$image2}}" target="_blank"><img src="/storage/{{$image2}}" style="width: auto;height: 1em;" alt=""></a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="image2" value="{{$image2}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="image2del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="image2" class="form-label">image2</label>
      <input type="file" wire:model.defer="image2" value="{{$image2}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm">
      </div>
    @endif 
  </div>

  <div class="col">
    @if(isset( $image3 ))
    <div class="mb-3">
      <label for="image3" class="form-label">image3</label>
      <a href="/storage/{{$image3}}" target="_blank"><img src="/storage/{{$image3}}" style="width: auto;height: 1em;" alt=""></a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="image3" value="{{$image3}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="image3del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="image3" class="form-label">image3</label>
      <input type="file" wire:model.defer="image3" value="{{$image3}}" accept=".jpg, .jpeg, .png, .gif" class="form-control form-control-sm">
      </div>
    @endif 
  </div>
</div>　<!-- div class="row" ここまで画像１～３　-->




<div class="row">　<!-- 添付ファイル１～３　-->
  <div class="col">
    @if(isset( $file1 ))
    <div class="mb-3">
      <label for="file1" class="form-label mr-2">file2</label>
      <a href="/storage/{{$file1}}" target="_blank">link</a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="file1" value="{{$file1}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="file1del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="file1" class="form-label mr-2">file1</label>
      <input type="file" wire:model.defer="file1" value="{{$file1}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm">
      </div>
    @endif 
  </div>

  <div class="col">
    @if(isset( $file2 ))
    <div class="mb-3">
      <label for="file2" class="form-label mr-2">file2</label>
      <a href="/storage/{{$file2}}" target="_blank">link</a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="file2" value="{{$file2}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="file2del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="file2" class="form-label mr-2">file2</label>
      <input type="file" wire:model.defer="file2" value="{{$file2}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm">
      </div>
    @endif 
  </div>

  <div class="col">
    @if(isset( $file3 ))
    <div class="mb-3">
      <label for="file3" class="form-label mr-2">file3</label>
      <a href="/storage/{{$file3}}" target="_blank">link</a>
      <button type="button" class="btn btn-outline-secondary btn-sm iza" onclick="delButtonClick(this)">del</button>
      <input type="file" wire:model.defer="file3" value="{{$file3}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm" style="display:none;">
      <input type="hidden" name="file3del" value="false">
    </div> 
    @else
      <div class="mb-3">
      <label for="file3" class="form-label mr-2">file3</label>
      <input type="file" wire:model.defer="file3" value="{{$file3}}" accept=".pdf, .xlsx, .docx" class="form-control form-control-sm">
      </div>
    @endif 
  </div>


</div><!-- div class="row" ここまで添付ファイル１～３　-->







                <div class="mb-3">
                  <button type="submit">Save</button>
                </div>

              </form>

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

        </div>
      </div>
@endif



<!-- *******************edit schedule 用のカード end********************* -->






    </div>
  </div>
</div>　　<!--   div class="container-fluid"  ココマデ*********************************  -->







<script>
  //edit schedule の際、該当日付のアコーディオンを開く
  window.addEventListener('show_card', event => {
      //if(confirm('編集します。よろしいですか？')) {
          //console.log(event.detail.currentDate);
          var elm = document.getElementById(event.detail.currentDate); 
          elm.classList.toggle("show");
      //}
  })

//該当日付のアコーディオンを開く処理
function openAccordion(date){
  var elm = document.getElementById(date); 
  elm.classList.toggle("show");
}

  //****************************Livewire のイベントリスナで処理できそう。そうしないと、画像をあっぷしただけで、アコーディオンが閉じちゃう・・・

  //Editボタンを押した際、画像ファイルor添付ファイルがある場合の、Delボタンの処理
  function delButtonClick(button){
    button.setAttribute('style', 'display: none;');    //ボタンを非表示
    let next = button.nextElementSibling;
    next.setAttribute('style', 'display: inline;');    //<input type="file" ******  accept=".jpg, .png">の非表示を解除
    let next2 = next.nextElementSibling;
    next2.setAttribute('value', 'true');  
    let prev = button.previousElementSibling;
    prev.setAttribute('style', 'display: none;');    //<a href***><img src****></a> を非表示
    //Livewire.emit('accordion');
  }
</script>














</div>　<!--  compornent ココまで  -->