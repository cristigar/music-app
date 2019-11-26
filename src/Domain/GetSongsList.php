<?php

declare(strict_types=1);

function getSongs()
{
    $dataList=file_get_contents('../../repository/songs_list.json');
    $listOfSongs= json_decode( $dataList , true);
    return $listOfSongs;
}
