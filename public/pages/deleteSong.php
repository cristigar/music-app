<?php

use App\Model\Song;
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$delete = new Song();
$delete->deleteUploadedSong();

header('Location: /pages/songs.php');