<?php

class Homecontroller extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data = include './data.php';
    }

    public function index()
    {
        $this->display([ 'd' => $this->data ]);
//        p($this->display());
    }

    public function ajaxtj()//添加
    {

        $_POST['time'] = date('Y-m-d H:i:s');
//     p($_POST);
        $this->data[] = $_POST;
        //获得最新一条留言的键名（下标）
        $key = max( array_keys( $this->data ) );
        file_put_contents('./data.php', "<?php return " . var_export($this->data, true) . "; ?>");
//        p($this->data);
        foreach ($this->data as $v){

        }
        $str = <<<str
    <tr>
        <td>{$_POST['user']}</td>
        <td>{$_POST['time']}</td>
        <td>{$_POST['controll']}</td>
        <td>
            <a href="javascript:;" key={$key} class="tj">添加</a>
            <a href="javascript:;" key={$key} class="del">删除</a>
            <a href="javascript:;" key={$key} class="bj">编辑</a>
        </td>
    </tr>
str;
echo $str;

    }
    public function ajaxdel(){//异步删除
        $id=$_GET['id'];
//        p($id);
        unset($this->data[$id]);
        file_put_contents('./data.php', "<?php return " . var_export($this->data, true) . "; ?>");
    }

    public function ajaxbj(){

    }

}