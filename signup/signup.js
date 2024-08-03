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
function first_check() {
    let first_value = document.getElementById("first_name").value;
    if (first_value == "") {
        document.getElementById("first_error").style.display = "block";
        document.getElementById("first_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("first_error").style.display = "none";
        document.getElementById("first_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function last_check() {
    let last_value = document.getElementById("last_name").value;
    if (last_value == "") {
        document.getElementById("last_error").style.display = "block";
        document.getElementById("last_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("last_error").style.display = "none";
        document.getElementById("last_correct").style.display = "inline-block";
        condition_checker = 1;
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

function email_check() {
    let email_value = document.getElementById("email").value;
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email_value == "") {
        document.getElementById("email_error").innerHTML = "<strong>Warning!</strong> Please enter a Email.";
        document.getElementById("email_error").style.display = "block";
        document.getElementById("email_correct").style.display = "none";
        condition_checker = -1;
    }
    if (email_value.match(validRegex)) {
        document.getElementById("email_error").innerHTML = "";
        document.getElementById("email_error").style.display = "none";
        document.getElementById("email_correct").style.display = "inline-block";
        condition_checker = 1;
    } else {
        document.getElementById("email_error").innerHTML = "<strong>Warning!</strong> Invalid Email.";
        document.getElementById("email_error").style.display = "block";
        document.getElementById("email_correct").style.display = "none";
        condition_checker = -1;
    }
}

function photo_check() {
    let photo_value = document.getElementById("user_photo");
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
let first_pass;
let second_pass;
let pass_checker = 0;
let pass_equal_checker = -1;

function pass_check(value) {
    first_pass = value;
    if (value.length < 8) {
        document.getElementById("pass_error").innerHTML = "<strong>Warning!</strong> password should contain a combination of at least 8 characters.";
        document.getElementById("pass_error").style.display = "block"
        document.getElementById("pass_correct").style.display = "none"
        pass_equal_checker = -1;
    }
    if (value.length >= 8) {
        document.getElementById("pass_error").innerHTML = "";
        document.getElementById("pass_error").style.display = "none"
        document.getElementById("pass_correct").style.display = "inline-block"
    }

}

function re_pass_check(value) {
    second_pass = value;
    if (value.length < 8) {
        document.getElementById("re_pass_error").innerHTML = "<strong>Warning!</strong> password should contain a combination of at least 8 characters.";
        document.getElementById("re_pass_error").style.display = "block"
        document.getElementById("re_pass_correct").style.display = "none"
        pass_equal_checker = -1;
    }
    if (value.length >= 8) {
        if (second_pass == first_pass) {
            document.getElementById("re_pass_error").innerHTML = "";
            document.getElementById("re_pass_error").style.display = "none"
            document.getElementById("re_pass_correct").style.display = "inline-block"
            pass_equal_checker = 1;
        } else {
            document.getElementById("re_pass_error").innerHTML = "<strong>Warning!</strong> Re-entered password does not match the main password.";
            document.getElementById("re_pass_error").style.display = "block"
            document.getElementById("re_pass_correct").style.display = "none"
            pass_equal_checker = -1;
        }
    }


}

function phone_check() {
    let phone_value = document.getElementById("phone").value;
    if (phone_value == "") {
        document.getElementById("phone_error").style.display = "none";
    }
    if (phone_value.length == 10) {
        document.getElementById("phone_correct").style.display = "inline-block";
    } else {
        document.getElementById("phone_correct").style.display = "none";
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
    if (condition_checker == 1 && dob_checker == 1 && pass_equal_checker == 1) {
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