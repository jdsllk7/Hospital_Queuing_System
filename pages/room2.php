<!DOCTYPE html>
<html>

<?php include 'connect.php';?>

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="refresh" content="5" > 
</head>


<body class="bgimg2">

    <div class="topleft">
        <h1 style="padding-left:15px;">&#9824;</h1>
    </div>

    <!-- <br> -->
    <!-- <br> -->

    <div class="middle2">

        <br>
        <br>
        <br>
        <h2>ROOM.2 - Doctor's Office</h2>




            <?php
                $sql = "SELECT * FROM patients";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<br><br><br>";
                    echo "<a href='close.php?close2occupied'><button class='button'><span>Next Patient </span></button></a>";
                } else {
                    echo "<br><br><br>";
                    echo "No More Patients...";
                }
            ?>



        <br>
        <br>
    </div>

    <?php if(isset($_GET["opened"])){ ?>
        <div class="success2 info4">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room2.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#4CAF50;cursor:default;left:40px;" >Room.2 Is Now Open</span>
        </div>
    <?php } ?>

    <?php if(isset($_GET["sending"])){ ?>
        <div class="success2 info4 info5">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room2.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#4CAF50;cursor:default;left:40px;" >Patient will be with you shortly...<br><br><hr><br>- PLEASE ACKNOWLEDGE -<br> Has Patient Entered Your Office?<br><a href="close.php?close2">YES</a></span>
        </div>
    <?php } ?>

    <?php if(isset($_GET["closed"])){ ?>
        <div class="info info4">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room2.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#2196F3;cursor:default;left:40px;" >Room.2 Is Now Closed</span>
        </div>
    <?php } ?>




    <?php
    
    $result = mysqli_query($conn, "SELECT * FROM rooms WHERE room like 'room2'");
    $row = mysqli_fetch_assoc($result);
    
    
    if($row['available'] == 1){ ?>
        <div class="bottomRight">
            <a href="close.php?close2"><button class="btn" style="">CLOSE<br>ROOM 2 </button></a>
        </div>
    <?php }else{ ?>
        <div class="bottomRight">
            <a href="open.php?open2"><button class="btn" style="">OPEN<br>ROOM 2</button></a>
        </div>
    <?php } ?>


</body>



</html>