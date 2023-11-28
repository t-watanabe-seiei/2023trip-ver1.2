<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- bootstrap CDN -->
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet" 
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <!-- font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>


  
  <h1>非同期通信</h1>

  <table class="table table-striped">
    <tr id="all_show_result">
      <th>id</th><th>caption</th><th>datetime</th>
    </tr>
  </table>



  <!-- Modal 新規入力用 -->
  <div class="modal fade modal-lg" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!--非同期通信処理-->
<script>
function getAllData(){

    fetch('ajaxtest/show_all', { // 第1引数に送り先
    })
        .then(response => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
        .then(res => {
         /*--------------------
              PHPからの受取成功
             --------------------*/
            // 取得したレコードをeachで順次取り出す
            res.forEach(elm =>{
                var insertHTML = "<tr><td>" + elm['id'] + "</td><td>" + elm['caption'] + "</td><td>"  + elm['datetime'] + "<i class='fa-solid fa-pen-to-square mx-3' type='button' data-bs-toggle='modal' data-bs-target='#editModal'></i></td></tr>"
                var all_show_result = document.getElementById("all_show_result");
                all_show_result.insertAdjacentHTML('afterend', insertHTML);
            })
            console.log("通信成功");
            console.log(res); // 返ってきたデータ
        })

        .catch(error => {
            console.log(error); // エラー表示
        })
}

// 関数を実行
getAllData();
</script>

  <!-- bootstrap CDN -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"
  ></script>

</body>