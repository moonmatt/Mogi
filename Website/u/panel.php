<?php
    define('SITE_KEY', '6LfYm7IUAAAAAAwIyA06UP5KT7rdOdzT7IUeeMFK');
    define('SECRET_KEY', '6LfYm7IUAAAAAHOmBndVabMTvSQmiDjd1_3jy-IH');
    $login = false;
    echo $login;
    $username = "***";
    $password = "***";
        //Get a list of file paths using the glob function.

    $fileList = glob('C:/xampp/htdocs/Mogi/Website/u/*.php');
    
    //Loop through the array that glob returned.
    if($_POST){
        function getCaptcha($SecretKey){
            $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
            $Return = json_decode($Response);
            return $Return;
        }
        $Return = getCaptcha($_POST['g-recaptcha-response']);
        if($Return->success == true && $Return->score > 0.5){
            if (isset($_POST['submit'])) {
                $fusername = $_POST['username'];
                $fpassword = $_POST['password'];
                if ($username == $fusername and $password == $fpassword) {
                    $login = true;
                    // echo "password e username corretti";
                } else {
                    // echo "errore";
                }
            }
        }
    }
    if (isset($_POST['delete'])){
        echo "hai schiacciato il bottone";
    } else {
        echo "non hai schiacciato il bottone";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
<title>Panel - Mogi Framework</title>
<link id="pagestyle" rel="stylesheet" type="text/css" href="..\css\mogi.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
<script src="../js/style.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
</head>

<div class="fixedbutton" style="left: 0;">
  <select id="themeBox" onclick="themeUpdate()" style="float: left;">
    <option value="Dark" id="dark" selected>Dark</option>
    <option value="Light" id="light">Light</option>
    <option value="Mogi" id="mogi">Mogi</option>
  </select>
</div>

<body>
      <div class="header clearfix sticky" style="height: 60px;">
       <div class="header__content boxed">
       <div class="header__logo__img" style="margin: 10px;">
           <img src="../img/logo.png" alt="" width="40px" height="40px;">
       </div>
        <div class="header__logo logo" style="padding-left: 0px;"><a href="#"><h3>Mogi</h3></a></div>
    </div>
    </div>
    
    
<div class="cover parallax" style="height:30%; background-image: url('../img/badgebg.jpg');">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy white-text">
            <h1>Admin Panel</h1>
            <?php if ($login == true) {
                echo "Welcome " . $username;
            } else {
                echo "Welcome on the login panel";
            }?>
			</div>
		</div>
    </div>

    <div class="page boxed rounded shadow" <?php if ($login == true) {
                echo "style='display: none;'";
            }?>>
       <div class="page__content">
          <h1>Compile the form</h1>
          <h3>Login in your admin panel</h3>
          <hr>
          <iframe name="votar" style="display:none;" action="about:blank"></iframe>
          <form action="" method="POST">
          <label for="name">Username</label>
          <input type="text" name="username" required onkeyup="url(this)">
          <label for="name">Password</label>
          <input type="password" name="password" required onkeyup="url(this)">
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br >
          <input type="submit" name="submit" value="Submit">
          </form>
       </div>
   </div>

   <div class="page boxed rounded shadow" <?php if ($login != true) {
                echo "style='display: none;'";
            }?>>
       <div class="page__content">
          <h1>Admin panel</h1>
          <h3>Here's the things you can do</h3>
          <hr>
          <iframe name="votar" style="display:none;" action="about:blank"></iframe>
          <form action="" method="POST">
          <div class="grid">
          <div class="grid-2"><select name="pages"><?php 
              foreach($fileList as $filename){
                //Simply print them out onto the screen.
                $filename = str_replace('C:/xampp/htdocs/Mogi/Website/u/','',$filename); 
                echo '"<option value="'.$filename.'">' . $filename . '</option>"';
                }
          ?></select><input type="submit" name="delete" value="Submit" class="btn little-red"></div>
          <div class="grid-2"><h1>Delete a page</h1><p>Be careful when you do this, you cannot undo this!</p></div>
          </div>
          </form>
       </div>
   </div>

   <div class="page boxed rounded shadow">
        <div class="page__content">
        <h1>What is this?</h1>
        <p>This is a page where you can try to get exclusive badges that you can insert in the footer of your websites made with Mogi.</p>
        </div>
    </div>

              <div class="footer">
        <div class="footer__content boxed clearfix">
        <div class="footer__content__left">
            <p>Designed by <a href="https://twitter.com/mooonmatt"><i class="fas fa-moon"></i>moonmatt</a></p><a href='https://moonmatt.dev'><img src='https://i.ibb.co/tCCvZDL/Untitled-design-1.jpg' class='badge' title='Contributor'></a>
        </div>
                <div class="footer__content__right">
            <a href="https://twitter.com/mooonmatt"><ul><i class="fab fa-twitter"></i></ul></a>
            <a href="https://github.com/moonmatt/Mogi"><ul><i class="fab fa-github"></i></ul></a>
            <a href="https://moonmatt.dev/"><ul><i class="fab fa-chrome"></i></ul></a>
        </div>
        </div>
    </div>



    <script>
function url(input) {
    var regex = /[^ a-z 0-9 _ : / . = # & ? ! è é à ù ò @]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
<script>
updateTheme();
var select = document.querySelector("#themeBox");
var selectOption = select.options[select.selectedIndex];
var lastSelected = localStorage.getItem('select');

if(lastSelected) {
    select.value = lastSelected; 
}
select.onchange = function () {
   lastSelected = select.options[select.selectedIndex].value;
   console.log(lastSelected);
   localStorage.setItem('select', lastSelected);
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
    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
    .then(function(token) {
        //console.log(token);
        document.getElementById('g-recaptcha-response').value=token;
    });
    });
    </script>
</body>