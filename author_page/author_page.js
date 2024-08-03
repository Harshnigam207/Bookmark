function searchbar_coloradd() {
    const searchbar_color = document.getElementById("searchbar").classList;
    searchbar_color.add("searchbar_colorremoved");
    searchbar_color.remove("searchbar");
}


function searchbar_colorremove() {
    const searchbar_color = document.getElementById("searchbar").classList;
    searchbar_color.remove("searchbar_colorremoved");
    searchbar_color.add("searchbar");

}

/*------------------------------------------------------Responsive----------------------------------------------------------------*/
window.addEventListener('resize', outerWidth1);
window.addEventListener('load', outerWidth1);
let dropdown_clicker = 0;


function outerWidth1() {
    let a = window.outerWidth;
    console.log(a);
    dropdown_clicker = 2;
    if (a > 1220) {

        document.getElementById("menuicon").style.display = "none";
        document.getElementById("menubar").style.display = "block";
        const menubar_classes = document.getElementById("menubar").classList;
        const collapser = document.getElementById("menubar_collapse").classList;
        collapser.add("menubar_collapse_responsive");

    }
    if (a <= 1220) {
        document.getElementById("menuicon").style.display = "block";
        document.getElementById("menubar").style.display = "none";
        const collapser = document.getElementById("menubar_collapse").classList;
        collapser.remove("menubar_collapse_responsive");

    }
    /*
    if (a > 628) {
        document.getElementById("signer").style.backgroundImage = "url(../bookmark_images/image-from-rawpixel-id-12178780-jpeg.jpg)"
    }
    if (a <= 628) {
        document.getElementById("signer").style.backgroundImage = "url(../bookmark_images/image-from-rawpixel-id-13720996-jpeg.jpg)"
    }
    */

    if (a < 900) {
        document.getElementById("table_element").rowSpan = "1";
    } else {
        document.getElementById("table_element").rowSpan = "6";
    }

}

function zoomer_in(t) {
    t.style.transition = "0.2s height linear, 0.2s width linear, 0.2s transform linear";
    t.style.width = "224px";
    t.style.height = "346px";
    t.style.transform = "translate(-7.5px,-8px)";
}

function zoomer_out(t) {
    t.style.transition = "0.2s height linear, 0.2s width linear, 0.2s transform linear";
    t.style.width = "209px";
    t.style.height = "330px";
    t.style.transform = "translate(0,0)";
}


function user_check_book(event) {
    let user_id = document.getElementById("user_id_check").innerHTML;
    let user_photo = document.getElementById("user_photo_check").src;
    if (user_id == "SignIn" || user_photo == "../bookmark_images/img_avatar1.png") {
        alert("please SignIn or SignUp before adding a book");
        event.preventDefault();
    }
}

function user_check_author(event) {
    let user_id = document.getElementById("user_id_check").innerHTML;
    let user_photo = document.getElementById("user_photo_check").src;
    if (user_id == "SignIn" || user_photo == "../bookmark_images/img_avatar1.png") {
        alert("please SignIn or SignUp before adding an Author");
        event.preventDefault();
    }
}

function href_check() {
    let user_id = document.getElementById("user_id_check").innerHTML;
    let user_photo = document.getElementById("user_photo_check").src;
    if (user_id == "SignIn" || user_photo == "../bookmark_images/img_avatar1.png") {
        document.getElementById("user_href").href = "../signin/signin.php";
    } else {
        document.getElementById("user_href").href = "../user_profile/user_profile.php?linker=" + user_id;
    }
}