<!DOCTYPE html>
<html>

<?php include 'connect.php'; 


$result1 = mysqli_query($conn, "SELECT * FROM rooms WHERE room like 'room1'");
$row1 = mysqli_fetch_assoc($result1);
$row1['available'];

$result2 = mysqli_query($conn, "SELECT * FROM rooms WHERE room like 'room2'");
$row2 = mysqli_fetch_assoc($result2);
$row2['available'];

$result3 = mysqli_query($conn, "SELECT * FROM rooms WHERE room like 'room3'");
$row3 = mysqli_fetch_assoc($result3);
$row3['available'];

?>

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

        <h2>Patient's Queue</h2>

        <table id="myTable">

            <tr class="header">
                <th style="width:60%;">Patient's Name</th>
                <th style="width:30%;">Queue No.</th>
                <th style="width:30%;">Up Next</th>
            </tr>



            <?php
            $sql = "SELECT * FROM patients";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo '<td class="number">' . $row["id"] . '</td>';
                    echo "<td class='next'>
                            <form action='next.php' method='get'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='name' value='" . $row['username'] . "'>
                                <button type='submit' class='btn2 warning'>Next</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td>No Patients Added!</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
            }
            ?>

        </table>


        <br>
        <br>
    </div>
    <?php if(isset($_GET["reset"])){ ?>
      <div class="success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="queue.php">&times;</a></span> 
        <p><?php echo "<strong>SUCCESS! </strong> Queue reset successfully.";?></p>
      </div>
    <?php } ?>

    <?php if($row1['available'] == 1){ ?>
        <div class="info info3">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <span style="color:#2196F3;cursor:default;left:40px;" class="speakbtn"><span class="room">Room.1</span> &#9836;</span>
            <h2 style="margin:3%; text-decoration:underline;">FREE ROOMS</h2>
        </div>
    <?php }elseif($row2['available'] == 1){ ?>
        <div class="info info3">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <span style="color:#2196F3;cursor:default;left:40px;" class="speakbtn"><span class="room">Room.2</span> &#9836;</span>
            <h2 style="margin:3%; text-decoration:underline;">FREE ROOMS</h2>
        </div>

    <?php }elseif($row3['available'] == 1){ ?>
        <div class="info info3">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <span style="color:#2196F3;cursor:default;left:40px;" class="speakbtn"><span class="room">Room.3</span> &#9836;</span>
            <h2 style="margin:3%; text-decoration:underline;">FREE ROOMS</h2>
        </div>

    <?php }else{ ?>
        <div class="info info2">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <span style="color:#000;cursor:default;left:40px;" class="speakbtn"><span class="room">All Rooms Are Currently Unavailable...</span></span>
        </div>
    <?php } ?>


    <?php if (isset($_GET["name"]) && isset($_GET['id'])) { ?>
        <div class="info info2">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="queue.php">&times;</a></span>
            <?php if($row1['available'] == 1){ ?>
                <span class="speakbtn" onclick="speaking1('<?php echo $_GET['name']; ?>')"><span class="room">Room.1</span> &#9836;</span>
                <p><?php echo "<strong>INFO! " . $_GET['name'] . "</strong> is next.<br><b>ID</b> = " . $_GET["id"] . ""; ?></p>
            <?php }elseif($row2['available'] == 1){ ?>
                <span class="speakbtn2" onclick="speaking2('<?php echo $_GET['name']; ?>')"><span class="room">Room.2</span> &#9836;</span>
                <p><?php echo "<strong>INFO! " . $_GET['name'] . "</strong> is next.<br><b>ID</b> = " . $_GET["id"] . ""; ?></p>
            <?php }elseif($row3['available'] == 1){ ?>
                <span class="speakbtn3" onclick="speaking3('<?php echo $_GET['name']; ?>')"><span class="room">Room.3</span> &#9836;</span>
                <p><?php echo "<strong>INFO! " . $_GET['name'] . "</strong> is next.<br><b>ID</b> = " . $_GET["id"] . ""; ?></p>
            <?php }else{ ?>
                <span style="color:#000;cursor:default;left:40px;" class="speakbtn"><span class="room">All Rooms Are Currently Unavailable...</span></span>
            <?php } ?>
        </div>

        <script>
            function speaking1(name) {
                var msg = new SpeechSynthesisUtterance(name + ', please go to room 1.');
                window.speechSynthesis.speak(msg);
            }
            function speaking2(name) {
                var msg = new SpeechSynthesisUtterance(name + ', please go to room 2.');
                window.speechSynthesis.speak(msg);
            }
            function speaking3(name) {
                var msg = new SpeechSynthesisUtterance(name + ', please go to room 3.');
                window.speechSynthesis.speak(msg);
            }
        </script>

    <?php } ?>


    <div class="bottomRight bottomRight3">
        <a href="reset.php?val=delete"><button class="btn">Reset<br>Queue</button></a>
    </div>
    <br>
    <div class="bottomRight">
        <a href="home.php"><button class="btn">Add<br>Patient</button></a>
    </div>


</body>



</html>