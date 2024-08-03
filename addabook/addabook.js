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

let review_star = -1;


function first_star() {
    document.getElementById("rating_correct").style.display = "inline-block";
    const star1_classlist = document.getElementById("star1").classList;
    const star2_classlist = document.getElementById("star2").classList;
    const star3_classlist = document.getElementById("star3").classList;
    const star4_classlist = document.getElementById("star4").classList;
    const star5_classlist = document.getElementById("star5").classList;


    review_star = 1;
    document.getElementById("book_review").value = review_star + "/5";
    star1_classlist.add("fa-solid");
    star1_classlist.remove("fa-regular")

    star2_classlist.add("fa-regular")
    star2_classlist.remove("fa-solid");

    star3_classlist.add("fa-regular");
    star3_classlist.remove("fa-solid");

    star4_classlist.add("fa-regular");
    star4_classlist.remove("fa-solid");

    star5_classlist.add("fa-regular")
    star5_classlist.remove("fa-solid");
    document.getElementById("rating_error").style.display = "none";
    document.getElementById("rating_correct").style.display = "inline-block";

}

function second_star() {
    document.getElementById("rating_correct").style.display = "inline-block";
    const star1_classlist = document.getElementById("star1").classList;
    const star2_classlist = document.getElementById("star2").classList;
    const star3_classlist = document.getElementById("star3").classList;
    const star4_classlist = document.getElementById("star4").classList;
    const star5_classlist = document.getElementById("star5").classList;


    review_star = 2;
    document.getElementById("book_review").value = review_star + "/5";
    star1_classlist.add("fa-solid");
    star1_classlist.remove("fa-regular")

    star2_classlist.add("fa-solid")
    star2_classlist.remove("fa-regular");

    star3_classlist.add("fa-regular");
    star3_classlist.remove("fa-solid");

    star4_classlist.add("fa-regular");
    star4_classlist.remove("fa-solid");

    star5_classlist.add("fa-regular")
    star5_classlist.remove("fa-solid");
    document.getElementById("rating_error").style.display = "none";
    document.getElementById("rating_correct").style.display = "inline-block";

}

function third_star() {
    document.getElementById("rating_correct").style.display = "inline-block";
    const star1_classlist = document.getElementById("star1").classList;
    const star2_classlist = document.getElementById("star2").classList;
    const star3_classlist = document.getElementById("star3").classList;
    const star4_classlist = document.getElementById("star4").classList;
    const star5_classlist = document.getElementById("star5").classList;


    review_star = 3;
    document.getElementById("book_review").value = review_star + "/5";
    star1_classlist.add("fa-solid");
    star1_classlist.remove("fa-regular")

    star2_classlist.add("fa-solid")
    star2_classlist.remove("fa-regular");

    star3_classlist.add("fa-solid");
    star3_classlist.remove("fa-regular");

    star4_classlist.add("fa-regular");
    star4_classlist.remove("fa-solid");

    star5_classlist.add("fa-regular")
    star5_classlist.remove("fa-solid");
    document.getElementById("rating_error").style.display = "none";
    document.getElementById("rating_correct").style.display = "inline-block";

}

function fourth_star() {
    document.getElementById("rating_correct").style.display = "inline-block";
    const star1_classlist = document.getElementById("star1").classList;
    const star2_classlist = document.getElementById("star2").classList;
    const star3_classlist = document.getElementById("star3").classList;
    const star4_classlist = document.getElementById("star4").classList;
    const star5_classlist = document.getElementById("star5").classList;


    review_star = 4;
    document.getElementById("book_review").value = review_star + "/5";
    star1_classlist.add("fa-solid");
    star1_classlist.remove("fa-regular")

    star2_classlist.add("fa-solid")
    star2_classlist.remove("fa-regular");

    star3_classlist.add("fa-solid");
    star3_classlist.remove("fa-regular");

    star4_classlist.add("fa-solid");
    star4_classlist.remove("fa-regular");

    star5_classlist.add("fa-regular")
    star5_classlist.remove("fa-solid");
    document.getElementById("rating_error").style.display = "none";
    document.getElementById("rating_correct").style.display = "inline-block";

}

function fifth_star() {
    document.getElementById("rating_correct").style.display = "inline-block";
    const star1_classlist = document.getElementById("star1").classList;
    const star2_classlist = document.getElementById("star2").classList;
    const star3_classlist = document.getElementById("star3").classList;
    const star4_classlist = document.getElementById("star4").classList;
    const star5_classlist = document.getElementById("star5").classList;
    review_star = 5;
    document.getElementById("book_review").value = review_star + "/5";



    star1_classlist.add("fa-solid");
    star1_classlist.remove("fa-regular")

    star2_classlist.add("fa-solid")
    star2_classlist.remove("fa-regular");

    star3_classlist.add("fa-solid");
    star3_classlist.remove("fa-regular");

    star4_classlist.add("fa-solid");
    star4_classlist.remove("fa-regular");

    star5_classlist.add("fa-solid")
    star5_classlist.remove("fa-regular");
    document.getElementById("rating_error").style.display = "none";
    document.getElementById("rating_correct").style.display = "inline-block";

}

let condition_checker = 0;
let star_to_submit_checker = 0;


function language_check() {
    const languages_list = [
        "Afrikaans",
        "Albanian",
        "Amharic",
        "Arabic",
        "Aragonese",
        "Armenian",
        "Asturian",
        "Azerbaijani",
        "Basque",
        "Belarusian",
        "Bengali",
        "Bosnian",
        "Breton",
        "Bulgarian",
        "Catalan",
        "Central Kurdish",
        "Chinese",
        "Chinese (Hong Kong)",
        "Chinese (Simplified)",
        "Chinese (Traditional)",
        "Corsican",
        "Croatian",
        "Czech",
        "Danish",
        "Dutch",
        "English",
        "English (Australia)",
        "English (Canada)",
        "English (India)",
        "English (New Zealand)",
        "English (South Africa)",
        "English (United Kingdom)",
        "English (United States)",
        "Esperanto",
        "Estonian",
        "Faroese",
        "Filipino",
        "Finnish",
        "French",
        "French (Canada)",
        "French (France)",
        "French (Switzerland)",
        "Galician",
        "Georgian",
        "German",
        "German (Austria)",
        "German (Germany)",
        "German (Liechtenstein)",
        "German (Switzerland)",
        "Greek",
        "Guarani",
        "Gujarati",
        "Hausa",
        "Hawaiian",
        "Hebrew",
        "Hindi",
        "Hungarian",
        "Icelandic",
        "Indonesian",
        "Interlingua",
        "Irish",
        "Italian",
        "Italian (Italy)",
        "Italian (Switzerland)",
        "Japanese",
        "Kannada",
        "Kazakh",
        "Khmer",
        "Korean",
        "Kurdish",
        "Kyrgyz",
        "Lao",
        "Latin",
        "Latvian",
        "Lingala",
        "Lithuanian",
        "Macedonian",
        "Malay",
        "Malayalam",
        "Maltese",
        "Marathi",
        "Mongolian",
        "Nepali",
        "Norwegian",
        "Norwegian Bokmål",
        "Norwegian Nynorsk",
        "Occitan",
        "Oriya",
        "Oromo",
        "Pashto",
        "Persian",
        "Polish",
        "Portuguese",
        "Portuguese (Brazil)",
        "Portuguese (Portugal)",
        "Punjabi",
        "Quechua",
        "Romanian",
        "Romanian (Moldova)",
        "Romansh",
        "Russian",
        "Scottish Gaelic",
        "Serbian",
        "Serbo",
        "Shona",
        "Sindhi",
        "Sinhala",
        "Slovak",
        "Slovenian",
        "Somali",
        "Southern Sotho",
        "Spanish",
        "Spanish (Argentina)",
        "Spanish (Latin America)",
        "Spanish (Mexico)",
        "Spanish (Spain)",
        "Spanish (United States)",
        "Sundanese",
        "Swahili",
        "Swedish",
        "Tajik",
        "Tamil",
        "Tatar",
        "Telugu",
        "Thai",
        "Tigrinya",
        "Tongan",
        "Turkish",
        "Turkmen",
        "Twi",
        "Ukrainian",
        "Urdu",
        "Uyghur",
        "Uzbek",
        "Vietnamese",
        "Walloon",
        "Welsh",
        "Western Frisian",
        "Xhosa",
        "Yiddish",
        "Yoruba",
        "Zulu"
    ];
    let language_value = document.getElementById("book_language").value;
    language_value = language_value.toString();
    language_value = language_value.toUpperCase();
    for (let x of languages_list) {
        x = x.toUpperCase();
        if (language_value == x) {
            document.getElementById("language_error").style.display = "none";
            document.getElementById("language_correct").style.display = "inline-block";
            condition_checker = 1;
            break;
        } else {
            document.getElementById("language_error").style.display = "block";
            document.getElementById("language_correct").style.display = "none";
            condition_checker = -1;
        }
    }
}

function pages_check() {
    let pages_value = document.getElementById("book_pages").value;
    if (pages_value == "") {
        document.getElementById("pages_error").style.display = "block";
        document.getElementById("pages_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("pages_error").style.display = "none";
        document.getElementById("pages_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function discription_check() {
    let discription_value = document.getElementById("book_discription").value;
    if (discription_value == "") {
        document.getElementById("discription_error").style.display = "block";
        document.getElementById("discription_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("discription_error").style.display = "none";
        document.getElementById("discription_correct").style.display = "inline-block";
        document.getElementById("book_dicription").value = '"' + discription_value + '"';
        condition_checker = 1;
    }
}

let image_and_file_checker = 0;

function image_check() {
    let image_value = document.getElementById("book_image");
    if (image_value.value.length < 1) {
        document.getElementById("image_error").style.display = "block";
        document.getElementById("image_correct").style.display = "none";
        image_and_file_checker--;
        condition_checker = -1;
    } else {
        document.getElementById("image_error").style.display = "none";
        document.getElementById("image_correct").style.display = "inline-block";
        image_and_file_checker++;
        condition_checker = 1;
    }


    if (image_and_file_checker == 2) {
        document.getElementById("image_and_file_correct").style.display = "inline-block";
    } else {
        document.getElementById("image_and_file_correct").style.display = "none";
    }
}

function file_check() {
    let file_value = document.getElementById("book_file");
    if (file_value.value.length < 1) {
        document.getElementById("file_error").style.display = "block"
        document.getElementById("file_correct").style.display = "none";
        image_and_file_checker--;
        condition_checker = -1;
    } else {
        document.getElementById("file_error").style.display = "none"
        document.getElementById("file_correct").style.display = "inline-block";
        image_and_file_checker++;
        condition_checker = 1;
    }


    if (image_and_file_checker == 2) {
        document.getElementById("image_and_file_correct").style.display = "inline-block";
    } else {
        document.getElementById("image_and_file_correct").style.display = "none";
    }
}

function price_check() {
    let price_value = document.getElementById("book_price").value;
    if (price_value == "") {
        document.getElementById("price_error").style.display = "block";
        document.getElementById("price_correct").style.display = "none";
        condition_checker = -1;
    } else {
        let numbers = /^[0-9]+$/;
        if (price_value.match(numbers)) {
            document.getElementById("price_error").style.display = "none";
            document.getElementById("price_correct").style.display = "inline-block";
            price_value = price_value + ".00 " + '₹INR';
            document.getElementById("book_price").value = price_value;
            condition_checker = 1;

        } else {
            document.getElementById("price_error").style.display = "block";
            document.getElementById("price_correct").style.display = "none";
            condition_checker = -1;
            document.getElementById("price_error").innerHTML = "<strong>Warning!</strong> The given value is not a number";
        }

    }
}

function name_check() {
    let name_value = document.getElementById("book_name").value;
    if (name_value == "") {
        document.getElementById("name_error").style.display = "block";
        document.getElementById("name_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("name_error").style.display = "none";
        document.getElementById("name_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function author_check() {
    let author_value = document.getElementById("book_author").value;
    if (author_value == "") {
        document.getElementById("author_error").style.display = "block";
        document.getElementById("author_correct").style.display = "none";
        condition_checker = -1;
    } else {
        document.getElementById("author_error").style.display = "none";
        document.getElementById("author_correct").style.display = "inline-block";
        condition_checker = 1;
    }
}

function check() {
    console.log(condition_checker);
}

let genres_checker = -1;
let genres_name = 0;

function genres_r() {
    genres_name = document.getElementById("genres_r").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_br() {
    genres_name = document.getElementById("genres_br").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_e() {
    genres_name = document.getElementById("genres_e").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_ya() {
    genres_name = document.getElementById("genres_ya").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_cr() {
    genres_name = document.getElementById("genres_cr").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_f() {
    genres_name = document.getElementById("genres_f").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_v() {
    genres_name = document.getElementById("genres_v").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_a() {
    genres_name = document.getElementById("genres_a").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_sf() {
    genres_name = document.getElementById("genres_sf").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_t() {
    genres_name = document.getElementById("genres_t").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_h() {
    genres_name = document.getElementById("genres_h").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_cl() {
    genres_name = document.getElementById("genres_cl").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_my() {
    genres_name = document.getElementById("genres_my").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}

function genres_s() {
    genres_name = document.getElementById("genres_s").innerHTML;
    genres_checker = 1;
    document.getElementById("category_error").style.display = "none";
    document.getElementById("category_correct").style.display = "inline-block";
    document.getElementById("book_category").value = genres_name;
}



function submit_check(event) {
    if (genres_checker != 1) {
        document.getElementById("category_error").style.display = "block";
    }
    if (review_star < 1) {
        document.getElementById("rating_error").style.display = "block";
    }
    if (condition_checker == 1 && review_star >= 1 && genres_checker == 1) {
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