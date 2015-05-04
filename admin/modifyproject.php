<?PHP
	require "class.item.php";
	$P = new item;
	$P->id= $_GET['id'];
	$P->sql="select name,introduce,picture from projects where id = $P->id";
	$P->open();
	$result = mysql_query($P->sql);
	while($row = mysql_fetch_array($result))
	{
		$P->name=$row['name'];
		
		$P->introduce=$row['introduce'];

		$P->picture=$row['picture'];
	}
	mysql_close($P->con);
?>

<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div>
		<form action="updateproject.php" method="post">
			<div>
				<input id="name" type="hidden" name="id" value=<?php echo $P->id; ?> >
				<label for="name">name:</label>
				<input id="name" type="text" name="name" value=<?php echo $P->name; ?> >
					<br/>
			</div>
			<div>
				<label for="intro">intro:</label>
				<textarea cols=40 rows=14  name="intro" >
					<?php echo $P->introduce; ?>
				</textarea><br/>

			</div>
			<div >
				<label >picture</label>
				<input id="fileupload" type="file" name="files[]" multiple value=<?php echo $P->picture; ?>
				>
				<div id="progress">
						<div class="progress-bar" ></div>
				</div>
			</div>
			<!-- The container for the uploaded files -->
			<div id="files" class="files"></div>
			<script src="upload/js/jquery.js"></script>
			<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
			<script src="upload/js/vendor/jquery.ui.widget.js"></script>
			<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
			<script src="upload/js/jquery.iframe-transport.js"></script>
			<!-- The basic File Upload plugin -->
			<script src="upload/js/jquery.fileupload.js"></script>
			<script>
			$(function () {
				'use strict';
				var url = "/admin/upload/";
				$('#fileupload').fileupload({
					url: url,
					dataType: 'json',
					done: function (e, data) {
						$.each(data.result.files, function (index, file) {
							$('<p/>').text(file.name).appendTo('#files');
							$('#name').after("<input type=hidden  name=picture id=picture />");
							$('#picture').val(url+"files/"+file.name);
						});
					},
					progressall: function (e, data) {
						var progress = parseInt(data.loaded / data.total * 100, 10);
						$('#progress .progress-bar').css(
							'width',
							progress + '%'
						);
					}
				}).prop('disabled', !$.support.fileInput)
					.parent().addClass($.support.fileInput ? undefined : 'disabled');
			});
			</script>
			<input type="submit" id="submit" value="submit"/>
		</form>
		</div>
	</body>
</html>
	
			
