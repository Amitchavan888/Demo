slip02.html 

<html>
   <head>
       <title>Change Preferences></title>
   </head>
   <body>
       <h1>Change Preferences</h1>
       <form action= "slip02.php" method="POST">
       <label for="s1">Font Style:</label>
       <select id="font_style" name="s1">
          <option value="Normal">Normal</option>
          <option value="Italic">Italic</option>
          <option value="oblique">oblique</option>
       </select><br><br>
       
       <label for="font_size">Font Size:</label>
       <select id="s" name="s">
          <option value="14px">Small</option>
          <option value="20px">Middle</option>
          <option value="28px">Large</option>
       </select><br><br>
       
       <label for="font_color">Font Color:</label>
       <select id="c" name="c">
          <option value="black">Black</option>
          <option value="green">Green</option>
          <option value="red">Red</option>
          <option value="blue">Blue</option>
       </select><br><br>
       
       <label for="bg_color">Background Color:</label>
       <select id="b" name="b">
          <option value="black">Black</option>
          <option value="green">Green</option>
          <option value="red">Red</option>
          <option value="blue">Blue</option>
       </select><br><br>
       
       <input type="submit" name="submit" value="Save Preferences">  
     </form>
</html>
       

slip02.php
<?php
      echo "Style is : ".$_POST['s1']."<br>"; 
      echo "Size is : ".$_POST['s']."<br>";
      echo "Color is : ".$_POST['c']."<br>";
      echo "Background color is : ".$_POST['b']."<br>";
      setcookie("set1",$_POST["s1"]);
      setcookie("set2",$_POST["s"]);
      setcookie("set3",$_POST["c"]);
      setcookie("set4",$_POST["b"]);
?>
<html>
   <body>
       <form action="third.php">
       <input type="submit" name="submit" value="OK">
       </form>
   </body>
</html>

third.php -
<?php
  $fstyle = $_COOKIE["set1"];
  $fsize = $_COOKIE["set2"];
  $fcolor = $_COOKIE["set3"];
  $background = $_COOKIE["set4"];
?>
<body style="background-color : <?php echo $background;?>">
  <p style="Font-size : <?php echo $fsize;?>; color:<?php echo $fcolor?>; font-style:<?php echo $fstyle;?>">sagar<p>
  </body>
  </html>