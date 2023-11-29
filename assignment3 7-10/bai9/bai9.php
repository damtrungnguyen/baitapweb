<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<label>Upload
<input type="file" name="ufile" id="ufile" />
</label>
<p>
<input type="submit" name="upload" id="upload" value="Up load" />
</p>
</form>
<?php
$target_path = "uploads/";
if(isset($_FILES['ufile']))
{
$target_path = $target_path . basename( $_FILES['ufile']['name']);

if ( !preg_match('/\.(jpg|gif)$/i',basename($_FILES['ufile']['name'] )) )
{ echo "Khong phai file anh!";}
else
if (file_exists($target_path))
{
echo basename( $_FILES['ufile']['name']) . " already exists. ";}
else
if(move_uploaded_file($_FILES['ufile']['tmp_name'], $target_path)) {
echo "The file ". basename( $_FILES['ufile']['name']).
" has been uploaded";
} else{
echo "There was an error uploading the file, please try again!";
} }
?>
</body>
</html>