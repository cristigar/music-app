<?php

use App\Model\Playlist;
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$delete = new Playlist();
$delete->deletePlaylist($_GET['id']);

header('Location: /pages/myPlaylist.php');