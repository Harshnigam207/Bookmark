<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark.com</title>
    <link rel="icon" type="image/x-icon" href="../bookmark_images/Screenshot 2024-02-12 032316.png" id="icon">
    <link rel="stylesheet" href="structure.css"></link>
    <script src="structure.js"></script>
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
<body class="body" id="body" name="body" onclick="overall()">
   
    
<div class="main_container" id="main_container" name="main_container" >
    <div class="titlebar" id="titlebar" name="titlebar">
    
    <a href="home.php"> <h2 class="title" id="title" name="title" style="position:absolute; left:4%; margin-top:21px;"><span class="material-symbols-outlined bookmark_icon" id="bookmark_icon" name="bookmark_icon">collections_bookmark</span>BookMark.com</h2></a>
    <ul class="menubar" id="menubar" name="menubar">
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Author</a></li>
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item" name="menubar_item"><a href="#" class="menubar_anchor">SignIn</a></li>
    <li class="menubar_item menubar_anchor" name="menubar_item" onclick="genres_dropdown(event)">Genres</li>
    </ul>
    <ul class="menubar_collapse collapse" id="menubar_collapse" name="menubar_collapse">
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Read Online</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Author</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">Top Novels</a></li>
    <li class="menubar_item_collapse" name="menubar_item_collapse"><a href="#" class="menubar_anchor">SignIn</a></li>
    <li class="menubar_item_collapse menubar_anchor" name="menubar_item_collapse" onclick="genres_dropdown(event)">Genres</li>
    </ul>
    <div id="genres_dropdown" name="genres_dropdown" class="genres_dropdown_responsive">
    <ul class="genres_menubar" id="genres_menubar" name="genres_menubar" style="margin-top:12px;">
        <li class="genres_item"><a href="#"  class="genres_anchor">Romance</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Billionare Romance</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Erotic</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Young Adult</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Crime</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Fantasy</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Vampires</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Autobiography</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Science Fiction</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Thriller</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Horror</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Classics</a></li>
        <li class="genres_item"><a href="#"class="genres_anchor">Suspence</a></li>
    </ul>
    </div>
    <div id="maintainer" class="maintainer" name="maintainer">
        <input type="text" placeholder="Search books" id="searchbar" class="searchbar" name="searchbar" style="position:absolute; left: -7%;" onfocus="searchbar_coloradd()" onblur="searchbar_colorremove()">
        <div id="search_button" class="search_button" name="search_button">Search</div>
        <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#menubar_collapse">
        <span class="material-symbols-outlined menuicon" id="menuicon" name="menuicon">menu</span>
        </button>
    </div>
</div>
<!--Main body section -->
    <div id="main_body" name="main_body" class="main_body" onclick="remover()">
    <ul id="sign_button" class="sign_button" name="sign_button">
    <li class="sign_button_item"><button type="button" class="btn">Dark</button></li>
    <li class="sign_button_item"><button type="button" class="btn">Dark</button></li>
    </ul>

    </div>


    <!-- Footer section-->
    <div id="footer" class="footer" name="footer">
    <span class="material-symbols-outlined footer_bookmark_icon" name="footer_bookmark_icon">collections_bookmark</span><h1 class="footer_title" style="margin-top:18px;">BookMark.com</h1>
    <ul id="footer_icons"  class="footor_icons" name="footer_icons">
        <li class="footer_icons_item"><a href="instagram.php" class="footer_icons_anchor"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li class="footer_icons_item"><a href="facebook.php" class="footer_icons_anchor"><i class="fa fa-facebook"></i></a></li>
        <li class="footer_icons_item"><a href="linkedin.php" class="footer_icons_anchor"><i class="fa fa-linkedin"></i></a></li>
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