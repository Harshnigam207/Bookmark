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
let genres_dropdown_counter = 0;

function genres_dropdown(event) {
    event.stopPropagation();
    genres_dropdown_counter++;
    if (genres_dropdown_counter == 3) {
        genres_dropdown_counter = 1;
    }
    if (genres_dropdown_counter == 1) {
        document.getElementById("genres_dropdown").style.display = "block";
    }
    if (genres_dropdown_counter == 2) {
        document.getElementById("genres_dropdown").style.display = "none";
    }
}

function overall() {
    genres_dropdown_counter = 2;
    document.getElementById("genres_dropdown").style.display = "none";
}


function remover() {
    document.getElementById("genres_dropdown").style.display = "none";
    genres_dropdown_counter = 2;
}
/*------------------------------------------------------Responsive----------------------------------------------------------------*/
window.addEventListener('resize', outerWidth1);
window.addEventListener('load', outerWidth1);
let dropdown_clicker = 0;


function outerWidth1() {
    let a = window.outerWidth;
    console.log(a);
    document.getElementById("genres_dropdown").style.display = "none";
    genres_dropdown_counter = 2
    dropdown_clicker = 2;
    if (a > 1100) {

        document.getElementById("menuicon").style.display = "none";
        document.getElementById("menubar").style.display = "block";
        const menubar_classes = document.getElementById("menubar").classList;
        const genres_classes = document.getElementById("genres_dropdown").classList;
        genres_classes.add("genres_dropdown");
        genres_classes.remove("genres_dropdown_responsive");
        const collapser = document.getElementById("menubar_collapse").classList;
        collapser.add("menubar_collapse_responsive");

    }
    if (a <= 1100) {
        const genres_classes = document.getElementById("genres_dropdown").classList;
        document.getElementById("menuicon").style.display = "block";
        document.getElementById("menubar").style.display = "none";
        genres_classes.remove("genres_dropdown");
        genres_classes.add("genres_dropdown_responsive");
        const collapser = document.getElementById("menubar_collapse").classList;
        collapser.remove("menubar_collapse_responsive");

    }

}

/*

function dropdown() {
    dropdown_clicker++;
    const menubar_classes = document.getElementById("menubar").classList;
    const menubar_item_classes = document.querySelectorAll(".menubar_item");
    const menubar_item_classes1 = document.querySelectorAll(".menubar_item_responsive");
    if (dropdown_clicker == 3) {
        dropdown_clicker = 1;
    }
    if (dropdown_clicker == 1) {

        for (let i = 0; i < menubar_item_classes.length; i++) {
            menubar_item_classes[i].classList.add("menubar_item_responsive");
            menubar_item_classes[i].classList.remove("menubar_item");

        }
        menubar_classes.remove("menubar");
        menubar_classes.add("menubar_responsive");
        document.getElementById("menubar").style.display = "block";
    }

    if (dropdown_clicker == 2) {
        for (let i = 0; i < menubar_item_classes1.length; i++) {
            menubar_item_classes1[i].classList.add("menubar_item");
            menubar_item_classes1[i].classList.remove("menubar_item_responsive");

        }
        menubar_classes.add("menubar");
        menubar_classes.remove("menubar_responsive");
        document.getElementById("menubar").style.display = "none";

    }

}
*/