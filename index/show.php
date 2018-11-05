<?php
//自动加载
 function __autoload($class)
 {
//根据类名确定文件名
     $file = $class . 'DB.class.php';
     if (file_exists($file)) {
         include $file;//引入php文件
     }
 }
$pdo ="mysql:host=127.0.0.1;dbname=month12";
$data=new PDO($pdo,'root','root');

$sql ="select *from news";
//var_dump($sql);die;
$data = $data->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>分类</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        <?php   foreach ($data as $k =>$val){?>


            <tr>
                <td><?php echo $val{'id'}?></td>
                <td><?php echo $val{'news_biao'}?></td>
                <td><?php echo $val{'news_fen'}?></td>
                <td><?php echo $val{'news_show'}?></td>
                <td><a href="del.php<?php echo $id =$val{'new_id'}?>">删除</a></td>
            </tr>
            </foreach>
        <?php  }  ?>
    </table>
</center>

</body>
</html>
