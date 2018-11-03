<?php 

function __autoload($class){
	//根据类名确定文件名
	$file =$class.'DB.php';
	if (file_exists($file)) {
		include$file;//引入php文件
	}
}

$id =$_GET["id"];
// echo $id;die;
//连接数据库
$pdo ="mysql:host=127.0.0.1;dbname=content";
$data=new PDO($pdo,'root','root');

$sql ="delete from `news` where new_id='$id'";
// var_dump($sql);die;
$res =$data->query($sql);
// var_dump($res);die;
if ($res) {
	if ($res) {
	echo "<script>alert('删除成功');location.href='show.php'</script>";
}else{
	echo "<script>('删除失败');location.href='show.php'</script>";
}
}
 ?>