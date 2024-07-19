#!/usr/bin/env php
<?php
echo __DIR__;
$directory_name=(string)readline("enter your project name: ");


function create_project(){
     global $directory_name;
    // get the directory
    $current_directory=getcwd();
    //scan the directory 
    $file=scandir($current_directory);
    $content="<!DOCTYPE html>
    <html lang='en'>
    <head>
         <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
    
    </body>
    </html>";

    if(in_array($directory_name, $file)){
        echo "this file already exists\n";
    
    }else{
        $project_folder_path=$current_directory."/".$directory_name;
        mkdir($project_folder_path);
        mkdir($project_folder_path."/css");
        mkdir($project_folder_path."/css/images");
        $target=fopen($project_folder_path."/index.html", "w");
   
        fwrite($target, $content);
        fclose($target);
        fopen($project_folder_path."/css/style.css", "w");
        fopen($project_folder_path."/app.js", "w");
        echo "your project ".$directory_name." has been created\n";    
    }
}
if(preg_match("/[a-z A-Z 0-9 - _]{4,25}/", $directory_name)===1 && $directory_name!==""){
    create_project();
}else{
     echo "error\n";
     echo preg_match("/[a-z A-Z 0-9 - _]{4,25}/", $directory_name)."\n";
        
}


