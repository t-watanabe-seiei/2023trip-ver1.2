<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://glitch.com/favicon.ico" />

    <title>たびのしおり</title>

    <link rel="stylesheet" href="/css/app.css">
    <style type="text/css">
      /* bootstrap modal 用 */
      .modal-lightbox {background-color:unset!important;}
    </style>

    <!-- bootstrap CDN -->
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet" 
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />

    <script src="/js/app.js" defer></script>

  </head>
  <body>


<!--  bootstrap navi-bar  -->
<div class='fixed-top'>  <!-- navi-barをTopに固定 -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">たびのしおり</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <button class="btn btn-outline-primary mx-3" type="submit">Insert</button>
      <!-- form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form -->


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


    </div>
  </div>
</nav>
</div>
    
    
    


<div class="container">






    <hr>
        <p>TAKETOMI TRIP September 10</p>

<h6>ーSCHEDULEー</h6>





<!-- Modal 新規入力用 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
<form action="/store" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


@csrf
  <div class="mb-3">
    <label for="caption" class="form-label">caption</label>
    <input type="text" class="form-control" name="caption" id="caption">
  </div>

<div class="mb-3">
  <label for="detail" class="form-label">detail</label>
  <textarea class="form-control" id="detail" name="detail" rows="5"></textarea>
</div>


<div class="row mb-3">
  <div class="col">
    <label for="date" class="form-label">date</label>
    <input type="date" class="form-control" name="date" id="date">
  </div>
  <div class="col">
    <label for="time" class="form-label">time</label>
    <input type="time" class="form-control" name="time" id="time">
  </div>
</div>


<div class="mb-3">
  <label for="form1" class="form-label">file1</label>
  <input type="file" accept=".pdf, .xlsx"　id="file1" name="file1" class="form-control form-control-sm" />
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

  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>

 </form>

  </div>
</div>



  <!-- lighbox 用 modal  -->    
  <div class="modal fade" id="lightboxModalFullscreen" tabindex="-1" aria-labelledby="lightboxModalFullscreenLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" data-bs-dismiss="modal" aria-label="Close">
        <div class="modal-content modal-lightbox">
          <div class="modal-body d-flex align-items-center justify-content-center">
            <img src="" class="img-fluid" id="LightboxImage" data-bs-dismiss="modal" aria-label="Close" />
          </div>
        </div>
      </div>
  </div>

  <div class="accordion" id="accordionExample2">    
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
                {{ Str::before($schedule->datetime, ' ') }}    <!-- 半角スペースより左が日付 -->
              </button>
            </h2>
  
            <div id="{{ Str::before($schedule->datetime, ' ') }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              <ul class="time-schedule"> 
        @endif

            <li>
              <span class="time">{{ Str::after($schedule->datetime, ' ') }}</span>    <!-- 半角スペースより右が時刻 -->
              <div class="sch_box"><p class="sch_title"><span class="under">{{$schedule->caption}}</span></p>
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









                  {!! $schedule->detail !!}


                  @if (!empty($schedule->file1))　　{{-- file1が空じゃなければボタン表示 --}}
                    <a class="btn btn-outline-primary btn-sm mb-2" role="button" href="storage/{{ $schedule->file1 }}" target="_blank">添付ファイル１</a>
                  @endif

                  @if (!empty($schedule->file2))　　{{-- file2が空じゃなければボタン表示 --}}
                    <a class="btn btn-outline-primary btn-sm mb-2" role="button" href="storage/{{ $schedule->file2 }}" target="_blank">添付ファイル２</a>
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

  








    

    
  


  


  

{{--  以下コメントアウト
<hr>
  
  

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Day #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">




    
 <ul class="time-schedule">
  <li>
    <span class="time">9:30</span>
    <div class="sch_box"><p class="sch_title"><span class="under">離島ターミナル</span></p>
      <p class="sch_tx">
      石垣島発フェリーに乗って竹富島へ！<br>チケットはネットで予約!約10分前にアナウンスが流れるからその番号の乗り場に向かう
      </p>
   </div> <!--sch_box-->  
  </li>

   <li>
    <span class="time"></span>
    <div class="sch_box">
      <p class="sch_title"><span class="under">移動</span></p>
      <p class="sch_tx">集落まで徒歩15分ほど👣⸒⸒<span class="under">友利観光</span>で自転車を借りる！
      </p>


<!-- PDFファイル 新規タブで開く　サンプル -->
        <a class="btn btn-outline-success btn-sm mb-2" role="button" href="https://seiei.ac.jp/pdf/seiei_requirements_2022.pdf" target="_blank">PDF</a>

<!-- googleMapを　新規タブで開く　サンプル -->
        <a class="btn btn-outline-primary btn-sm mb-2" role="button" href="https://maps.app.goo.gl/WFSVP1L7HYYZK3TS6" target="_blank">MAP</a>.
      
      

      <iframe src="https://seiei.ac.jp/pdf/seiei_requirements_2022.pdf" frameborder="0" style="border:none;"></iframe>
      
      <!-- <embed src="https://seiei.ac.jp/pdf/seiei_requirements_2022.pdf" type="application/pdf" width="100%" height="100%"> -->

      <div class="switchdsp">
        <label for="l-1">
        <span class="clicktxt">map</span>
        </label>
        <input type="checkbox" id="l-1"><div class="dsp">
        <p>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3635.49807047792!2d124.08878700000001!3d24.329137!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3460755e2b20e4a3%3A0x902c5152025b7d46!2z5qCq5byP5Lya56S-5Y-L5Yip6Kaz5YWJ!5e0!3m2!1sja!2sjp!4v1696538354952!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        </p>
        </div></div>      
    </div>

  </li>
  <li>
    <span class="time">11:00</span>
    <div class="sch_box"><p class="sch_title"><span class="under">お食事処かにふ</span></p>
      <p class="sch_tx">
      混み出す前にランチ！定休日でなくても急にお休みになることも多くあるから事前に電話📞
      </p>
    </div>
    <div class="switchdsp">
<label for="l-2">
<span class="clicktxt">map</span>
</label>
<input type="checkbox" id="l-2"><div class="dsp">
<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1817.73968571407!2d124.08666459132934!3d24.3297887931407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346075c98dadda59%3A0x89a44e596354c351!2z44GK6aOf5LqL5YemIOOBi-OBq-OBtQ!5e0!3m2!1sja!2sjp!4v1692101643806!5m2!1sja!2sjp" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
</div></div>
</p>
  </li>
  <li>
    <span class="time">12:30</span>
    <div class="sch_box"><p class="sch_title"><span class="under">海巡り！</span></p>
      <p class="sch_tx">
      集落からは少し遠いからまとめて☀️
      </p>
    </div>
  </li>

  <li>
    <span class="time"></span>
    <div class="sch_box">
      <p class="sch_title">
        <span class="under">就寝</span>
      </p>
      <p class="sch_tx">
         早く寝ましょう；。
      </p>   
    </div>
  </li>



</ul>



        
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Day #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Day #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>



  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Day #4
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the forth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>



ここのコメントはHTML上には表示されません --}}






    <h5>登録用フォーム</h5>
    
  
  


  

    <!-- The footer holds our remix button — you can keep or delete it ✂ -->
    <footer class="footer">
      <div class="links"></div>
    </footer>




    <!-- bootstrap CDN -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
      crossorigin="anonymous"
    ></script>


  <script>
     // Bootstrap 5 モーダル lightbox
 var jsCardModal = document.getElementById('lightboxModalFullscreen');
 jsCardModal.addEventListener('show.bs.modal', function (event) {
     var button = event.relatedTarget
     var lightboximage = button.getAttribute('data-bs-lightbox')
     document.getElementById('LightboxImage').src = lightboximage;
 })
 </script>
  
  </div><!-- div class="container"> -->
  </body>
</html>
