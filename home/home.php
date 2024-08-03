<?php
include("../book_database.php");
include("../user_database.php");
include("../author_database.php");
include("../connection.php");
session_start();


$str="";
$user_obj=new User_database();
$book_obj=new Book_database();
$author_obj=new Author_database();
$user_obj->session_recieve();


if(isset($_POST["sub"])){

    //user database object
    $user_obj->session_insert();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark.com</title>
    <link rel="icon" type="image/x-icon" href="../bookmark_images/Screenshot 2024-02-12 032316.png" id="icon">
    <link rel="stylesheet" href="home.css"></link>
    <script src="home.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
   
    <!--  Fonts and icons links start-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/12c7af8f08.js" crossorigin="anonymous"></script>
    <script>
        function showbook(book_str){
            if(book_str==""){
                document.getElementById("search_engine").innerHTML="";
                document.getElementById("search_engine").style.display = "none"
                return;
            }
            else{
                document.getElementById("search_engine").style.display = "block"
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("search_engine").innerHTML = this.responseText;
               }
               };
               xmlhttp.open("GET","../showbook.php?q="+book_str,true);
               xmlhttp.send();
            }
        }

        function searching(event){
          let searcher=document.getElementById("searchbar").value;
          if(event.key=="Enter"){
            window.location.assign("../search/search.php?searcher="+searcher);
          }
        }

        
    </script>



    <!--  Fonts and icons links end  -->
</head>
<body class="body" id="body" name="body">
<div class="main_container" id="main_container" name="main_container" >
    <div class="titlebar" id="titlebar" name="titlebar" style="z-index:4;">
    
    <a href="home.php"> <h2 class="title" id="title" name="title" style="position:absolute; left:2%; margin-top:21px;"><span class="material-symbols-outlined bookmark_icon" id="bookmark_icon" name="bookmark_icon">collections_bookmark</span>BookMark.com</h2></a>
    <ul class="menubar" id="menubar" name="menubar">
    <li class="menubar_item" name="menubar_item"><a href="../all_books/all_books.php" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item" name="menubar_item"><a href="../author_main_page/author_main_page.php" class="menubar_anchor">Author</a></li>
    <li class="menubar_item" name="menubar_item"><a href="../top_novels/top_novels.php" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item " name="menubar_item" >
    <div class="dropdown menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">User Options</a>
    <ul class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
    <li><a class="dropdown-item" href="../addabook/addabook.php" style="background-color:#332d2d; color:#dee2e6;" onclick="user_check_book(event)">Add a book</a></li>
    <li><a class="dropdown-item" href="../signin/signin.php" style="background-color:#332d2d; color:#dee2e6;">SignIn</a></li>
    <li><a class="dropdown-item" href="../signup/signup.php" style="background-color:#332d2d; color:#dee2e6;">SignUp</a></li>
    <li><a class="dropdown-item" href="../add_author/add_author.php" style="background-color:#332d2d; color:#dee2e6;" onclick="user_check_author(event)">Add Author</a></li>
    
    </ul>
    </div>
    </li>
    
    <li class="menubar_item " name="menubar_item" >
    <div class="dropdown menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">Genres</a>
    <ul  class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
    <li><a class="dropdown-item" href="../romance/romance.php" style="background-color:#332d2d; color:#dee2e6; ">Romance</a></li>
        <li><a class="dropdown-item" href="../billionare_romance/billionare_romance.php" style="background-color:#332d2d; color:#dee2e6;">Billionare Romance</a></li>
        <li><a class="dropdown-item" href="../erotic/erotic.php" style="background-color:#332d2d; color:#dee2e6;">Erotic</a></li>
        <li><a class="dropdown-item" href="../young_adult/young_adult.php" style="background-color:#332d2d; color:#dee2e6;">Young Adult</a></li>
        <li><a class="dropdown-item" href="../crime/crime.php" style="background-color:#332d2d; color:#dee2e6;">Crime</a></li>
        <li><a class="dropdown-item" href="../fantasy/fantasy.php" style="background-color:#332d2d; color:#dee2e6;">Fantasy</a></li>
        <li><a class="dropdown-item" href="../vampires/vampires.php" style="background-color:#332d2d; color:#dee2e6;">Vampires</a></li>
        <li><a class="dropdown-item" href="../autobiography/autobiography.php" style="background-color:#332d2d; color:#dee2e6;">Autobiography</a></li>
        <li><a class="dropdown-item" href="../science_fiction/science_fiction.php" style="background-color:#332d2d; color:#dee2e6;">Science Fiction</a></li>
        <li><a class="dropdown-item" href="../thriller/thriller.php" style="background-color:#332d2d; color:#dee2e6;">Thriller</a></li>
        <li><a class="dropdown-item" href="../horror/horror.php" style="background-color:#332d2d; color:#dee2e6;">Horror</a></li>
        <li><a class="dropdown-item" href="../classics/classics.php" style="background-color:#332d2d; color:#dee2e6;">Classics</a></li>
        <li><a class="dropdown-item" href="../mythology/mythology.php" style="background-color:#332d2d; color:#dee2e6;">Mythology</a></li>
        <li><a class="dropdown-item" href="../suspence/suspence.php" style="background-color:#332d2d; color:#dee2e6;">Suspence</a></li>
    </ul>
    </div>
    </li>
    </ul>
    <ul class="menubar_collapse collapse" id="menubar_collapse" name="menubar_collapse">
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="../all_books/all_books.php" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="../author_main_page/author_main_page.php" class="menubar_anchor">Author</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="../top_novels/top_novels.php" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item_collapse " name="menubar_item_collapse" >
    <div class="dropdown dropend menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">User Options</a>
    <ul class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
      <li><a class="dropdown-item" href="../addabook/addabook.php" style="background-color:#332d2d; color:#dee2e6;" onclick="user_check_book(event)">Add a book</a></li>
      <li><a class="dropdown-item" href="../signin/signin.php" style="background-color:#332d2d; color:#dee2e6;">SignIn</a></li>
      <li><a class="dropdown-item" href="../signup/signup.php" style="background-color:#332d2d; color:#dee2e6;">SignUp</a></li>
      <li><a class="dropdown-item" href="../add_author/add_author.php" style="background-color:#332d2d; color:#dee2e6;" onclick="user_check_author(event)">Add Author</a></li>
    </ul>
    </div>
    </li>
    <li class="menubar_item_collapse " name="menubar_item_collapse" >
    <div class="dropdown dropend menubar_anchor" >
    <a href="#" class="menubar_anchor dropdown-toggle" data-bs-toggle="dropdown">Genres</a>
    <ul  class="dropdown-menu" style="background-color:#332d2d; color:#dee2e6;">
       <li><a class="dropdown-item" href="../romance/romance.php" style="background-color:#332d2d; color:#dee2e6; ">Romance</a></li>
        <li><a class="dropdown-item" href="../billionare_romance/billionare_romance.php" style="background-color:#332d2d; color:#dee2e6;">Billionare Romance</a></li>
        <li><a class="dropdown-item" href="../erotic/erotic.php" style="background-color:#332d2d; color:#dee2e6;">Erotic</a></li>
        <li><a class="dropdown-item" href="../young_adult/young_adult.php" style="background-color:#332d2d; color:#dee2e6;">Young Adult</a></li>
        <li><a class="dropdown-item" href="../crime/crime.php" style="background-color:#332d2d; color:#dee2e6;">Crime</a></li>
        <li><a class="dropdown-item" href="../fantasy/fantasy.php" style="background-color:#332d2d; color:#dee2e6;">Fantasy</a></li>
        <li><a class="dropdown-item" href="../vampires/vampires.php" style="background-color:#332d2d; color:#dee2e6;">Vampires</a></li>
        <li><a class="dropdown-item" href="../autobiography/autobiography.php" style="background-color:#332d2d; color:#dee2e6;">Autobiography</a></li>
        <li><a class="dropdown-item" href="../science_fiction/science_fiction.php" style="background-color:#332d2d; color:#dee2e6;">Science Fiction</a></li>
        <li><a class="dropdown-item" href="../thriller/thriller.php" style="background-color:#332d2d; color:#dee2e6;">Thriller</a></li>
        <li><a class="dropdown-item" href="../horror/horror.php" style="background-color:#332d2d; color:#dee2e6;">Horror</a></li>
        <li><a class="dropdown-item" href="../classics/classics.php" style="background-color:#332d2d; color:#dee2e6;">Classics</a></li>
        <li><a class="dropdown-item" href="../mythology/mythology.php" style="background-color:#332d2d; color:#dee2e6;">Mythology</a></li>
        <li><a class="dropdown-item" href="../suspence/suspence.php" style="background-color:#332d2d; color:#dee2e6;">Suspence</a></li>
    </ul>
    </div>
    </li>
    </ul>
    <div id="maintainer" class="maintainer" name="maintainer">
      <script>
        function search(){
          let searcher=document.getElementById("searchbar").value;
          if(searcher!=""){
          window.location.assign("../search/search.php?searcher="+searcher);
          }else{
            alert("Please Enter a book name in the searchbar to find it.");
          }
        }
      </script>
        <div class="container">
        <input type="text" placeholder="Search books" id="searchbar" class="searchbar" name="searchbar" style="position:absolute; left: -6%;" onfocus="searchbar_coloradd()" onblur="searchbar_colorremove()" onkeyup="showbook(this.value)" onkeydown="searching(event)" autocomplete="off">
        <ul class="list-group list-group-flush" id="search_engine" style="margin-top: 38px; margin-left:-30px; background-color:#332d2d; border-radius:12px;">
            
        </ul>
        </div>
        <button id="search_button" class="search_button" name="search_button" style="background-color:#332d2d;color:#dee2e6;" onclick="search()">Search</button>
        <button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#menubar_collapse">
        <span class="material-symbols-outlined menuicon" id="menuicon" name="menuicon">menu</span>
        </button>
    </div>
</div>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner" style="background-color:#332d2d;">
  <a href="../book_page/book_page.php?linker=1">
    <div class="carousel-item active mb-4">
      <img src="../bookmark_images/slideshow_1.jpg" alt="Los Angeles" class="d-block" style="width:100%; height:600px;">
    </div>
  </a>
  <a href="../book_page/book_page.php?linker=3">
    <div class="carousel-item mb-4">
      <img src="../bookmark_images/slideeshow_2.jpg" alt="Chicago" class="d-block" style="width:100%; height:600px;">
    </div>
  </a>
  <a href="../book_page/book_page.php?linker=">
    <div class="carousel-item mb-4">
      <img src="../bookmark_images/slideshow_4.webp" alt="New York" class="d-block" style="width:100%; height:600px;">
    </div>
  </a>
  <a href="../book_page/book_page.php?linker=">
    <div class="carousel-item mb-4">
      <img src="../bookmark_images/slideeshow_3.jpg" alt="New York" class="d-block" style="width:100%; height:600px;">
    </div>
  </a>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- User Section-->
<div class="container fluid mt-2" style="margin-left:-20px;">
<a href="#" id="user_href" style="text-decoration:none;" onclick="href_check()">
<img src="<?php $user_obj->show_user_photo();?>" id="user_photo_check" style="border-radius:50%; height:50px; width:50px; margin-left:30px;" class="inline_block">
<span style="color:#332d2d; font-size:20px; margin-top:7px;"><strong><i id="user_id_check"><?php $user_obj->show_user_name();?></i></strong></span>
</a>
</div>


<!-- to move top novels section-->
<button type="button" class="btn" style="background-color:transparent; position:absolute; top:970px; width:60px; height:60px; border-radius:50%;z-index:1;" onclick="book_div_left()">
    <span class="carousel-control-prev-icon" style="color:#adb5bd;"></span>
  </button>
  <button type="button" class="btn" style="background-color:transparent; position:absolute; top:970px;right:0.5vw; width:60px; height:60px; border-radius:50%; z-index:1; " onclick="book_div_right()">
    <span class="carousel-control-next-icon"></span>
  </button>

<h2 style="color:#dee2e6; font-style:italic; position:relative; margin-top:12px;background-color:#332d2d;margin-bottom:-20px;padding-top:10px;"><center>Read Online</center><span style="position:absolute; top:25px; right:2vw; font-size:large;"><a href="../all_books/all_books.php" style="color:#dee2e6">See more..</a></span></h2>
<!-- main body-->
<div class="mt-2 signer" id="signer" name="signer" style="background-color:#332d2d; max-height: 600px;  width: auto; overflow:auto;" >

<div style="position:relative; left:3vw; width:94%; height:100%; overflow-y:none; overflow:hidden;" >
<div id="books_div">

<?php $book_obj->get_book_for_home_page_read_online();?>
</div>

</div>

</div>

<!-- to move top novels section-->
<button type="button" class="btn" style="background-color:transparent; position:absolute; top:1720px; width:60px; height:60px; border-radius:50%;z-index:1;" onclick="book_div2_left()">
    <span class="carousel-control-prev-icon" style="color:#adb5bd;"></span>
  </button>
  <button type="button" class="btn" style="background-color:transparent; position:absolute; top:1720px;right:0.5vw; width:60px; height:60px; border-radius:50%; z-index:1; " onclick="book_div2_right()">
    <span class="carousel-control-next-icon"></span>
  </button>
<h2 style="color:#dee2e6; font-style:italic; position:relative; margin-top:12px;background-color:#332d2d;margin-bottom:-50px;margin-top:100px;padding-top:10px;"><center>Top Novels</center><span style="position:absolute; top:25px; right:2vw; font-size:large;"><a href="../top_novels/top_novels.php" style="color:#dee2e6">See more..</a></span></h2>
<div class="mt-5 signer" id="signer" name="signer" style="background-color:#332d2d; max-height: 600px;  width: auto; overflow:auto;" >
<div style="position:relative; left:3vw; width:94%; height:100%; overflow-y:none; overflow:hidden;" >
<div id="books2_div">

<?php $book_obj->get_book_for_home_page_top_novels();?>
</div>

</div>
</div>

<h2 style="color:#dee2e6; font-style:italic; position:relative; margin-top:12px;background-color:#332d2d;margin-bottom:-50px;margin-top:100px;padding-top:10px;"><center>Our Features</center></h2>
<div class="mt-5 signer_1" id="signer_1" name="signer" style="background-color:#332d2d;overflow:hidden;">
<div class="mt-5">
    <div class="mb-5" style="background-image:url('../bookmark_images/image-from-rawpixel-id-13924885-jpeg.jpg'); background-size:cover;height:714px; margin-left:45px; border-radius:12px; width:26%; min-width:400px;">

    </div>
    <div class="ml-5 mb-5 displayer" id="displayer">
      <div style="min-height:60px; width:100%; background-color:white; position:relative; border:1px solid white; top:75px; border-radius:10px">
      
      <div style="display:inline-block;">
      <h4 style="margin-bottom:-7px;"><i class="fa-solid fa-book" style="padding:8px; font-size:20px;margin:3px 3px 3px 10px; background-color: #332d2d; color:#dee2e6; border-radius:5px;"></i><i>Adding Books.</i></h4>
      <p style="margin-left:47px;"><i>We provide the option of adding your own collection of books. Share your books and enjoy.</i></p>

      </div>
      </div>
      <div style="min-height:80px; width:100%; background-color:white; position:relative; border:1px solid white; top:155px; border-radius:10px">
      <div style="display:inline-block;">
      <h4 style="margin-bottom:-7px;"><i class="fa-solid fa-download" style="padding:8px; font-size:20px;margin:3px 3px 3px 10px; background-color: #332d2d; color:#dee2e6; border-radius:5px;"></i><i>Download Books.</i></h4>
      <p style="margin-left:49px;"><i>Bookmark provides its customers easy and hassle free download of books on a single click.</i></p>
      </div></div>
      <div style="min-height:80px; width:100%; background-color:white; position:relative; border:1px solid white; top:235px; border-radius:10px">
      <div style="display:inline-block;">
      <h4 style="margin-bottom:-7px;"><i class="fa-solid fa-book-open-reader" style="padding:8px; font-size:20px;margin:3px 3px 3px 10px; background-color: #332d2d; color:#dee2e6; border-radius:5px;"></i><i>Best author selection.</i></h4>
      <p style="margin-left:49px;"><i>Bookmark has books from all variety of genres written by a great varity of well known authors.</i></p>
      </div></div>
      <div style="min-height:80px; width:100%; background-color:white; position:relative; border:1px solid white; top:315px; border-radius:10px">
      <div style="display:inline-block;">
      <h4 style="margin-bottom:-7px;"><i class="fa-solid fa-hand-holding-dollar" style="padding:8px; font-size:20px;margin:3px 3px 3px 10px; background-color: #332d2d; color:#dee2e6; border-radius:5px;"></i><i>Market value.</i></h4>
      <p style="margin-left:51px;"><i>At bookmark, you can also find the relevent online market prices and ratings of a book, making your decisions easier.</i></p>
      </div></div>

    </div>
</div>
</div>


<h2 style="color:#dee2e6; font-style:italic; position:relative; margin-top:12px;background-color:#332d2d;margin-bottom:-50px;margin-top:100px;padding-top:10px;"><center>Well Known Authors</center><span style="position:absolute; top:25px; right:2vw; font-size:large;"><a href="../author_page/author_page.php" style="color:#dee2e6">See more..</a></span></h2>
<div class="mt-5 signer" id="signer" name="signer" style="background-color:#332d2d; max-height: 600px;  width: auto; overflow:auto;" >
<center>
<div style="position:relative; width:94%; max-height:560px; overflow-y:none; overflow:hidden;" >
<div id="books2_div">

<?php $author_obj->get_book_for_home_page_authors();?>
</div>

</div>
</center>
</div>





<!-- signin/signup button-->
<div style="width:20%; color:#adb5bd; margin-top:90px;">
</div>

<!-- footer-->
<div class="container-fluid mt-5" style="width: 100%; margin-left:-20px;">
<div id="footer" class="footer" name="footer">
    <span class="material-symbols-outlined footer_bookmark_icon" name="footer_bookmark_icon">collections_bookmark</span><h1 class="footer_title" style="margin-top:18px;">BookMark.com</h1>
    <ul id="footer_icons"  class="footor_icons" name="footer_icons">
        <li class="footer_icons_item"><a href="https://www.instagram.com/har_sh.nigam_?igsh=cWdlc201cTZrcXhk" class="footer_icons_anchor"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
        <li class="footer_icons_item"><a href="https://www.facebook.com/harsh.nigam.9275?mibextid=ZbWKwL" class="footer_icons_anchor"><i class="fa-brands fa-facebook"></i></a></li>
        <li class="footer_icons_item"><a href="https://www.linkedin.com/in/harsh-nigam-52966428a/" class="footer_icons_anchor"><i class="fa-brands fa-linkedin"></i></a></li>
        <li class="footer_icons_item"><a href="http://Discordapp.com/users/764710275722248232" class="footer_icons_anchor"><i class="fa-brands fa-discord"></i></a></li>
        <li class="footer_icons_item"><a href="https://twitter.com/harshnigam207" class="footer_icons_anchor"><i class="fa-brands fa-twitter"></i></a></li>
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
</div>

</body>
</html>