<?php

class Author_database{
    public $author_number;
    public $author_photo;
    public $author_name;
    public $website;
    public $author_from;
    public $dob;
    public $author_discription;
    public $uploaded_by="Admin_one";
    public $str;

    public function insert_author_values(){
        $ran= rand();
        /* user photo */
        
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['author_photo']['name']) ;
        move_uploaded_file($_FILES['author_photo']['tmp_name'], $target_path);
        $a_photo="../book_images_and_files/" .$ran. $_FILES["author_photo"]["name"];
        $this->author_photo=$a_photo;

        /*author name*/
        if(isset($_REQUEST['author_name'])){
        $a_name=trim($_REQUEST["author_name"]);
        $a_name=str_replace("'","\'",$a_name);
        $a_name=str_replace('"','\"',$a_name);
        $this->author_name=$a_name;
        }

        /*website */
        if(isset($_REQUEST['website'])){
        $web=trim($_REQUEST["website"]);
        $web=str_replace("'","\'",$web);
        $web=str_replace('"','\"',$web);
        $this->website=$web;
        }

        /*author from */
        if(isset($_REQUEST['author_from'])){
        $a_from=trim($_REQUEST["author_from"]);
        $a_from=str_replace("'","\'",$a_from);
        $a_from=str_replace('"','\"',$a_from);
        $this->author_from=$a_from;
        }

        /*date of birth */
        if(isset($_REQUEST['dob'])){
        $d_ob=$_REQUEST["dob"];
        $this->dob=$d_ob;
        }

        /*author discription */
        if(isset($_REQUEST['author_discription'])){
        $a_discription=trim($_REQUEST["author_discription"]);
        $a_discription=str_replace("'","\'",$a_discription);
        $a_discription=str_replace('"','\"',$a_discription);
        $this->author_discription=$a_discription;
        }

        if (isset($_SESSION["user_name"]) && ($_SESSION["user_photo"])){
            $this->uploaded_by=$_SESSION["user_name"];
        }
    }

    public function insert_author(){
        // obj is database connection obj.
        $obj= new connection();
        $sql="INSERT INTO authors
        (author_photo,
        author_name,
        website,
        author_from,
        dob,
        author_discription,
        uploaded_by) 
        VALUES('$this->author_photo',
        '$this->author_name',
        '$this->website',
        '$this->author_from',
        '$this->dob',
        '$this->author_discription',
        '$this->uploaded_by')";


        if($obj->conn->query($sql)){
            $str="Author Inserted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
        }

        $obj->conn->close();
    }
    public function get_book_for_home_page_authors(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM authors";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../author_page/author_page.php?linker=".$row["author_name"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["author_photo"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;min-height:60px;'><center>".$row["author_name"]."</center></h4>
              <center>
              <a href='../author_page/author_page.php?linker=".$row["author_name"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>Visit Profile</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }
       else{
        echo "<div style='background-color:#332d2d;color: #dee2e6; width:50%; height:90px; font-size:x-large; text-align:center;border-radius:20px;'>
        <br><i>No Suggestions found.</i>
        </div>";
       }
       $obj->conn->close();
    }
    public function author_page(){
        $linker=$_REQUEST['linker'];
        $obj= new connection();
        $sql= "SELECT * FROM authors WHERE author_name='".$linker."'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
               echo " <div style='width: 100%; min-height:200px; background-color:white;border-radius:12px; overflow:hidden;' class='mb-5 mt-5'>

                    <div style='display:inline-block; min-height:330px; width:90%; margin-top:10px; color:#332d2d; min-width:500px;'>
                    <h2 class='border-bottom'><i style='color:#332d2d;'>".$row['author_name']."</i></h2>          
                    <table class='table'>
                    <tbody>
                    <tr>
                    <td id='table_element' rowspan='6'>
                    <div style='height:330px; width:209px; background-color:aqua; border-radius:8px;'>
                    <img src='".$row['author_photo']."' style='height:330px; width:209px;'>
                    </div>
                    </td>
                    </tr>
                    <tr>
        
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>From:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['author_from']."</i></td>
                    </tr>
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Date of Birth:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['dob']."</i></td>
                    </tr>
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Website:</i></h5></td>
                    <td style='width: 90%;'><a href='".$row['website']."' style='text-decoration:none;'><i  style='color:#332d2d;'>".$row['website']."</i></a></td>
                    </tr>
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Uploaded by:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['uploaded_by']."</i></td>
                    </tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Discription:</i></h5></td>
                    <td style='width: 90%;'><i><p style='color:#332d2d;'>".$row['author_discription']."</p></i></td>
                    </tr>
                    </tbody>
                    </table>

                    </div>
                    </div>";
            }
        }
        $obj->conn->close();
    }

    public function get_authors_for_author_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM authors";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../author_page/author_page.php?linker=".$row["author_name"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:380px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["author_photo"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:20px;'>".$row["author_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>From:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["author_from"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Date of Birth:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["dob"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='../author_page/author_page.php?linker=".$row["author_name"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Author profile</a>
                </center>
                </div>
                </div>
                </a>";
                
        }
        
       }
       else{
        echo "<div style='background-color:#332d2d;color: #dee2e6; width:50%; height:90px; font-size:x-large; text-align:center;border-radius:20px;'>
        <br><i>No Suggestions found.</i>
        </div>";
       }
       $obj->conn->close();
    }
}
?>