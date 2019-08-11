
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>Mogi Framework - fast and free</title>
        <link id="pagestyle" rel="stylesheet" type="text/css" href="..\css\mogi.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
        <script src="../js/style.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>jjef - Mogi Badges</title>

        </head>
        <body>

        <div class="fixedbutton">
        <select id="themeBox" onclick="themeUpdate()">
          <option value="Dark" id="dark" selected>Dark</option>
          <option value="Light" id="light">Light</option>
          <option value="Mogi" id="mogi">Mogi</option>
        </select>
        </div>

        <div class="header clearfix sticky">
        <div class="header__content boxed">
                <div class="header__logo__img" style="margin: 10px;">
            <img src="../img/logo.png" alt="" width="40px" height="40px;">
        </div>
         <div class="header__logo logo" style="padding-left: 0px;"><a href="#"><h3>Mogi</h3></a></div>
        </div>
        </div> 
        <div class="cover parallax" style="height:90%; background-image: url(../img/users.jpg);">
        <div class="cover__filter"></div>
        <div class="cover__caption">
        <div class="cover__caption__copy white-text"> 
            <h1>jjef</h1>
            <h3>Early supporter</h3> <br>
        </div>
        </div>
        </div> 
        <div class="page boxed rounded">
        <div class="page__content">
        <h1>What is this?</h1>
        <p>This is an official Mogi page that certificates the officiality of the badge that you have seen on the previous page <br>
        This badge was deployed on 11-08-2019</p>
        </div>
        </div>

        <div class="footer">
        <div class="footer__content boxed clearfix">
            <div class="footer__content__left">
                <p>Designed by <a href="https://twitter.com/mooonmatt"><i class="fas fa-moon"></i>moonmatt</a></p>
            </div>
            <div class="footer__content__right">
                <a href="https://twitter.com/mooonmatt"><ul><i class="fab fa-twitter"></i></ul></a>
                <a href="https://github.com/moonmatt/Mogi"><ul><i class="fab fa-github"></i></ul></a>
                <a href="https://moonmatt.dev/"><ul><i class="fab fa-chrome"></i></ul></a>
            </div>
        </div>
        </div>
        </body>
        </html>
        <script>
        updateTheme();
        var select = document.querySelector("#themeBox");
        var selectOption = select.options[select.selectedIndex];
        var lastSelected = localStorage.getItem("select");
        
        if(lastSelected) {
            select.value = lastSelected; 
        }
        select.onchange = function () {
           lastSelected = select.options[select.selectedIndex].value;
           console.log(lastSelected);
           localStorage.setItem("select", lastSelected);
            updateTheme();
        }
        function updateTheme() {
            if(document.getElementById("dark").selected) { 
                swapStyleSheet("../css/dark.css") 
            }
            if(document.getElementById("light").selected) { 
                swapStyleSheet("../css/light.css") 
            }
            if(document.getElementById("mogi").selected) { 
                swapStyleSheet("../css/mogi.css") 
            } 
        }
        updateTheme();  
            </script>
            <script>
        function responsive() {
            if (document.getElementById("header__menu").classList != "mystyle") {
                document.getElementById("header__menu").classList = "mystyle";
            } else {
                document.getElementById("header__menu").classList.remove("mystyle");
                document.getElementById("header__menu").classList = "no-mobile";
            }
        }
        </script>
        