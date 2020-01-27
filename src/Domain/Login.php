<?php
session_start();

include ("BD.php");

$email = $_POST['email'] ?? '';

$password = $_POST['password'] ?? '';

if(empty($email) or empty($password)) {
    exit("Некоторые данные не были введены , вернитесь и повторите ввод.");
}

$email = stripcslashes($email);
$email = htmlspecialchars($email);

$password = stripcslashes($password);
$password = htmlspecialchars($password);

$email = trim($email);
$password = trim($password);


$result = mysqli_query($db, "SELECT * FROM usersprofile WHERE EMAIL='$email'");
$myrow = mysqli_fetch_array($result);

if(empty($myrow['PASSWORD'])){
    exit("Простите , такого пользователя не существует , пройдите регестрацию и попробуйте снова");
}
elseif ($myrow['PASSWORD'] != $password){
    exit("Введенные вами логин и пароль не совпадают , вернитесь на страницу входа и проверьте введенные данные.");
}
elseif($myrow['PASSWORD'] == $password){
    $_SESSION['first_name'] = $myrow['FIRST_NAME'];
    $_SESSION['last_name'] = $myrow['LAST_NAME'];
    $_SESSION['email'] = $myrow['EMAIL'];
    echo("Вы успешно зашли на страницу.");
}