<?php
if(!empty($_FILES['upfile'])){
    var_dump($_FILES['upfile']);
    $fileinfo = $_FILES['upfile'];
    $destination = "./";
    $destination = $destination.basename($_FILES['upfile']['name']);
    move_uploaded_file($fileinfo['tmp_name'],$destination);
    echo "succ";
}

?>