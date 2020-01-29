<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
require_once 'navbar.html';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $playlist = new App\Model\Playlist();
    $playlist->createPlaylist(0,$_POST['title']);
    header('Location: /pages/myPlaylist.php');
}
?>
<br>
<form action="createPlaylist.php" method="post">
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="alert alert-primary" role="alert">
                Give a name to your playlist!
                <input type="text" class="form-control" placeholder="Playlist name" name='title'>
            </div>
        </div>
        <div class="col-4">
            <div class="col">
                    <button type="submit" class="btn btn-secondary" >Create</button>
            </div>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>
</form>
