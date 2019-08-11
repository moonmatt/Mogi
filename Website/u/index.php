<?php
    $ok = "yes"; // YES if you want to give badges - NO if you don't want
    $num1 = rand(1,10); // Random number from 1 to 10
    $num2 = rand(3,15); // Random number from 3 to 15
    $result = $num1 + $num2; // The result of the captcha
    $btime = "25/08/2019 at 3pm"; // Time for the next give
    $bname = "Early supporter";  // Title of the badge
    $blink = "https://i.ibb.co/545y0vF/icon.jpg"; // Link of the badge image
    $maxbadges = 5; // Number of the badges to give
    $b = ++$maxbadges; // Adds 1 to the number of badges, because a file cannot be 0
    $file = "b.txt"; // Name of the file where datas are hosted
    $myfile = fopen($file, "r") or die("Unable to open file!"); // Opens the file
    $badgenum = fread($myfile,filesize($file)); // Reads the file
    $ab = $b - $badgenum; // The number of available badges
if (isset($_POST['submit'])) {
    $number = $_POST['number']; // The number of available badges
    if ($number = $result) { // Checks if the captcha is correct
        if ($badgenum < $b){ // Checks if there are available badges
        $time = date("d-m-Y"); // Gets the time
        $email = $_POST['email']; // Gets the email from the form
        $name = $_POST['name']; // Gets the name from the form
        $ulink = "https://mogi.moonmatt.dev/u/" . $name; // Makes the link of the page
        $sub = "Hey, you got the badge!"; // The title of the email
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
        "; // The body of the email
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $fname = $name . ".php"; // The fullname of the page (with .php)
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
        '; // The code of the page
        if (file_exists($fname)) { // If the page already exists
            $ip = $name . " also has " . $bname . " badge"; // Content to add to the page
            file_put_contents($fname, $ip, FILE_APPEND); // Adds content to the page
            $a = ++$badgenum; // Removes a badge from the availables
            file_put_contents($file, $a); // Removes a badge from the availables
            fclose($myfile); // Closes the file
            mail($email,$sub,$msg,$headers); // Sends the email
            header("Location: yay.php"); // Redirects to yay.php
        } else { // If the page doesn't exist
            $handle = fopen($fname, 'w') or die('Cannot open file:  '.$fname); // Creates the page
            $a = ++$badgenum; // Removes a badge from the availables
            file_put_contents($file, $a); // Removes a badge from the availables
            fclose($myfile); // Closes the file
            mail($email,$sub,$msg,$headers); // Sends the email
            fwrite($handle, $data); // Writes the file
            header("Location: yay.php"); // Redirects to yay.php
        }
    }
    } else {
        header("Location: sorry.php");
        echo "<script type='text/javascript'>alert('You have failed the Human Verification, try again!');</script>";
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
          <input type="text" name="name" placeholder="es moonmatt" required onkeyup="url(this)" 
          <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          <label for="name">Your email</label>
          <input type="email" name="email" placeholder="es hello@moonmatt.dev" required onkeyup="url(this)" <?php
            if($ok != "yes"){
                echo "disabled";
            }
            ?>>
          <label for="number">Human verification</label>
          <input type="number" name="number" min="1" max="50" placeholder="<?php echo $num1 . " + " . $num2?>" onkeyup="url(this)" <?php
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
function url(input) {
    var regex = /[^- a-z 0-9 _ : / . = # & ? ! è é à ù ò @]/gi;
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
</body>