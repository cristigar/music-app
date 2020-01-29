<?php

function get_connection()
{
    $link = mysqli_connect('localhost', 'root', 'securepassword', 'songs');
    if (mysqli_connect_errno()) {
        printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();

    }
    return $link;
}
