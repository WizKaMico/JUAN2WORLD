<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<form action="#" method="POST">
	 
	 <input type="text" name="password">
     <input type="submit" name="submit">
</form>

<?php 

if(isset($_POST['submit'])){
 
   $hash = md5($_POST['password']);
  
   echo $hash;

}


?>

</body>
</html>