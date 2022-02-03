<?php

$conn= mysqli_connect('localhost', 'root', '', 'carrent');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['book'])) {
    $sql="insert into rent(rentdate,noseat,rentrate) values ($_POST[rentdate],$_POST[noseat],$_POST[rentrate])";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
?>
<html>
<head>
    <title>Car Rental</title>
    <style type="text/css">
      th {
        text-align: left;
    }
    span {
        color:  blue;
    }
    input[type="date"],input[type="number"] {
        width: 225px;
        height: 28px;
        border-radius: 5px;
    }
    select,input[type="date"] {
        width: 100%;
        height: 29px;
        border-radius: 5px;
    }
    input[type="submit"],input[type="reset"] {
        width: 100px;
        height: 35px;
        border-radius: 5px;
    }
    .row {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 20px;
    }
    .col-md-5 {
        grid-column: span 5;
    }
    .col-md-7 {
        grid-column: span 7;
    }

</style>
<script type="text/javascript">
     
function validate(){  
var num=document.form.noseat.value;  
if (isNaN(noseat)){  
  document.getElementById("numloc").innerHTML="Please fill out this field";  
  return false;  
}else{  
  return true;  
  }  
}  

</script>
</head>
<body>
    <div class="column" style="margin-top: 50px;">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" name="form" action="" onsubmit="return(validate())">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Car Rental</h1></th>
                    </tr>
                      
                    <tr>
                        <th>Rent date</th>
                        <td><input type="date" name="rentdate" required></td>
                    </tr>                    
                    <tr>
                        <th>seats</th>
                        <td><input type="number" name="noseat" required></td>
    
                    </tr>
                    <tr>
                        <th> rate</th>
                        <td><input type="number" name="rentrate" required></td>
                    </tr>
                   
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Book" name="book" style="background-color: red;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Details</h1></th>
                </tr>
                <tr>
                    <th>#</th>
                    
                    <th>Number Of Seats</th>
                    <th>Rent Rate</th>
                </tr>
                <?php 
                $n=1;
                $sql="select * from rent";
                $res= mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        
                        <td><?php echo $row['noseat']?></td>
                        
                        <td><?php echo $row['rentrate']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>