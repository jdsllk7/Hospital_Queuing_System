<!DOCTYPE html>
<html>

    <?php include 'connect.php';?>

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body class="bgimg2">

  <div class="topleft">
    <p>Logo</p>
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
                while($row = mysqli_fetch_assoc($result)) {
                    
                   echo "<tr>";
                        echo "<td>".$row["username"]."</td>";
                        echo '<td class="number">'.$row["id"].'</td>';
                        echo "<td class='next'>
                            <form action='next.php' method='get'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <input type='hidden' name='name' value='".$row['username']."'>
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

    <?php if(isset($_GET["name"]) && isset($_GET['id'])){ ?>
        <div class="info">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <span class="speakbtn" onclick="speaking('<?php echo $_GET['name'];?>')">&#9836;</span> 
            <p><?php echo "<strong>INFO! ".$_GET['name']."</strong> is next.<br><b>ID</b> = ". $_GET["id"]."";?></p>
        </div>

        <script>

            function speaking(name) {
                var msg = new SpeechSynthesisUtterance(name + ', please go to the doctors office.');
                window.speechSynthesis.speak(msg);
            }

        </script>
        
    <?php } ?>


  <div class="bottomRight">
    <a href="home.php"><button class="btn">Add<br>Patient</button></a>
  </div>


</body>



</html>