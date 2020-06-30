<?php
/* 作用：多文件上传文件
 * 语法： uploadFile(string:$name,string:$mpath,number:$filesize,array:$typearr)
 * 参数： $name 是表单file的name名
 *       $mpath 上传后，文件所在的文件夹名（路径） 注意，当前目录要用 ./
 *       $filesize 上传文件限制的大小（单位m）
 *       $typearr 上传文件允许的类型
 * 返回值： 是上传文件的路径 array类型
 */
function uploadFile($name,$mpath,$filesize,$typearr=['image/png','image/jpeg','image/jpg','image/gif','audio/mp3']){
    if(isset($_FILES[$name])){
        $file = $_FILES[$name];
    }
    else{
        exit("文件过大，请修改php配置文件");
    }
    $npath = [];
    $paths = explode("/",$mpath);
    $mpath = "";
    $filesize = $filesize*1024*1024;
    foreach($paths as $key => $v){
        //传的路径带 ./或../的
        if($key==0&&strpos($v,".")!==false){
            $mpath = $v;
            if($key>0){
                $mpath .="/".$v;
                if(!is_dir($mpath)){
                    mkdir($mpath);
                }
            }
        }
        //传的路径不带./的
        else{
            if($key==0){
                $mpath =$v;
            }
            else{
                $mpath .="/".$v;
            }
            if(!is_dir($mpath)){
                mkdir($mpath);
            }
        }
    }
    if(is_array($file['name'])){
        for($i=0;$i<count($file['name']);$i++){
    //          echo $file['name'][$i]."<br>";
    //          echo $file['tmp_name'][$i]."<br>";
            if(!in_array($file['type'][$i],$typearr)){
                $npath['errMsg'] =  "类型错误";
            }
            else if($file['size'][$i]>$filesize){
                $npath['errMsg'] =  "文件过大";
            }
            else{
                $ext = pathinfo($file['name'][$i])['extension'];
                do{
                    $fname = time().rand(10000,99999).".".$ext;
                }while(file_exists($mpath."/".$fname));
                $npath[] = $mpath."/".$fname;
                move_uploaded_file($file['tmp_name'][$i],$npath[$i]);
            }
        }
    }
    else{
        if(!in_array($file['type'],$typearr)){
            $npath['errMsg'] =  "类型错误";

        }
        else if($file['size']>$filesize){
            $npath['errMsg'] =  "文件过大";

        }
        else{
            $ext = pathinfo($file['name'])['extension'];
            do{
                $fname = time().rand(10000,99999).".".$ext;
            }while(file_exists($mpath."/".$fname));
            $npath[] = $mpath."/".$fname;
            move_uploaded_file($file['tmp_name'],$npath[0]);
        }
    }
    return $npath;
}
?>

