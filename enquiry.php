<html>
    <head>
        <style>
            select
            {
                
                position: relative;
                border:0;
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid lime;
                padding: 14px 10px;
                width: 200px;
                outline: none;
                border-radius: 24px;
                transition: 0.25s;
                width: 200px;
  
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
        input[type=date] {
            position: relative;
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid lime;
            padding: 14px 10px;
            width: 300px;
            outline: none;
            color: red;

            border-radius: 24px;
            transition: 0.25s;

            border-radius: 20px;
            display: inline-block;
            font-size: 20px;
            margin: 0 5px 5px 0;
            text-align: center;

        }

        input[type=date]:focus {

            width: 350px;
            border-color: #3498db;
            border-radius: 0px;

        }
        </style>
    </head>
<body style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php

session_start();
$_SESSION=array();
session_destroy();

?>
<div align="center"> 
<form action="enquiry_result.php" method="post">

Starting Point: <select id="sp" name="sp" required>
        
<?php

require "db.php";
            
            $cdquery="SELECT sname FROM station";
            $cdresult=mysqli_query($conn,$cdquery);
        
	
            echo " <option value = \"\" >
                    
                </option>";

            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $cdTitle=$cdrow['sname'];

            echo " <option value = \"$cdTitle\" >
                    $cdTitle
                </option>";
            
            }
?>
    
</select>

   
Destination Point: <select id="dp" name="dp" required>
        
<?php

require "db.php";
            
            $cdquery="SELECT sname FROM station";
            $cdresult=mysqli_query($conn,$cdquery);
        
            echo " <option value = \"\" >
                    
                </option>";

            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $cdTitle=$cdrow['sname'];

            echo " <option value = \"$cdTitle\" >
                    $cdTitle
                </option>";
            
            }
?>
    
</select>

     
Date of Journey:<br><br> <input type="date" name="doj" required><br>
<input type="submit">

</form>
<br><br><br><br><a href="http://localhost/railway-management-system-master/index.htm"style="font-size:25px; color:red; text-decoration:none;">Go to Home Page!!!</a>
</body>
</html>
