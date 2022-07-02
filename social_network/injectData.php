<?php
session_start();
var_dump($_SESSION);
if($_SESSION['user']['role']==="791801") {
require_once "Model/ModelPost.php";
require_once "Model/ModelUser.php";
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
$user = new ModelUser();
$post = new ModelPost();
    for ($i=0; $i < 10;$i++){
        $id_user = $i +30;
        $pass = password_hash("Password10", PASSWORD_DEFAULT);
        $user->registerUser($faker->firstname, $faker->lastname, $faker->email, $pass, 1,  "IMG-60cd17124ef4b6.52185263.png");
        $post->insertPost($faker->jobTitle, $faker->text, $id_user);
    }
}
else {
    parent::Redirect("home");
}