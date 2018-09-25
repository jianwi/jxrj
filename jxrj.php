<?php
if (!isset($_FILES['file'])) {
	echo <<<aaa
<!DOCTYPE html>
<html>
<head>
	<title>审核数据</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<h2>军训日记审核系统</h2>
<section>
	<p>请把文件保存为以.csv为后缀，并且删掉多余列只保留军训日记的文本列</p>
	<p>添加了去重功能，实际统计出来的结果比excel表格统计的结果要少。</p>
	<p>用标点符号或英文字母凑够50字的数据为不合格</p>
	<p>有问题，联系我qq：1615420877</p>
</section>
<section>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="">
</form>
</section>
</body>
</html>
aaa;
	return;
}
if ($_FILES['file']['error'] > 0) {
	echo $_FILES['file']['error'];
} else {
	$file = $_FILES['file']['tmp_name'];
}
function getLine($file) {
//    打开文件
	$filename = $file;
	$fp = fopen($filename, 'r');
	// 数量初始化
	$count = 0;
	// 开始遍历数据
	$datas = array();
	while ($data = fgets($fp)) {
		if (strlen($data) > 98) {

			if (in_array($data, $datas)) {
				continue;
			}
			$datas[] = $data;

			$count++;

		} else {
			continue;
		}
	}

	fclose($fp);
	return $count;
}
echo "符合要求的数据一共有";
echo getLine($file);
echo "条";