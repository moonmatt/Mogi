<?php
    $ok = "yes";
    $num1 = rand(1,10);
    $num2 = rand(3,15);
    $result = $num1 + $num2;
    $bname = "Early Supporter";
    $blink = "https://i.ibb.co/545y0vF/icon.jpg";
    $maxbadges = 5;
    $b = ++$maxbadges;
    $file = "b.txt";
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $badgenum = fread($myfile,filesize($file));
    $ab = $b - $badgenum;
if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    if ($number = $result) {
        if ($badgenum < $b){
        $a = ++$badgenum;
        file_put_contents($file, $a);
        fclose($myfile);
        $email = $_POST['email'];
        $name = $_POST['name'];
        $ulink = "https://mogi.moonmatt.dev/u/" . $name;
        $sub = "Hey, you got the badge!";
        $msg = "
        <html>
        <head>
        <title>Congratulation, you got the badge!</title>
        </head>
        <body>
        <h1>Congratulations " . $name . "</h1>
        <h3>You got the " . $bname . " badge!</h3>
        <hr>
        <p>In order to integrate it inside of your footer, just copy and paste the following code. <br>
        Insert it inside of the class called 'footer__content__left'.</p><br><br>
        <code>&lt;a href='" . $ulink . "'&gt;&lt;img src='". $blink ."' class='badge' title='".$bname."'&gt;&lt;/a&gt;</code>
        </body>
        </html>
        ";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $rec = $email;
        mail($rec,$sub,$msg,$headers);
        header('location: yay.php');
        } else {
        header('location: sorry.php');
        }
    } else {
        echo "this didn't work";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mogi Framework - fast and free</title>
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

<div class="fixedbutton">
  <select id="themeBox" onclick="themeUpdate()">
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
        <div class="header__menu" id="header__menu" >
           <a href="badges.html"><div class="header__menu__item"><ul>Badges</ul></div></a>
        </div>
    <a href="#"><div class="header__menu__item responsiveicon" onclick="responsive()"><ul><i class="fas fa-bars"></i></ul></div></a>
    </div>
    </div>
    
    
<div class="cover parallax" style="height:30%; background-image: url('../img/badgebg.jpg');">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy white-text">
                <h1><?php echo $bname;?> badge is now out!</h1>
                <?php 
                if ($ab == 1){
                    echo "There is only 1 badge left";
                } else {
                    echo "There are ". $ab . " badges left";
                }
                ?>
			</div>
		</div>
    </div>

    <div class="page boxed rounded shadow">
       <div class="page__content">
          <h1>Compile the form</h1>
          <h3>try to take an official badge</h3>
          <hr>
          <form action="" method="POST">
          <label for="name">Your username</label>
          <input type="text" name="name" placeholder="es moonmatt" required 
          <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          <label for="name">Your email</label>
          <input type="email" name="email" placeholder="es hello@moonmatt.dev" required <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          <label for="number">Human verification</label>
          <input type="number" name="number" min="1" max="50" placeholder="<?php echo $num1 . " + " . $num2?>" <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          <input type="submit" name="submit" value="Submit" <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          </form>
       </div>
   </div>

              <div class="footer">
        <div class="footer__content boxed clearfix">
        <div class="footer__content__left">
            <p>Designed by <a href="https://twitter.com/mooonmatt"><i class="fas fa-moon"></i>moonmatt</a></p><a href='https://mogi.moonmatt.dev/u/matteo'><img src='https://i.ibb.co/545y0vF/icon.jpg' class='badge' title='Early Supporter'></a>
        </div>
                <div class="footer__content__right">
            <a href="https://twitter.com/mooonmatt"><ul><i class="fab fa-twitter"></i></ul></a>
            <a href="https://github.com/moonmatt/Mogi"><ul><i class="fab fa-github"></i></ul></a>
            <a href="https://moonmatt.dev/"><ul><i class="fab fa-chrome"></i></ul></a>
        </div>
        </div>
    </div>




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
</body>