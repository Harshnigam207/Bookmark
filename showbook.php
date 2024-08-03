<?php
$q=$_REQUEST["q"];

$hint="";
$counter=0;
$linker="";

$con=new mysqli("localhost","root","","bookmark");
    if($con->connect_error){
        die("connection error->".$con->connect_error);
    }
    $sql="SELECT * FROM books WHERE book_name LIKE '$q%'";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $linker=$row['book_number'];
            echo"<li class='list-group-item' style='background-color:#332d2d; color:#dee2e6; height:59px; overflow:hidden;'>
            <a href='../book_page/book_page.php?linker=".$linker."' style='color:#dee2e6; text-decoration:none;'>
            <img src='".$row['book_image']."' style='position:relative; height:45px; width:20px;left:0;'>
            <span style='position:relative; left:21px; height:100%; width:100%;margin-left:-15px;'>"
            .$row['book_name'].
            "</span></a>
            </li>";
            $counter++;
            if($counter>6){
                break;
            }
        }
    }
    $con->close();
?>