<?php
    $ok = "yes";
    $num1 = rand(1,10);
    $num2 = rand(3,15);
    $result = $num1 + $num2;
    $btime = "25/08/2019 at 3pm";
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
        $time = date("d-m-Y");
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
        $fname = $name . ".php";
        $data = '
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
        <title>'. $name. ' - Mogi Badges</title>
        </head>
        <body>
        <div class="header clearfix sticky">
        <div class="header__content boxed">
                <div class="header__logo__img" style="margin: 10px;">
            <img src="../img/logo.png" alt="" width="40px" height="40px;">
        </div>
         <div class="header__logo logo" style="padding-left: 0px;"><a href="#"><h3>Mogi</h3></a></div>
        </div>
        </div> 

        <div class="cover parallax" style="height:90%; background-image: url("https://source.unsplash.com/daily");">
        <div class="cover__filter"></div>
        <div class="cover__caption">
        <div class="cover__caption__copy white-text"> 
            <h1>'. $name .'</h1>
            <h3>'. $bname .'</h3> <br>
        </div>
        </div>
        </div> 
        <div class="page boxed rounded">
        <div class="page__content">
        <h1>What is this?</h1>
        <p>This is an official Mogi page that certificates the officiality of the badge that you have seen on the previous page <br>
        This badge was deployed on '. $time .'</p>
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
        ';
        if (file_exists($fname)) {
            echo "The file $fname exists";
        } else {
            $handle = fopen($fname, 'w') or die('Cannot open file:  '.$fname); //implicitly creates file
            $a = ++$badgenum;
            file_put_contents($file, $a);
            fclose($myfile);
            mail($rec,$sub,$msg,$headers);
            fwrite($handle, $data);
            header('location: yay.php');
        }
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
    </div>
    </div>
    
    
<div class="cover parallax" style="height:30%; background-image: url('../img/badgebg.jpg');">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy white-text">
            <?php
            if($ok != "yes"){
                echo "<h1>There are no badges at the moment</h1>";
                echo "The next badge will be released on ". $btime;
            } else {
                echo "<h1>" . $bname . " badge is now out!</h1>";
                    if ($ab == 1){
                    echo "There is only 1 badge left";
                    } else {
                    echo "There are ". $ab . " badges left";
                    }
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

   <div class="page boxed rounded shadow">
        <div class="page__content">
        <h1>What is this?</h1>
        <p>This is a page where you can try to get exclusive badges that you can insert in the footer of your websites made with Mogi.</p>
        </div>
    </div>

    <div class="page boxed rounded shadow">
        <div class="page__content">
        <h1>All the badges</h1>
        <p>Here you'll find all the badges released on Mogi</p>
        <hr>
        <div class="grid clearfix">
            <div class="grid-3">Title</div>
            <div class="grid-3">Number of badges</div>
            <div class="grid-3">Badge</div>
        </div>
        <div class="grid clearfix">
            <div class="grid-3">Contributor</div>
            <div class="grid-3">1</div>
            <div class="grid-3"><center><img src="https://i.ibb.co/tCCvZDL/Untitled-design-1.jpg" alt="Contributor" style="float: center;" width="25px" height="15px"></center></div>
        </div>
        <div class="grid clearfix">
            <div class="grid-3">Early Supporter</div>
            <div class="grid-3">5</div>
            <div class="grid-3"><center><img src="https://i.ibb.co/545y0vF/icon.jpg" alt="Early Supporter" style="float: center;" width="25px" height="15px"></center></div>
        </div>
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