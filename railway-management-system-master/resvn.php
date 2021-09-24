<html>
    <head>
        <style>
            input[type=text]
             {
            color: black;
            border: 0;
            background: white;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 14px 10px;
            width: 240px;
            font-size: 20px;
            outline: none;
            border-radius: 20px;
            transition: 0.50s;
        }
        input[type=text]:focus
        {
             width: 300px;
            border-color: lime;
            border-radius: 0;
            color: black;
        }
        input[type="submit"] {
            border: 0;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: #3498db;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
            font-size: 20px;
        }

        input[type="submit"]:hover {
            background: #3498db;
            color: white;
            border-radius: 0px;

        }
        </style>
    </head>
<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >


<form action="new_png.php" method="post">

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());
if(mysqli_num_rows($query) == 0)
{
 echo "No such login !!! <br> ";
 echo " <br><a href=\"http://localhost/railway-management-system-master/enquiry_result.php\">Go Back!!!</a> <br>";
 die();
}

$row = mysqli_fetch_array($query);
$temp=$row['id'];
//echo $temp;
//echo $_SESSION["doj"];
$_SESSION["id"] = "$temp";
$tno=$_POST["tno"];
$_SESSION["tno"] = "$tno";
$class=$_POST["class"];
$_SESSION["class"] = "$class";
$nos=$_POST["nos"];
$_SESSION["nos"] = "$nos";

echo "<table>";

for($i=0;$i<$nos;$i++) 
{
echo "<tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td><br> ";
echo "<td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td><br>";
echo "<td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td></tr><br> ";
}

echo "</table>";

//Enter Train No: <input type="text" name="tno" required><br>
//Enter Class: <input type="text" name="class" required><br>

echo "<a href=\"http://localhost/railway-management-system-master/enquiry.php\" style=\"font-size:25px; color:red; text-decoration:none;\">Back to Enquiry</a>";

$conn->close(); 

?>

<br><br><input type="submit" value="Book">
</body>
</html>
