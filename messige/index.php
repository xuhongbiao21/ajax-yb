<?php
//载入函数文件
include '../../7.18/message/functions.php';
//开启session
session_start();
/**
 * 自动载入
 * @param $c [类名]
 */
function __autoload($c){
    //判断是controller还是tool
    $path = (substr($c,-10) == 'Controller') ? "controller" : "tool";
    //组合完整路径
    $fullPath = "./{$path}/{$c}.php";
    //如果文件存在
    if(is_file($fullPath)){
        include $fullPath;
    }else{
        exit("{$fullPath}文件不存在");
    }

}
//控制器
$c = isset($_GET['c']) ? $_GET['c'] : 'Home';
define('CONTROLLER',strtolower($c));
//方法
$a = isset($_GET['a']) ? $_GET['a'] : 'index';
define('ACTION',strtolower($a));

//组合类名
$className = ucfirst($c) . 'Controller';
call_user_func_array([new $className,$a],[]);