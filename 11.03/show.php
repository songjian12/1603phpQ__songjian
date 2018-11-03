<?php 
function __autoload($class){
	//根据类名确定文件名
	$file =$class.'DB.php';
	if (file_exists($file)) {
		include$file;//引入php文件
	}
}

header("content-type:text/html;charset=uft-8");
//连接数据库
$pdo ="mysql:host=127.0.0.1;dbname=content";
$data=new PDO($pdo,'root','root');

//查询表里的数据
$sql = "select * from news";
$data = $data->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//print_r($res);die;
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻展示</title>
</head>
<body>
<center>
    <table border="1">
        <th>ID</th>
        <th>出发地</th>
        <th>目的地</th>
        <th>3月21日</th>
        <th>3月22日</th>
        <th>3月23日</th>
        <th>操作</th>
        <?php foreach ($data as $k => $v) { ?>
                <tr>
                    <td><?php echo $v['new_id']?></td>
                    <td><?php echo $v['new_title']?></td>
                    <td><?php echo $v['new_author']?></td>
                    <td><a href="updateOne.php?id=<?php echo $v["new_id"]; ?>&time=new_one"><?php echo is_null($v['new_one'])?'--':$v['new_one'];?></a></td>
                    <td><a href="updateOne.php?id=<?php echo $v["new_id"]; ?>&time=new_two"><?php echo is_null($v['new_two'])?'--':$v['new_two'];?></a></td>
                    <td><a href="updateOne.php?id=<?php echo $v["new_id"]; ?>&time=new_three"><?php echo is_null($v['new_three'])?'--':$v['new_three'];?></a></td>
                
                   	<td><a href="delete.php?id=<?php echo $v["new_id"]; ?>">删除</a></td>
                </tr>

            </foreach>
        <?php  }?>



    </table>

</center>

</body>
</html>