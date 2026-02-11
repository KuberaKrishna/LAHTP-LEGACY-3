<?php declare (strict_types = 1);
session_start();
require_once 'require/Database.class.php';
require_once 'require/Comments.class.php';
require_once 'require/MovieDetails.class.php';
require_once 'require/PostedComment.class.php';

$_config_file_path = "$_SERVER[DOCUMENT_ROOT]/../configuration/movieReviewConfig.json";

function loadTemplate($fileName){
    $filePath = "$_SERVER[DOCUMENT_ROOT]/XSS/_templates/$fileName";
    require "$filePath";
}
if(is_dir("$_SERVER[DOCUMENT_ROOT]/../configuration/") === FALSE){
    mkdir("$_SERVER[DOCUMENT_ROOT]/../configuration/");
    $_config_file = file_get_contents("configuration/movieReviewConfig.json");
    file_put_contents($_config_file_path, $_config_file);
    $_config = file_get_contents($_config_file_path);
} else {
    $_config_file = file_get_contents("configuration/movieReviewConfig.json");
    file_put_contents($_config_file_path, $_config_file);
    $_config = file_get_contents($_config_file_path);
}
function getConfig($key){
    global $_config;
    $Array = json_decode($_config, TRUE);
    if(!empty($Array)){
        return $Array[$key];
    } else {
        return false;
    }
}