<?php

class Book_database{
    public $book_number;
    public $book_image;
    public $book_file;
    public $book_name;
    public $book_readable;
    public $book_price;
    public $book_author;
    public $book_pages;
    public $book_language;
    public $book_discription;
    public $book_category;
    public $book_review;
    public $uploaded_by="Admin";
    public $str;
    public function get_book_by_bookname(){
        // obj is database connection obj.
        $obj= new connection();
        $this->book_number=$_REQUEST["linker"];
        $sql="SELECT * FROM books WHERE book_number='$this->book_number'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo "<div style='width:97%; margin-left:-13px; ' >
              <div style='width: 100%; min-height:200px; background-color:white;border-radius:12px; overflow:hidden;' class='mb-5 mt-5'>
              
                                  <div style='display:inline-block; min-height:330px; width:90%; margin-top:10px; color:#332d2d; min-width:500px;'>
                                  <h2 class='border-bottom'><i style='color:#332d2d;'>".$row['book_name']."</i></h2>          
                                  <table class='table'>
                                  <tbody>
                                  <tr>
                                  <td id='table_element' rowspan='10'>
                                  <div style='height:330px; width:209px; background-color:aqua; border-radius:8px;'>
                                  <img src='".$row["book_image"]."' style='height:330px; width:209px;'>
                                  </div>
                                  </td>
                                  </tr>
                                  <tr>
                      
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Author:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_author']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Genre:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_category']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Language:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_language']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Pages:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_pages']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Online Price:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_price']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Online Rating:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['book_review']."</i></td>
                                  </tr>
                                  <tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Uploaded by:</i></h5></td>
                                  <td style='width: 90%;'><i style='color:#332d2d;'>".$row['uploaded_by']."</i></td>
                                  </tr>
                                  <td style='width: 20%;'><h5><i style='color:#332d2d;'>Discription:</i></h5></td>
                                  <td style='width: 90%;'><i><p style='color:#332d2d;'>".$row['book_discription']."</p></i></td>
                                  </tr>
                                  <tr>
                                  <td colspan='2'><a href='".$row['book_file']."' download style='text-decoration:none;'><button type='button' class='btn' style='background-color:#332d2d; color:#dee2e6;'>Download</button></a></td>
                                  </tr>
                                  </tbody>
                                  </table>
              
                                  </div>
                                  </div>'
              
              </div>
              
              </div>
              </div>";
        }
       }
       $obj->conn->close();
    }
    public function insert_book_values(){
        $ran= rand();
        /* book image */
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['book_image']['name']) ;
        move_uploaded_file($_FILES['book_image']['tmp_name'], $target_path);
        $b_image="../book_images_and_files/" .$ran. $_FILES["book_image"]["name"];
        $this->book_image=$b_image;
    
        /*book file*/
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['book_file']['name']) ;
        move_uploaded_file($_FILES['book_file']['tmp_name'], $target_path);
        $b_file="../book_images_and_files/" .$ran. $_FILES["book_file"]["name"];
        $this->book_file=$b_file;

        /*book readable*/
        $b_readable="";
        if($this->book_file!=""){
            $b_readable="yes";
        }
        else{
            $b_readable="no";
        }
        $this->book_readable=$b_readable;

        /*book name*/
        if(isset($_REQUEST['book_name'])){
        $b_name=trim($_REQUEST["book_name"]);
        $b_name=str_replace("'","\'",$b_name);
        $b_name=str_replace('"','\"',$b_name);
        $this->book_name=$b_name;
        }

        /* book price*/
        if(isset($_REQUEST['book_price'])){
        $b_price=trim($_REQUEST["book_price"]);
        $b_price=str_replace("'","\'",$b_price);
        $b_price=str_replace('"','\"',$b_price);
        $this->book_price=$b_price;
        }

        /*book author */
        if(isset($_REQUEST['book_author'])){
        $b_author=trim($_REQUEST["book_author"]);
        $b_author=str_replace("'","\'",$b_author);
        $b_author=str_replace('"','\"',$b_author);
        $this->book_author=$b_author;
        }

        /*book pages */
        if(isset($_REQUEST['book_pages'])){
        $b_pages=$_REQUEST["book_pages"];
        $this->book_pages=$b_pages;
        }

        /*book language */
        if(isset($_REQUEST['book_language'])){
        $b_language=trim($_REQUEST["book_language"]);
        $b_language=str_replace("'","\'",$b_language);
        $b_language=str_replace('"','\"',$b_language);
        $this->book_language=$b_language;
        }

        /*book language */
        if(isset($_REQUEST['book_discription'])){
        $b_discription=trim($_REQUEST["book_discription"]);
        $b_discription=str_replace("'","\'",$b_discription);
        $b_discription=str_replace('"','\"',$b_discription);
        $this->book_discription=$b_discription;
        }

        /*book category */
        if(isset($_REQUEST['book_category'])){
        $b_category=trim($_REQUEST["book_category"]);
        $this->book_category=$b_category;
        }

        /*book review */
        if(isset($_REQUEST["book_review"])){
        $b_review=trim($_REQUEST["book_review"]);
        $this->book_review=$b_review;
        }

        if (isset($_SESSION["user_name"]) && ($_SESSION["user_photo"])){
          $this->uploaded_by=$_SESSION["user_name"];
      }
    }

    public function insert_book(){
        // obj is database connection obj.
        $obj= new connection();
        $sql="INSERT INTO books
        (book_name,
        book_price,
        book_author,
        book_category,
        book_pages,
        book_readable,
        book_discription,
        book_language,
        book_image,
        book_review,
        book_file.
        uploaded_by) 
        VALUES('$this->book_name',
        '$this->book_price',
        '$this->book_author',
        '$this->book_category',
        $this->book_pages,
        '$this->book_readable',
        '$this->book_discription',
        '$this->book_language',
        '$this->book_image',
        '$this->book_review',
        '$this->book_file',
        '$this->uploaded_by')";


        if($obj->conn->query($sql)){
            $str="Book Inserted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
        }

        $obj->conn->close();
    }
    public function update_book_by_bookname(){
        $ran= rand();

        /* book image */
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['book_image']['name']) ;
        move_uploaded_file($_FILES['book_image']['tmp_name'], $target_path);
        $b_image="../book_images_and_files/" .$ran. $_FILES["book_image"]["name"];
        $this->book_image=$b_image;

        /*book file*/
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['book_file']['name']) ;
        move_uploaded_file($_FILES['book_file']['tmp_name'], $target_path);
        $b_file="../book_images_and_files/" .$ran. $_FILES["book_file"]["name"];
        $this->book_file=$b_file;

        
        /*book readable*/
        $b_readable="";
        if($this->book_file!=""){
            $b_readable="yes";
        }
        else{
            $b_readable="no";
        }
        $this->book_readable=$b_readable;

        /*book name*/
        if(isset($_REQUEST['book_name'])){
        $b_name=trim($_REQUEST["book_name"]);
        $b_name=str_replace("'","\'",$b_name);
        $b_name=str_replace('"','\"',$b_name);
        $this->book_name=$b_name;
        }

        /* book price*/
        if(isset($_REQUEST['book_price'])){
        $b_price=trim($_REQUEST["book_price"]);
        $b_price=str_replace("'","\'",$b_price);
        $b_price=str_replace('"','\"',$b_price);
        $this->book_price=$b_price;
        }

        /*book author */
        if(isset($_REQUEST['book_author'])){
        $b_author=trim($_REQUEST["book_author"]);
        $b_author=str_replace("'","\'",$b_author);
        $b_author=str_replace('"','\"',$b_author);
        $this->book_author=$b_author;
        }

        /*book pages */
        if(isset($_REQUEST['book_pages'])){
        $b_pages=$_REQUEST["book_pages"];
        $this->book_pages=$b_pages;
        }

        /*book language */
        if(isset($_REQUEST['book_language'])){
        $b_language=trim($_REQUEST["book_language"]);
        $b_language=str_replace("'","\'",$b_language);
        $b_language=str_replace('"','\"',$b_language);
        $this->book_language=$b_language;
        }

        /*book language */
        if(isset($_REQUEST['book_discription'])){
        $b_discription=trim($_REQUEST["book_discription"]);
        $b_discription=str_replace("'","\'",$b_discription);
        $b_discription=str_replace('"','\"',$b_discription);
        $this->book_discription=$b_discription;
        }

        /*book category */
        if(isset($_REQUEST['book_category'])){
        $b_category=trim($_REQUEST["book_category"]);
        $this->book_category=$b_category;
        }

        /*book review */
        if(isset($_REQUEST["book_review"])){
        $b_review=trim($_REQUEST["book_review"]);
        $this->book_review=$b_review;
        }

        if (isset($_SESSION["user_name"]) && ($_SESSION["user_photo"])){
          $this->uploaded_by=$_SESSION["user_name"];
      }

        // obj is database connection obj.
        $obj= new connection();
        $sql="UPDATE books SET
        book_name='$this->book_name',
        book_price='$this->book_price',
        book_author='$this->book_author',
        book_category='$this->book_category',
        book_pages=$this->book_pages,
        book_readable='$this->book_readable',
        book_discription='$this->book_discription',
        book_language='$this->book_language',
        book_image='$this->book_image',
        book_review='$this->book_review',
        book_file='$this->book_file',
        uploaded_by='$this->uploaded_by'
        WHERE book_number=$this->book_number";

        if($obj->conn->query($sql)){
            $str="Book Inserted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
        }

        $obj->conn->close();
    
        
    }
    public function delete_book_by_book_number(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "DELETE FROM books WHERE book_number=$this->book_number";

        if($obj->conn->query($sql)){
            $str="Book deleted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
        }

        $obj->conn->close();
    }

    public function get_book_for_home_page_top_novels(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_review='5/5'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
              <table>
              <tr width='100%' class='card-text' style='margin-top:-40px;'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }

       $sql= "SELECT * FROM books WHERE book_review='4/5'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
              <table>
              <tr width='100%' class='card-text' style='margin-top:-40px;'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }

       $sql= "SELECT * FROM books WHERE book_review='3/5'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
              <table>
              <tr width='100%' class='card-text' style='margin-top:-40px;'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }

       $sql= "SELECT * FROM books WHERE book_review='2/5'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
              <table>
              <tr width='100%' class='card-text' style='margin-top:-40px;'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }

       $sql= "SELECT * FROM books WHERE book_review='1/5'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
              <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
              <div class='card-body'>
              <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
              <table>
              <tr width='100%' class='card-text' style='margin-top:-40px;'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
              </center>
              </div>
              </div>
              </a>";
                
        }
        
       }
       $obj->conn->close();
    }

    public function get_book_for_home_page_read_online(){
      // obj is database connection obj.
      $obj= new connection();
      $sql= "SELECT * FROM books ORDER BY book_number DESC";
      $result=$obj->conn->query($sql);
      if($result->num_rows> 0){
          while($row=$result->fetch_assoc()){
            echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
            <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; overflow-x:auto; min-height:380px;'>
            <center>
            <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
            <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
            </div>
            </center>
            <div class='card-body'>
            <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
            <table>
            <tr width='100%' class='card-text' style='margin-top:-40px;'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
            </tr>
    
            </table>
            <center>
            <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

  public function get_book_for_author_page_authors_books(){
    // obj is database connection obj.
    $linker=$_REQUEST["linker"];
    $obj= new connection();
    $sql= "SELECT * FROM books WHERE book_author='".$linker."'";
    $result=$obj->conn->query($sql);
    if($result->num_rows> 0){
        while($row=$result->fetch_assoc()){
          echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
          <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; min-height:380px;'>
          <center>
          <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
          <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
          </div>
          </center>
          <div class='card-body'>
          <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
          <table>
          <tr width='100%' class='card-text' style='margin-top:-40px;'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
          </tr>
  
          </table>
          <center>
          <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
          </center>
          </div>
          </div>
          </a>";
            
      }
    
     }
     $obj->conn->close();
    }

    public function get_book_for_user_profile_users_books(){
      // obj is database connection obj.
      $linker=$_REQUEST["linker"];
      $obj= new connection();
      $sql= "SELECT * FROM books WHERE uploaded_by ='".$linker."'";
      $result=$obj->conn->query($sql);
      if($result->num_rows> 0){
          while($row=$result->fetch_assoc()){
            echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
            <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px 27px; display:inline-block; min-height:380px;'>
            <center>
            <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
            <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
            </div>
            </center>
            <div class='card-body'>
            <h4 class='card-title' style='padding-bottom:20px;height:60px;'><center>".$row["book_name"]."</center></h4><br>
            <table>
            <tr width='100%' class='card-text' style='margin-top:-40px;'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
            </tr>
    
            </table>
            <center>
            <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
            </center>
            </div>
            </div>
            </a>";
              
        }
      
       }
       else{
        echo "<div style='background-color:#332d2d;color: #dee2e6; width:50%; height:90px; font-size:x-large; text-align:center;border-radius:20px;'>
        <br><i>No books uploaded by you.</i>
        </div>";
       }
       $obj->conn->close();
      }

    public function get_book_for_romance_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Romance' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_all_books_page(){
      // obj is database connection obj.
      $obj= new connection();
      $sql= "SELECT * FROM books ORDER BY book_number DESC";
      $result=$obj->conn->query($sql);
      if($result->num_rows> 0){
          while($row=$result->fetch_assoc()){
            echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
              <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
  
              <center>
            <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
            <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
            </div>
            </center>
              <div class='card-body'>
              <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
              <table>
              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
              </tr>

              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
              </tr>

              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
              </tr>

              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
              </tr>

              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
              </tr>

              <tr width='100%' class='card-text'>
              <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
              <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
              </tr>
      
              </table>
              <center>
              <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

  public function get_book_for_top_novels_page(){
    // obj is database connection obj.
    $obj= new connection();

    $sql= "SELECT * FROM books WHERE book_review='5/5'";
    $result=$obj->conn->query($sql);
    if($result->num_rows> 0){
        while($row=$result->fetch_assoc()){
          echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
            <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

            <center>
          <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
          <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
          </div>
          </center>
            <div class='card-body'>
            <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
            <table>
            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
            </tr>
    
            </table>
            <center>
            <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
            </center>
            </div>
            </div>
            </a>";
            
    }
    
   }

   $sql= "SELECT * FROM books WHERE book_review='4/5'";
   $result=$obj->conn->query($sql);
   if($result->num_rows> 0){
       while($row=$result->fetch_assoc()){
         echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
           <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

           <center>
         <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
         <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
         </div>
         </center>
           <div class='card-body'>
           <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
           <table>
           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
           </tr>
   
           </table>
           <center>
           <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
           </center>
           </div>
           </div>
           </a>";
           
   }
   
  }


    $sql= "SELECT * FROM books WHERE book_review='3/5'";
    $result=$obj->conn->query($sql);
    if($result->num_rows> 0){
        while($row=$result->fetch_assoc()){
          echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
            <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

            <center>
          <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
          <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
          </div>
          </center>
            <div class='card-body'>
            <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
            <table>
            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
            </tr>
    
            </table>
            <center>
            <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
            </center>
            </div>
            </div>
            </a>";
            
    }
    
   }

   $sql= "SELECT * FROM books WHERE book_review='2/5'";
   $result=$obj->conn->query($sql);
   if($result->num_rows> 0){
       while($row=$result->fetch_assoc()){
         echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
           <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

           <center>
         <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
         <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
         </div>
         </center>
           <div class='card-body'>
           <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
           <table>
           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
           </tr>

           <tr width='100%' class='card-text'>
           <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
           <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
           </tr>
   
           </table>
           <center>
           <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
           </center>
           </div>
           </div>
           </a>";
           
   }
   
  }

  $sql= "SELECT * FROM books WHERE book_review='1/5'";
  $result=$obj->conn->query($sql);
  if($result->num_rows> 0){
      while($row=$result->fetch_assoc()){
        echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
          <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

          <center>
        <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
        <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
        </div>
        </center>
          <div class='card-body'>
          <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
          <table>
          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
          </tr>

          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
          </tr>

          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
          </tr>

          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
          </tr>

          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
          </tr>

          <tr width='100%' class='card-text'>
          <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
          <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
          </tr>
  
          </table>
          <center>
          <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
          </center>
          </div>
          </div>
          </a>";
          
  }
  
 }
  }

  public function get_book_for_search_page(){
    $searching="";
    if(isset($_REQUEST["searcher"])){
      $searching=$_REQUEST["searcher"];
      $searching=str_replace("'","\'",$searching);
      $searching=str_replace('"','\"',$searching);
    }
    // obj is database connection obj.
    $obj= new connection();
    $sql="SELECT * FROM books WHERE book_name LIKE '%$searching%'";
    $result=$obj->conn->query($sql);
    if($result->num_rows> 0){
        while($row=$result->fetch_assoc()){
          echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
            <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>

            <center>
          <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
          <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
          </div>
          </center>
            <div class='card-body'>
            <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
            <table>
            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
            </tr>

            <tr width='100%' class='card-text'>
            <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
            <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
            </tr>
    
            </table>
            <center>
            <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_billionare_romance_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Billionare Romance' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_erotic_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Erotic' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_young_adult_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Young Adult' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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
    
    public function get_book_for_crime_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Crime' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_fantasy_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Fantasy' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_vampires_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Vampires' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_autobiography_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Autobiography' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_science_fiction_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Science Fiction' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_thriller_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Thriller' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_horror_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Horror' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_classics_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Classics' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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

    public function get_book_for_suspence_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Suspence' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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
    public function get_book_for_mythology_page(){
        // obj is database connection obj.
        $obj= new connection();
        $sql= "SELECT * FROM books WHERE book_category='Mythology' ORDER BY book_number DESC";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
              echo " <a href='../book_page/book_page.php?linker=".$row["book_number"]."' class='body_elements'>
                <div class='card inline_block mt-5 mb-5 ml-5 mr-5' style='width:299px; margin:80px; display:inline-block; overflow-x:auto; min-height:680px;'>
    
                <center>
              <div style='max-height:330px; max-width:209px; overflow:hidden; align-items:center; border-radius:5px;'>
              <img class='card-img-top' src='".$row["book_image"]."' alt='Card image' style='width:100%; height:330px; border-radius:5px; margin-top:17px;' onmouseover='zoomer_in(this)' onmouseout='zoomer_out(this)'>
              </div>
              </center>
                <div class='card-body'>
                <h4 class='card-title' style='margin-bottom:20px; height:60px;'>".$row["book_name"]."</h4><br>
                <table>
                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Author:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_author"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Genre:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_category"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Language:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_language"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Price:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_price"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Online Rating:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["book_review"]."</center></i></span></td>
                </tr>

                <tr width='100%' class='card-text'>
                <td width='50%' height='25px'><h5 style='margin-bottom:4px;'>Uploaded By:</h5></td>
                <td width='50%' ><span><i style='font-size: large;'><center>".$row["uploaded_by"]."</center></i></span></td>
                </tr>
        
                </table>
                <center>
                <a href='..book_page/book_page.php?linker=".$row["book_number"]."' class='btn' style='background-color:#332d2d; color: #dee2e6; width:100%;'>See Entire Book</a>
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