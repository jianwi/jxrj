#!/usr/bin/php
<?php

$file = "0908.csv";
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
echo $file . "符合要求的数据一共有";
echo getLine($file);
echo "条";