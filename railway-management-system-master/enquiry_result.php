<html>
    <head>
        <style>
        input[type=text],
        input[type=password] {
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
        input[type=text]:focus,
        input[type=password]:focus
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
        ::placeholder {
            color:red;
            font-size: 20px;
        }
        p
        {
            color: white;
            font-weight:1000;
            display: inline-block;
            font-size: 20px;
            margin: 0 ;
            text-align: center;
            height:0px;
            width: 300px;
        }
        </style>
    </head>
<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";

$query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.trainno=c.trainno AND c.sp='".$sp."' AND c.dp='".$dp."'  ");

echo "<table><thead><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Train_Class</td><td>Fare</td><td>Seats_Left</td></thead>";

while($row = mysqli_fetch_array($query))
{
 echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
}
echo "</table>";

//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such train <br> ";

}
?>

If you wish to proceed with booking fill in the following details:
<form action="resvn.php" method="post">
    <center>
<p>Registered Mobile No:</p> <input type="text" name="mno" required placeholder="Registered Mobile No.">
<p>Password:</p> <input type="password" name="password" required placeholder="Password">
<p>Enter Train No:</p> <input type="text" name="tno" required placeholder="Enter Train No.">
<p>Enter Class:</p> <input type="text" name="class" required placeholder="Enter Class">
<p>No. of Seats:</p> <input type="text" name="nos" required placeholder="No. of Seats">
<input type="submit" value="Proceed with Booking">
</center>
</form>

<?php

echo " <a href=\"http://localhost/railway-management-system-master/enquiry.php\" style=\"font-size:25px; color:red; text-decoration:none;\">More Enquiry</a> <br>";

$conn->close(); 
?>

<br><a href="http://localhost/railway-management-system-master/index.htm"style="font-size:25px; color:red; text-decoration:none;">Go to Home Page!!!</a>
</body>
</html>
