<?php
include_once "ckeditor/ckeditor.php";

$CKEditor = new CKEditor();

$CKEditor->basePath = '/ckeditor/';

$CKEditor->replaceall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post"><textarea name="tomtat" cols="" rows="" ></textarea>
<textarea name="tomtat1" cols="" rows="" ></textarea>
<?php

include_once "ckeditor/ckeditor.php";

$CKEditor = new CKEditor();

$CKEditor->basePath = '/ckeditor/';

$CKEditor->replaceall();
?>
<input name="ok" type="submit" value="Ok" />
</form>
<?php
if(isset($_POST["tomtat"]))
echo stripslashes($_POST["tomtat"]);
if(isset($_POST["tomtat1"]))
echo $_POST["tomtat1"];
?>
</body>
</html>