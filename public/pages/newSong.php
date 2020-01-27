<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

use App\Model\SongDetails;

require_once 'navbar.html';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = new SongDetails();
    if ($model->uploadSong()) {?>
        <div class="alert alert-dark" role="alert">
            Song is Uploaded!
        </div>
   <?php } else {?>
        <div class="alert alert-danger" role="alert">
            Song is not uploaded!<br>
        </div>
  <?php  }

}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <form action="/pages/newSong.php" method="post" enctype="multipart/form-data">


                <div class="">
                    <input type="text" class="form-control" placeholder="Artist" name="artist">
                </div>

                <br>
                <div class="">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>

                <br>
                <div class="">
                    <input type="text" class="form-control" placeholder="Genre" name="genre">
                </div>

                <br>
                <div class="">
                    <input type="file" class="form-control" name="track">
                </div>

                <br>
                <button type="submit" class="btn btn-outline-dark">Submit</button>
        </div>
    </div>
    <div class="col-3">

    </div>
</div>
</div>

