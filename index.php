<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    
        <title>Content</title></head>


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

if(isset($_POST['submit']))
    {

    $headline = mysqli_real_escape_string($conn, $_POST['headline']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);


    $sql = "INSERT INTO $table (headline, description, date, details, type) VALUES ('$headline', '$desc', '$date', '$details', '$type')";


    if(!mysqli_query($conn, $sql))
        {
    echo mysqli_error($conn);
        }
    else
        {
    echo 'Your entry has been submitted!';
        }
    }

if(isset($_POST['retrieve']))
    {

    $date = $_POST['date'];
    $result = mysqli_query($conn,"SELECT * FROM mymc WHERE date='$date'");


    echo "<table id='data'>
    <tr>
    <th>Date</th>
    <th>Headline</th>
    <th>Description</th>
    <th>Details</th>
    <th>Type</th>
    </tr>";
    
while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['headline'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['details'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "</tr>";
    }
        echo "</table>";
    }



if(isset($_POST['retrieveall']))
    {

    $result = mysqli_query($conn,"SELECT * FROM mymc");

    echo "<table id='data'>
    <tr>
    <th>Date</th>
    <th>Headline</th>
    <th>Description</th>
    <th>Details</th>
    <th>Type</th>
    </tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['headline'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['details'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    }

if(isset($_POST['create']))
{    
    $date = $_POST['date'];
    $result = mysqli_query($conn,"SELECT * FROM mymc WHERE date='$date'");
    while ($row = mysqli_fetch_array($result)) 
    {
        echo "<span style=\"font-size:14px\"><span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"color:#DAA520\"><strong>".$row['type']." - </span><span style=\"color:#000000\">".$row['headline']."</strong><br><span style=\"font-size:12px\"><span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"color:#000000\"><em>".$row['details']."</em></span></span></span><br><p style=\"color: #606060;font-family: Helvetica;font-size: 15px;line-height: 150%;text-align: left;\"><span style=\"font-size:12px\"><span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"color:#000000\">".$row['description']."</span></span></span><br><br>";
}  
}
?>

        <?php
mysqli_close($conn);
?>


<br><br>
<div class = "container1">
<a href = "index.html"> Home </a> </div>

