<?php
$str="";
$book_readable="";


if(isset($_POST["sub"])){
    $ran= rand();
    //For images..
    $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
    $target_path = $target_path .$ran. basename($_FILES['book_image']['name']) ;
    move_uploaded_file($_FILES['book_image']['tmp_name'], $target_path);
    $book_image="../book_images_and_files/" .$ran. $_FILES["book_image"]["name"];

    //For files..
    $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
    $target_path = $target_path .$ran. basename($_FILES['book_file']['name']) ;
    move_uploaded_file($_FILES['book_file']['tmp_name'], $target_path);
    $book_file="../book_images_and_files/" .$ran. $_FILES["book_file"]["name"];
    if($book_file!=""){
        $book_readable="yes";
    }
    else{
        $book_readable="no";
    }
    
    $book_name=trim($_REQUEST["book_name"]);
    $book_price=trim($_REQUEST["book_price"]);
    $book_author=trim($_REQUEST["book_author"]);
    $book_pages=$_REQUEST["book_pages"];
    $book_language=trim($_REQUEST["book_language"]);
    $book_discription=trim($_REQUEST["book_discription"]);
    $book_category=trim($_REQUEST["book_category"]);
    $book_review=trim($_REQUEST["book_review"]);
    $conn=new mysqli("localhost","root","","bookmark");
    if($conn->connect_error){
        die("connection error->".$conn->connect_error);
    }
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
    book_file) 
    VALUES('$book_name',
    '$book_price',
    '$book_author',
    '$book_category',
    $book_pages,
    '$book_readable',
    '$book_discription',
    '$book_language',
    '$book_image',
    '$book_review',
    '$book_file')";


    if($conn->query($sql)===true){
    {
        $str="Book Inserted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
    }

    $conn->close();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark.com</title>
    <link rel="icon" type="image/x-icon" href="../bookmark_images/Screenshot 2024-02-12 032316.png" id="icon">
    <link rel="stylesheet" href="user.css"></link>
    <script src="user.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
   
    <!--  Fonts and icons links start-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/12c7af8f08.js" crossorigin="anonymous"></script>
   


    <!--  Fonts and icons links end  -->
</head>
<body class="body" id="body" name="body">
   
    
<div class="main_container" id="main_container" name="main_container" >
    <div class="titlebar" id="titlebar" name="titlebar">
    
    <a href="home.php"> <h2 class="title" id="title" name="title" style="position:absolute; left:2%; margin-top:21px;"><span class="material-symbols-outlined bookmark_icon" id="bookmark_icon" name="bookmark_icon">collections_bookmark</span>BookMark.com</h2></a>
    <ul class="menubar" id="menubar" name="menubar">
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Author</a></li>
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item " name="menubar_item" >
    <div class="dropdown menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">User Options</a>
    <ul class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
    <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Add a book</a></li>
      <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">SignIn</a></li>
      <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">SignUp</a></li>
    </ul>
    </div>
    </li>
    
    <li class="menubar_item " name="menubar_item" >
    <div class="dropdown menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">Genres</a>
    <ul  class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Romance</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Billionare Romance</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Erotic</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Young Adult</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Crime</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Fantasy</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Vampires</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Autobiography</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Science Fiction</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Thriller</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Horror</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Classics</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Suspence</a></li>
    </ul>
    </div>
    </li>
    </ul>
    <ul class="menubar_collapse collapse" id="menubar_collapse" name="menubar_collapse">
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Author</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item_collapse " name="menubar_item_collapse" >
    <div class="dropdown dropend menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">User Options</a>
    <ul class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
      <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Add a book</a></li>
      <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">SignIn</a></li>
      <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">SignUp</a></li>
    </ul>
    </div>
    </li>
    <li class="menubar_item_collapse " name="menubar_item_collapse" >
    <div class="dropdown dropend menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">Genres</a>
    <ul  class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6; ">Romance</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Billionare Romance</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Erotic</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Young Adult</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Crime</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Fantasy</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Vampires</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Autobiography</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Science Fiction</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Thriller</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Horror</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Classics</a></li>
        <li><a class="dropdown-item" href="#" style="background-color:#332d2d; color:#dee2e6;">Suspence</a></li>
    </ul>
    </div>
    </li>
    </ul>
    <div id="maintainer" class="maintainer" name="maintainer">
        <input type="text" placeholder="Search books" id="searchbar" class="searchbar" name="searchbar" style="position:absolute; left: -6%;" onfocus="searchbar_coloradd()" onblur="searchbar_colorremove()">
        <div id="search_button" class="search_button" name="search_button">Search</div>
        <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#menubar_collapse">
        <span class="material-symbols-outlined menuicon" id="menuicon" name="menuicon">menu</span>
        </button>
    </div>
</div>
<!--Main body section -->
    <div id="main_body" name="main_body" class="main_body">
    <div class="bod">
    
    <div class="signer" id="signer" name="signer">
        <div id="signin_form" class="signin_form" name="signin_form">
            <center style="padding-top:40px;">
                <h2 style="background-color:transparent;color:#dee2e6;">Add a book.</h2>
                <form action="user.php" enctype="multipart/form-data" method="post" id="user_form">
                <div class="mb-3 mt-3">
                <label for="book_name" style="background-color:transparent;color:#dee2e6;">Book name: <i class="fa-solid fa-check text_stroke" id="name_correct"></i></label>
                <input type="text" class="form-control" id="book_name" placeholder="Enter book name" name="book_name" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="name_check()">
                <div class="alert mb-2 mt-2 warnings" id="name_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter the name of the book.
                </div>
                </div>
                <div class="mb-3 mt-3">
                <label for="book_price" style="background-color:transparent;color:#dee2e6;">Book price: <i class="fa-solid fa-check text_stroke" id="price_correct"></i></label>
                <input type="text" class="form-control" id="book_price" placeholder="Enter book price" name="book_price" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="price_check()">
                <div class="alert mb-2 mt-2 warnings" id="price_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter the price of the book.
                </div>
                </div>
                <div class="mb-3 mt-3">
                <label for="book_author" style="background-color:transparent;color:#dee2e6;">Book author: <i class="fa-solid fa-check text_stroke" id="author_correct"></i></label>
                <input type="text" class="form-control" id="book_author" placeholder="Enter book authors name" name="book_author" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="author_check()">
                <div class="alert mb-2 mt-2 warnings" id="author_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter the name of the author of the book.
                </div>
                </div>
                <div class="container">
                <div class="btn" style="background-color:transparent;color:#dee2e6; padding:12px; border:2px solid #dee2e6; margin-bottom:16px;" data-bs-toggle="collapse" data-bs-target="#genres_option">Book category: <i class="fa-solid fa-check text_stroke" id="category_correct"></i></div>
                
                <div class="list-group collapse" id="genres_option" style="background-color:transparent; width:20%;min-width:125px; margin-bottom:16px;">
                <input type="text" class="form-control mb-3" id="book_category" placeholder="--Book category--" name="book_category" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6;">
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_r"  id="genres_r" onclick="genres_r()">Romance</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_br" id="genres_br" onclick="genres_br()">Billionare Romance</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_e" id="genres_e" onclick="genres_e()">Erotic</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_ya" id="genres_ya" onclick="genres_ya()">Young Adult</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_cr"  id="genres_cr" onclick="genres_cr()">Crime</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_f" id="genres_f" onclick="genres_f()">Fantasy</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_v" id="genres_v" onclick="genres_v()">Vampires</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_a"  id="genres_a" onclick="genres_a()">Autobiography</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;"  name="genres_sf" id="genres_sf" onclick="genres_sf()">Science Fiction</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_t"  id="genres_t" onclick="genres_t()">Thriller</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_h"  id="genres_h" onclick="genres_h()">Horror</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_cl"  id="genres_cl" onclick="genres_cl()">Classics</a>
                <a href="#" class="list-group-item" style="background-color:transparent; color:#dee2e6;" name="genres_s"  id="genres_s" onclick="genres_s()">Suspence</a>
                </div>
                </div>
                <div class="alert mb-2 mt-2 warnings" id="category_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please select the correct genre/category the book.
                </div>
                <div class="mb-3 mt-3">
                <label for="book_pages" style="background-color:transparent;color:#dee2e6;">Book overall pages: <i class="fa-solid fa-check text_stroke" id="pages_correct"></i></label>
                <input type="number" class="form-control" id="book_pages" placeholder="Enter book overall pages" name="book_pages" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="pages_check()">
                <div class="alert mb-2 mt-2 warnings" id="pages_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter the number of pages.
                </div>
                </div>
                <div class="mb-3 mt-3">
                <label for="book_language" style="background-color:transparent;color:#dee2e6;">Book language: <i class="fa-solid fa-check text_stroke" id="language_correct"></i></label>
                <input type="text" class="form-control" id="book_language" placeholder="Enter book language" name="book_language" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="language_check()">
                <div class="alert mb-2 mt-2 warnings" id="language_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter a valid language.
                </div>
                </div>
                <div class="mb-3 mt-3">
                <label for="book_discription" style="background-color:transparent;color:#dee2e6;">Book discription: <i class="fa-solid fa-check text_stroke" id="discription_correct"></i></label>
                <textarea rows="4" cols="50" maxlength="50000" class="form-control" id="book_discription" placeholder="Enter book discription" name="book_discription" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onblur="discription_check()"></textarea>
                <div class="alert mb-2 mt-2 warnings" id="discription_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please enter a discription.
                </div>
                </div>
                <div class="btn" style="background-color:transparent;color:#dee2e6; padding:12px; border:2px solid #dee2e6; margin-bottom:16px;" data-bs-toggle="collapse" data-bs-target="#files">Upload image and file: <i class="fa-solid fa-check text_stroke" id="image_and_file_correct"></i></div>
                <div class="mb-3 mt-3 collapse" id="files">
                <label for="book_image" style="background-color:transparent;color:#dee2e6;" data-bs-toggle="collapse" data-bs-target="#menubar_collapse">Upload image: <i class="fa-solid fa-check text_stroke" id="image_correct"></i></label>
                <input type="file" class="form-control" id="book_image" placeholder="upload image" name="book_image" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onchange="image_check()" onblur="image_check()">
                <div class="alert mb-2 mt-2 warnings" id="image_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please upload a picture of the book.
                </div>
                <label for="book_file" style="background-color:transparent;color:#dee2e6;" data-bs-toggle="collapse" data-bs-target="#menubar_collapse">Upload file: <i class="fa-solid fa-check text_stroke" id="file_correct"></i></label>
                <input type="file" class="form-control" id="book_file" placeholder="upload file" name="book_file" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:70%;" onchange="file_check()" onblur="file_check()">
                <div class="alert mb-2 mt-2 warnings" id="file_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please upload the file of the book.
                </div>
                </div>
                <div class="mb-3 mt-3">
                <label style="background-color:transparent;color:#dee2e6;">Book rating: <i class="fa-solid fa-check text_stroke" id="rating_correct"></i></label>
                <ul class="" style="background-color:transparent; list-style-type:none;border:2px solid #dee2e6; color:#dee2e6; width:70%;">
                <li class="rating_list" style="margin-left:-6%;"><i class="fa-regular fa-star" id="star1" name="star1" onclick="first_star()"></i></li>
                <li class="rating_list"><i class="fa-regular fa-star" id="star2" name="star2" onclick="second_star()"></i></li>
                <li class="rating_list"><i class="fa-regular fa-star" id="star3" name="star3" onclick="third_star()"></i></li>
                <li class="rating_list"><i class="fa-regular fa-star" id="star4" name="star4" onclick="fourth_star()"></i></li>
                <li class="rating_list"><i class="fa-regular fa-star" id="star5" name="star5" onclick="fifth_star()"></i></li>

                </ul>
                <input type="text" class="form-control mb-3" id="book_review" placeholder="--Book Rating--" name="book_review" style="background-color:transparent;border:2px solid #dee2e6; color:#dee2e6; width:15%;">
                </div>
                <div class="alert mb-2 mt-2 warnings" id="rating_error" style="background-color:transparent;border:2px solid red; color:red; width:70%;">
                <strong>Warning!</strong> Please select a rating for the book.
                </div>
                <button type="submit" class="btn" style="border:2px solid #dee2e6; color:#dee2e6; margin-bottom:20px;" id="sub" name="sub" onclick="submit_check(event)">Submit</button>
                <div class="mb-1 mt-1" id="final_note">
                <label style="background-color:transparent;color:#dee2e6;"><?php echo $str;?></label>
                </div>
                
                </form>
            </center>

        </div>
        
    </div>
    
    <div style="position:absolute; top:1100px;width:100%;">
    <center>
    <ul id="sign_button" class="sign_button" name="sign_button">
        <li class="sign_button_item"><div class="sign_button_clicker">Sign In</div></li>
        <li class="sign_button_item"><div class="sign_button_clicker">Sign Up</div></li>
    </ul>
    </center>
    </div>
    
    </div>


    </div>


    <!-- Footer section-->
    <div id="footer" class="footer" name="footer">
    <span class="material-symbols-outlined footer_bookmark_icon" name="footer_bookmark_icon">collections_bookmark</span><h1 class="footer_title" style="margin-top:18px;">BookMark.com</h1>
    <ul id="footer_icons"  class="footor_icons" name="footer_icons">
        <li class="footer_icons_item"><a href="instagram.php" class="footer_icons_anchor"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
        <li class="footer_icons_item"><a href="facebook.php" class="footer_icons_anchor"><i class="fa-brands fa-facebook"></i></a></li>
        <li class="footer_icons_item"><a href="linkedin.php" class="footer_icons_anchor"><i class="fa-brands fa-linkedin"></i></a></li>
        <li class="footer_icons_item"><a href="discord.php" class="footer_icons_anchor"><i class="fa-brands fa-discord"></i></a></li>
        <li class="footer_icons_item"><a href="#" class="footer_icons_anchor"><i class="fa-brands fa-google"></i></a></li>
    </ul>
        <p id="footer_paragraph" class="footer_paragraph" name="footer_paragraph">
            To all the readers who find true joy and comfort in a magnificent literature, or people who find their save place on a rainy day in the imagination created by an authors love,<br><br>
            Welcome to Bookmark.com! Explore a vast collection of literary treasures that span genres, from gripping thrillers to heartwarming romances.<br> Discover new releases, timeless classics, and hidden gems. Your next literary adventure awaits.<br><br> start your journey with us! 
        </p>
        <div id="footer_image"class="footer_image" name="footer_image">
        <div id="reading_girl" class="reading_girl" name="reading_girl">

        </div>
        </div>
        

    </div>

    </div>
  

</body>
</html>