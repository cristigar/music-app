<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
require_once 'navbar.html';
$playlist = new App\Model\Playlist();
$lists = $playlist->getPlaylistsByUserId(0);
?>

<div class="alert alert-primary" role="alert">
    Create <a href="createPlaylist.php" class="alert-link">playlist</a>. Give it a click if you like.
</div>


<?php foreach ($lists as $list) { ?>
    <div class="container">
        <div class="row">
            <div class="col-4">

                <div class="list-group">
                    <button type="button"
                            class="list-group-item list-group-item-action"><?=$list->getTitle(); ?></button>
                </div>

            </div>
            <div class="col-4">
                <a href="/pages/deletePlaylist.php?id=<?=$list->getId();?>">Delete</a>
            </div>
            <div class="col-4">
                <a href="/pages/updatePlaylist.php?id=<?=$list->getId();?>">Update</a>
            </div>
        </div>
    </div>
<?php } ?>