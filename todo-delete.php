<?php
header('Access-Control-Allow-Origin: *');
$todosjson =  file_get_contents('data.json');
$todos = json_decode($todosjson);
$id = intval($_POST["id"]);
echo $id . '<br />';
foreach ($todos as $todo) {
    if ($todo->id == $id) {
        $el = array_search($todo, $todos);
        echo $el;
        array_splice( $todos, $el, 1);
        print_r($todos);
        break;
    }
}
$todosjson = json_encode($todos);
$fileJson = fopen("data.json", 'w');
fwrite($fileJson, $todosjson);
fclose($fileJson);
?>