<?php
/*////////////////////////////////////////
Base-create this script -> Lateral Code
	http://www.lateralcode.com/
Modification & redistribute -> IT�L���X�N
	http://smkn.xsrv.jp/blog/
////////////////////*/////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<title>�f�B���N�g���c���[�_(�Oo�O)�^</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<style type="text/css">
body {
	font-family:Georgia, 'Times New Roman', Helvetica, Times, serif;
	color: #6a6a6a;
}
#dir_tree ul {
	list-style-type: none;
	padding-left: 15px;
	_padding-left: 0px;
}
#dir_tree a, #dir_tree li {
	text-decoration: none;
	margin-bottom: 3px;
}
#dir_tree a {
	font-size:small;
	background-color:#f7f7f7;
	border-bottom:1px solid #f1f1f1;
	margin-left: 15px;
}
</style>
</head>
<body>

<!-- Menu Start -->
<div id="dir_tree">
<?php
	$path = "./";
	function createDir($path = '.')
	{
		if ($handle = opendir($path))
		{
			echo "\n<ul>\n";
			$queue = array();
			while (false !== ($file = readdir($handle)))
			{
				if (is_dir($path.$file) && $file != '.' && $file !='..') {
					printSubDir($file, $path, $queue);
				} else if ($file != '.' && $file !='..') {
					$queue[] = $file;
				}
			}
			printQueue($queue, $path);
			echo "</ul>\n";
		}
	}

	function printQueue($queue, $path)
	{
		foreach ($queue as $file)
		{
			printFile($file, $path);
		}
	}

	function printFile($file, $path)
	{
		echo "<li><a href=\"".$path.$file."\">$file</a></li>\n";
	}

	function printSubDir($dir, $path)
	{
		echo "<li><span class=\"dir\">$dir</span>";
		createDir($path.$dir."/");
		echo "</li>\n";
	}

	createDir($path);
?>

</div>
<!-- End Menu -->

<script type="text/javascript">
$(function() {
	$("span.dir").css("cursor", "pointer").prepend("+ ").click(function() {
		$(this).next().toggle("fast");
		
		var v = $(this).html().substring( 0, 1 );
		if ( v == "+" )
			$(this).html( "-" + $(this).html().substring( 1 ) );
		else if ( v == "-" )
			$(this).html( "+" + $(this).html().substring( 1 ) );
	}).next().hide();
	
    $("#dir_tree a, #dir_tree span.dir").hover(function() {
        $(this).css("font-weight", "bold");
    }, function() {
        $(this).css("font-weight", "normal");
    });
});
</script>
</body>
</html>