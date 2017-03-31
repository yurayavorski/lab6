<?php
header('Access-Control-Allow-Origin: *');
$todosjson =  file_get_contents('data.json');
$todos = json_decode($todosjson);
$todosjson = json_encode($todos);
echo $todosjson;
?>