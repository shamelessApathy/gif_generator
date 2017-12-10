<head>
	<link href='styles.css' rel='stylesheet' type='text/css'/>
</head>
<div style='width:100%; padding:10px;'>
	<h2>GIF GENERATOR v1.0</h2>
	<form enctype='multipart/form-data' name='gif-form' id='gif-form' action='handle_file.php' method='POST'>
		<label>Video</label><br>
		<input type='file' name='file'/>
		<input id='gif-submit' type='submit'/>
	</form>
	<div id='img-container'>
	<img id='myImg' src='loading.png'/>
</div>
</div>

<script>
	document.getElementById('gif-submit').addEventListener('click', function(e)
	{
		console.log('inside');
		document.getElementById('img-container').setAttribute('style','display:block');
	});
	console.log('inl;ine script isd loadfing');
</script>