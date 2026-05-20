<?php
require_once "todo.php";
require_once "repositoryFunction.php";

$database = connexion();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (is_string($_POST['title']) and strlen($_POST['title']) <= 50 and is_string($_POST['descrition']) and strlen($_POST['descrition']) <= 200) {
        AddTask($_POST['title'], $_POST['descrition']);
    } else {
        throw new \Exception('Error in entry type or size');
    }
};
