<?php
class Controller{
    public function __call( $name, $arguments ) {
        echo "{$name}方法不存在，请确认好再执行";
        exit;
    }

    //final 把方法保护起来，不能被子类重写
    final protected function display($data = []){
        include "./tpl/" . CONTROLLER . '/' . ACTION . '.php';
    }
}