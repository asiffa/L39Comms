<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$table = "mymc";
$conn = mysqli_connect($servername, $username, $password, "mymc");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

$i = 0;

foreach ($_POST['ID'] as $value) {
    $sql = "UPDATE $table SET $value = $i WHERE $ID = $ID";
    $i++;
}

?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $('#element').sortable({
    axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');

        // POST to server using $.post or $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: '/localhost/'
        });
    }
});
            

        </script>
        
		<title></title>
	</head>
	<body>
<ul id="sortable">
   <li id="item-1">test</li>
   <li id="item-2">test</li>
   
</ul>
	</body>
</html>

