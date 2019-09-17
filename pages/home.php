<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/jquery-3.4.1.min.js"></script>
</head>

<body>

<div class="bgimg">

  <div class="topleft">
    <h1 style="padding-left:15px;">&#9824;</h1>
  </div>

  <form class="middle" action="validate.php" method="GET" autocomplete="on">
    <h1 class="green_text">Pamsco International Clinic</h1>
    <hr>
    <br>
    <br>
    <label for="name"><b>Enter Patient's Name</b></label>
    <br>
    <br>
    <input id="name" type="text" name="name" placeholder="Patient's Name" required>
    <button type="submit" class="btn green">Add</button>
    <!-- <button type="reset" class="btn blue">Reset</button> -->
    <br>
    <br>
    <br>
    <br>
    <br>

    
    
</form>

    <?php if(isset($_COOKIE["patientID"]) && isset($_GET['name'])){ ?>
      <div class="success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <p><?php echo "<strong>SUCCESS! ".$_GET['name']."</strong> has been added.<br><b>ID</b> = ". $_COOKIE["patientID"]."";?></p>
      </div>
    <?php } ?>

  <div class="bottomRight">
    <a href="queue.php"><button class="btn">View<br>Queue</button></a>
  </div>
  <div class="bottomRight2">
    <a href="start.php"><button class="btn">Start Page</button></a>
  </div>

</div>

</body>


</html>