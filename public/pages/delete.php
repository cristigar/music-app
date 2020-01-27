<?php

use App\Model\SongDetails;
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$delete = new SongDetails();
$delete->deleteUploadedSong();

header('Location: /pages/songs.php');