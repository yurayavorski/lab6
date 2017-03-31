<?php
class Todo {
    function __construct($task, $status, $id) {
        $this->task = $task;
        $this->status = $status;
        $this->id = $id;
    }
}
header('Access-Control-Allow-Origin: *');
$todosjson =  file_get_contents('data.json');
$todos = json_decode($todosjson);
$lastId = end($todos)->id;
$TaskName = $_POST["task"];
$status = $_POST["status"];
$newTodo =  new Todo($TaskName, $status, $lastId + 1);
array_push($todos, $newTodo);
$todosjson = json_encode($todos);
$fileJson = fopen("data.json", 'w');
fwrite($fileJson, $todosjson);
fclose($fileJson);
?>