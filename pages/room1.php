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

        <h2>ROOM.1 - Doctor's Office</h2>

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
                            <form action='close.php' method='get'>
                                <input type='hidden' name='close1occupied' value=''>
                                <button type='submit' class='btn2 warning'>Send Next</button>
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

    <?php if(isset($_GET["opened"])){ ?>
        <div class="success2 info4">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room1.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#4CAF50;cursor:default;left:40px;" >Room.1 Is Now Open</span>
        </div>
    <?php } ?>

    <?php if(isset($_GET["sending"])){ ?>
        <div class="success2 info4 info5">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room1.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#4CAF50;cursor:default;left:40px;" >Patient will be with you shortly...<br><br><hr><br>- PLEASE ACKNOWLEDGE -<br> Has Patient Entered Your Office?<br><a href="close.php?close1">YES</a></span>
        </div>
    <?php } ?>

    <?php if(isset($_GET["closed"])){ ?>
        <div class="info info4">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"><a style="text-decoration:none;" href="room1.php">&times;</a></span>
            <span class="speakbtn" style="font-size:1.4em; color:#2196F3;cursor:default;left:40px;" >Room.1 Is Now Closed</span>
        </div>
    <?php } ?>


    <?php if(isset($_COOKIE["room1"])){ ?>
        <div class="bottomRight">
            <a href="close.php?close1"><button class="btn" style="">CLOSE<br>ROOM 1 </button></a>
        </div>
    <?php }else{ ?>
        <div class="bottomRight">
            <a href="open.php?open1"><button class="btn" style="">OPEN<br>ROOM 1</button></a>
        </div>
    <?php } ?>
    


</body>



</html>