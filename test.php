<?php
if(!empty($_FILES['upfile'])){
    var_dump($_FILES['upfile']);
    $fileinfo = $_FILES['upfile'];
    $destination = "./";

    $destination = $destination.basename($_FILES['upfile']['name']);
    // $fileinfo['tmp_name']缓存的路径  $destination 移到的位置以及文件的名称
    move_uploaded_file($fileinfo['tmp_name'],$destination);
    echo "succ";
}
// 分片接受
else if(!empty($_FILES['upfileslice'])){
    $filesize=1048576;
    if($_POST['allcount']>$_POST['filecount']){
        var_dump($_FILES['upfileslice'],$_POST['filename'],$_POST['allcount']);
        $fileinfo = $_FILES['upfileslice'];
        $destination = "./temp/";;
        if(!file_exists($destination)){
            mkdir($destination);
        }

        $destination = $destination.basename($_POST['filename'].$_POST['filecount']);
        // $fileinfo['tmp_name']缓存的路径  $destination 移到的位置以及文件的名称
        move_uploaded_file($fileinfo['tmp_name'],$destination);
    }else if($_POST['allcount']==$_POST['filecount']){
        //将文件合并
        // 创建一个文件
        $savefile=fopen($_POST['filename'],'w');
        
        $mydir = dir("./temp/"); 
       
        // while($file = $mydir->handle)
        // {   
        //     // 读取文件
        //     $content=fwrite($file,$filesize);
        //     fwrite($myfile,$content);
        //     // echo($mydir);
        //     var_dump($file);
        // }
        // fclose($fp2);
        echo "succ";
    }
}

?>