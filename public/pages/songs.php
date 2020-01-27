<?php

namespace View;

use App\Model\SongDetails;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$modelSongs = new SongDetails();

$songs = $modelSongs->getUploadSong();

require_once 'navbar.html';

foreach ($songs as $song) {
    ?>
    <br>


        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
                <figure>
                    <figcaption><h5>Listen to:<span class="badge badge-secondary"><?=$song->getArtist()?>-<?=$song->getTitle()?></span></h5></figcaption>
                    <audio controls
                           src="/songs/<?=$song->getPath()?>">
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>

                </figure>
            </div>
            <div class="col-1">
               <a href="/pages/delete.php?id=<?=$song->getId();?>">Delete</a>
            </div>

        </div>

<?php } ?>




