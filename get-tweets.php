<?php
header('Content-Type: application/json');

require_once "bootstrap.php";
require_once "UserTweets.php";

use HardToFindExam\Services\RequestValidator;

$validation = (new RequestValidator())->validate($_POST);

if (!$validation) {
    echo json_encode(['errors' => 'Invalid input']);
    die;
}

echo (new UserTweets)->getTweetsByUsername($_POST['username']);
