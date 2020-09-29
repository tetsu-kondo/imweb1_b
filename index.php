<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?PHP
$dirpath = "./";	//表示対象のディレクトリパス
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

