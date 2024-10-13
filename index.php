<?php
require_once 'config/config.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

//Route to different pages

switch($page) {
   case 'home':
    include 'templates/index.php';
    break;

  case 'post':
    include 'templates/single_post.php';
    break;

  default:
    include 'templates/index.php';
}