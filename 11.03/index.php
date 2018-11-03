<?php 
function __autoload($class){
	//根据类名确定文件名
	$file =$class.'DB.php';
	if (file_exists($file)) {
		include$file;//引入php文件
	}
}
$new_title = $_POST['new_title'];
$new_author =$_POST['new_author'];
$new_one =$_POST['new_one'];
$new_two =$_POST['new_two'];
$new_three =$_POST['new_three'];

//连接数据库
$pdo ="mysql:host=127.0.0.1;dbname=content";
$data = new PDO($pdo,'root','root');
//sql
$sql ="insert into news(new_title,new_author,new_one,new_two,new_three)values('$new_title','$new_author','$new_one','$new_two','$new_three')";
// echo $sql;;die;
//执行sql
$res =$data->query($sql);
// var_dump($res);die;

if ($res) {
	echo "<script>alert('添加成功');location.href='show.php'</script>";
}else{
	echo "<script>('添加失败');location.href='index.html'</script>";
}

 ?>