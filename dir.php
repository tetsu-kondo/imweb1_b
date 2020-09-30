<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>フォルダ表示PHP</title>
</head>
<body>

<?php
  
$path = dirname(__FILE__) .'/';
$dirlist = dir($dirpath);
while( $filename = $dirlist->read() ){
	//ディレクトリの場合は表示対象外（＝ファイルのみ表示）
	if( (is_dir($filename) == false) && ($filename!=".." || $filename!= "." ) ){
		print("<a href=\"" . $dirpath . $filename . "\">".$filename."</a><br />\n");
	}
}
$dirlist->close();
?>
</body>
</html>
