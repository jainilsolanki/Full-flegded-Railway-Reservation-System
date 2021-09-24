<html>
<head>
    <style>
       ul {
        list-style-type: none;
        margin-top: 100px;
        padding: 0;
        overflow: hidden;
        text-align: center;
    }

    li {
        float: right;
    }

    li a {
        display: block;
        color: Blue;
        text-align: center;
        padding: 14px ;
        text-decoration: none;
        font-size: 25px;
    }

    li a:hover {
        transition: 0.50s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        background-color: white;
    }
        input[type=text],
        input[type=password] {
            color: black;
            border: 0;
            background: none;
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
            border-color: white;
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
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
<div align="center" style="font-size:25px; ">
<?php 
session_start();
if($_POST["uid"]=='admin' AND $_POST["password"]=='admin' )
{
$_SESSION["admin_login"]=True;
}

if($_SESSION["admin_login"]==True)
{
echo "<ul>";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/insert_into_stations.php\"> Show All Stations </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/show_trains.php\"> Show All Trains </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/show_users.php\"> Show All Users </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/insert_into_train_3.php\"> Enter New Train </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/insert_into_classseats_3.php\"> Enter Train Schedule </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/booked.php\"> View all booked tickets </a></b><br></li> ";
echo " <li><br><b><a href=\"http://localhost/railway-management-system-master/cancelled.php\"> View all cancelled tickets </a></b><br></li> ";
echo "<li><br><b><a href=\"http://localhost/railway-management-system-master/index.htm\">Go to Home Page!!!</a></b></li>";
echo "</ul>";
//echo " <br><a href=\"http://localhost/railway/logout.php\"> Logout </a><br> ";
}
else 
{

echo "
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br>
Password: <input type=\"password\" name=\"password\" required><br>
<input type=\"submit\">
</form>
";
}


?>

</div>
</body>
</html>
