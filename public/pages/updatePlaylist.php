<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
require_once 'navbar.html';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $playlist = new App\Model\Playlist();
    $playlist->updatePlaylist(0, $_POST['title'], $_GET['id']);
    header('Location: /pages/myPlaylist.php');
}

$playlist = new App\Model\Playlist();
$list = $playlist->getPlaylistById($_GET['id']);


?>
<br>
<form action="/pages/updatePlaylist.php?id=<?=$_GET['id'];?>" method="post">
<div class="container">
    <div class="row">
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Playlist name" name='title' value="<?=$list->getTitle();?>">
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-secondary" >Update</button>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>
</form>