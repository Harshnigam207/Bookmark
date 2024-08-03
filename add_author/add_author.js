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
function name_check() {
    let first_value = document.getElementById("author_name").value;
    if (first_value == "") {
        document.getElementById("name_error").style.display = "block";
        document.getElementById("name_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("name_error").style.display = "none";
        document.getElementById("name_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function author_discription_check() {
    let discription_value = document.getElementById("author_discription").value;
    if (discription_value == "") {
        document.getElementById("discription_error").style.display = "block";
        document.getElementById("discription_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("discription_error").style.display = "none";
        document.getElementById("discription_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function website_check() {
    let last_value = document.getElementById("website").value;
    if (last_value == "") {
        document.getElementById("website_correct").style.display = "none";
    } else {
        document.getElementById("website_correct").style.display = "inline-block";
    }
}
let dob_checker = -1;

function dob_check() {
    let dob_value = document.getElementById("dob").value;
    if (dob_value != "") {
        document.getElementById("dob_error").style.display = "none";
        document.getElementById("dob_correct").style.display = "inline-block";

        dob_checker = 1;
        console.log(dob_checker);
    }
}

function from_check() {
    let from_value = document.getElementById("from").value;
    if (from_value == "") {
        document.getElementById("from_error").innerHTML = "<strong>Warning!</strong> Please enter , where the author is from.";
        document.getElementById("from_error").style.display = "block";
        document.getElementById("from_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("from_error").innerHTML = "";
        document.getElementById("from_error").style.display = "none";
        document.getElementById("from_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}


function photo_check() {
    let photo_value = document.getElementById("author_photo");
    if (photo_value.value.length < 1) {
        document.getElementById("photo_error").style.display = "block"
        document.getElementById("photo_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("photo_error").style.display = "none"
        document.getElementById("photo_correct").style.display = "inline-block";
        console.log(photo_value.value);
        condition_checker = 1;
    }

}



function check() {
    console.log(condition_checker);
}




function submit_check(event) {
    if (dob_checker == -1) {
        document.getElementById("dob_error").style.display = "block";
        document.getElementById("dob_correct").style.display = "none";
        event.preventDefault();
    }
    if (condition_checker == 1 && dob_checker == 1) {
        if (confirm("Are you sure you want to submit the form?") == true) {
            document.getElementById("user_form").submit();
            document.getElementById("final_note").style.display = "block"

        } else {
            event.preventDefault();
        }
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