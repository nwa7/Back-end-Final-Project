<style>

@import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap');

body {
    background-color: #353535;
    color: #fff;
    font-family: "EB Garamond";
    font-size: 1.4rem;
    margin: 0;
}

a {
    color: #fff6c7;
    text-decoration: none;
    transition: ease-in-out .2s;
}

a:hover {
    color: #ffea7a
}

/* - - - H E A D E R - - - */

header {
    font-size: 3em;
    background-image: url('https://r4.wallpaperflare.com/wallpaper/1007/346/568/picture-the-gods-the-titans-mythology-wallpaper-57307ba237442053c4f7095096b75ad7.jpg');
    background-position: center;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 20px 0 #000;
    margin: 0 0 50px 0;
}

<?php
if (isset($_GET['action'])) 
    $action = $_GET['action']; 
else $action = '';
    switch($action) {
        case '':
            echo "header {height: 100vh;}";
            break;
        default:
            echo "header {height: 33vh;}";
            break;
    }
?>

h1 {
    z-index: 0;
    margin:0;
}

header h1::after {
    top: 0;
    left: 0;
    display: block;
    background: #353535;
    opacity: 50%;
    width: 100%;
    content: "";
    position: absolute;
    z-index: -1;
}

<?php
if (isset($_GET['action'])) 
    $action = $_GET['action']; 
else $action = '';
    switch($action) {
        case '':
            echo "header h1::after {height: 100vh;}";
            break;
        default:
            echo "header h1::after {height: 33vh;}";
            break;
    }
?>

/* - - - M E N U - - - */

.menu {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #353535;
    opacity: 50%;
    width: 100vw;
    height: 60px;
    text-align: center;
    box-shadow: 0 0 10px 0 #000;
    transition: ease-in-out .2s;
}

.menu a {
    margin: 15px 0 0 0;
    padding: 0 15px;
    display: inline-block;
    border-right: solid 1px #fff6c7;
}

.menu a:last-of-type {
    border-right: none;
}

/* - - - B O D Y - - - */

.conteneur {
    width: 960px;
    margin: 0 auto;
}

h2 {
    text-align: center;
}

img[alt='photo']{
    max-width:40rem;
    max-height:30rem;
}

p{
    text-align: justify;
}

.sup{
    margin-left: 10rem;
}

/* - - - F O R M U L A I R E S - - - */

input, textarea, input[type="file"]::file-selector-button, select {
    font-family: 'EB Garamond';
    font-size: 1.4rem;
    background-color: #454545;
    border: none;
    padding: 5px;
    color: #fff;
    transition: ease-in-out .2s;
}

input[type="text"], textarea {
    width: 100%;
    margin-bottom:1rem;
}

input[type="file"] {
    background-color: #353535;
}

input[type="submit"] {
    width: 100%;
    margin: 5px 0;
}

input[type="submit"]:hover, input[type="file"]::-webkit-file-upload-button {
    background-color: #fff6c7;
    color: #000;
}

select{
    margin-right: 2rem;
}

/* - - - F O O T E R - - - */

footer{
    margin-top : 5rem;
}

footer p{
    text-align: center;
    font-size: 0.8rem;
}

</style>

<script type="application/javascript">
    let menu = document.getElementsByClassName("menu")[0];
    document.addEventListener("scroll", () => {
        menu.setAttribute("style", "opacity: 100%");
    });
</script>