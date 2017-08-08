<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.bootcss.com/jquery/2.0.1/jquery.min.js"></script>
<script>
    $(function () {
        $('form').submit(function (e) {//取消提交事件  添加
            e.preventDefault();
            var contr = $('form').serialize();
//            alert(contr)
            $.ajax({
                url: '?a=ajaxtj',
                data: contr,
                type: 'post',
                dataType: 'html',
                success: function (phpData) {
//                    alert(php);
                    $('table').append(phpData);
                }

            })
        })

        $('table').delegate('.tj', 'click', function () {//添加加点击事件
//    alert(2)
//            alert(2)
            $('.ybtj').show(500);
            $('#showw').hide(500);


        })

        $('table').delegate('.del', 'click', function () {//删除事件
            var key = $(this).attr('key');//要删除那条小标
            var tr = $(this).parents('tr');//删除当前的tr
//            alert(key);
            $.ajax({
                url: '?a=ajaxdel&id=' + key,
                success: function (phpd) {
//                    alert(phpd);
                    tr.remove();
                }

            })

        })

    })
</script>
<body>
<table border="1" style="width: 600px;text-align: center" class="table-striped table-hover">
    <tr>
        <td>姓名</td>
        <td>时间</td>
        <td>内容</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data['d'] as $k => $v) { ?>
        <tr>
            <td><?php echo $v['user'] ?></td>
            <td><?php echo $v['time'] ?></td>
            <td><?php echo $v['controll'] ?></td>
            <td>
                <a href="javascript:;" key="<?php echo $k ?>" class="tj">添加</a>
                <a href="javascript:;" key="<?php echo $k ?>" class="del">删除</a>
                <a href="javascript:;" key="<?php echo $k ?>" class="bj">编辑</a>
            </td>
        </tr>
    <?php } ?>
</table>


<form method="post" class="ybtj" style="display: none">
    姓名：<input type="text" name="user">
    <br>
    <br>
    内容：<textarea name="controll" style="width: 200px;height: 100px"></textarea>
    <br>
    <br>
    <input type="submit" value="提交">
</form>
</body>
</html>