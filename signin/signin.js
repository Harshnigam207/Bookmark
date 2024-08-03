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
    if (a > 628) {
        document.getElementById("signer").style.backgroundImage = "url(../bookmark_images/image-from-rawpixel-id-12178780-jpeg.jpg)"
    }
    if (a <= 628) {
        document.getElementById("signer").style.backgroundImage = "url(../bookmark_images/image-from-rawpixel-id-13720996-jpeg.jpg)"
    }

}


let condition_checker = 0;

/* all validation check*/



function user_check() {
    let user_value = document.getElementById("user_name").value;
    if (user_value == "") {
        document.getElementById("user_error").innerHTML = "<strong>Warning!</strong> Please enter a username.";
        document.getElementById("user_error").style.display = "block";
        document.getElementById("user_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("user_error").innerHTML = "";
        document.getElementById("user_error").style.display = "none";
        document.getElementById("user_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}


function pass_check(value) {
    first_pass = value;
    if (value.length < 8) {
        document.getElementById("pass_error").innerHTML = "<strong>Warning!</strong> password should contain a combination of at least 8 characters.";
        document.getElementById("pass_error").style.display = "block"
        document.getElementById("pass_correct").style.display = "none"
        condition_checker = -1;
    }
    if (value.length >= 8) {
        document.getElementById("pass_error").innerHTML = "";
        document.getElementById("pass_error").style.display = "none"
        document.getElementById("pass_correct").style.display = "inline-block"
        condition_checker = 1;
    }

}



function check() {
    console.log(condition_checker);
}




function submit_check(event) {
    if (condition_checker == 1) {
        document.getElementById("user_form").submit();
        document.getElementById("final_note").style.display = "block"
    } else {
        alert("Please fill out all the required fields")
        event.preventDefault();
    }
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