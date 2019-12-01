<?php 
include "FilterByGenre.php";
include "get_genre.php";
$genres = get_genre();

  if(!isset($_GET['genre'])){
    $filtered_songs = [];
  }else{
    $filtered_songs = filterByGenre(getSongs(),$_GET['genre']);
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="sort_page.css">
    
    <title>
        MusicApp
    </title>
</head>
<body style="background-color: dimgray;">
      <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
      <a class="navbar-brand" href="#">MusicApp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="Login.html">Log In <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Sing_Up_Page.html">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
      </div>
    </nav>
  

<div class="container-fluid">
  <div class="row">
    <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="validationTooltipUsernamePrepend">Search</span>
          </div>
          <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Search by keyword" aria-describedby="validationTooltipUsernamePrepend" required>
        </div>
        <br>
        <div>
          <?php 
                foreach($filtered_songs as $song){?>
              <ul>
                 <li><h2><?=$song['title']?></h2></li>
            </ul>
          <?php } ?>
       </div>
    </div>
    <div class="col-4">

     <div class="d-flex justify-content-center">
       <button type="button" id="sort" class="btn btn-secondary btn-lg">Sort by genre</button>
     </div>
       

      <div id="sort-elements" style="display:none; padding-top: 20px;">
         <div class = "mybtn row">
            <?php 
                foreach($genres as $genre){?>
                  <div class="col-4">
                    <a href="/sort_page.php?genre=<?=$genre?>"><button class = "button"><?=$genre?></button></a>
                     
                  </div>
                <?php } ?>
          </div>
      </div>
    </div>
</div>

<script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    });
    $("#sort").click(function(){
      $("#sort-elements").toggle();
    });
</script>
</body>
</html>