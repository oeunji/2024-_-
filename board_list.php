<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Community</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="board_box">
            <h3>Community</h3>
            <br>
            <ul id="board_list">
                <li>
                    <span class="col1">No</span>
                    <span class="col2">Title</span>
                    <span class="col3">Writer</span>
                    <span class="col4">File</span>
                    <span class="col5">Registration date</span>
                    <span class="col6">Viewer</span>
                </li>
                <?php
                    $con = mysqli_connect("localhost", "root", "", "project");
                    $sql = "SELECT * FROM board ORDER BY num DESC";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li>";
                        echo "<span class='col1'>".$row['num']."</span>";
                        echo "<span class='col2'><a href='board_view.php?num=".$row['num']."'>".$row['subject']."</a></span>";
                        echo "<span class='col3'>".$row['id']."</span>";
                        echo "<span class='col4'>".$row['file_name']."</span>";
                        echo "<span class='col5'>".$row['regist_day']."</span>";
                        echo "<span class='col6'>".$row['hit']."</span>";
                        echo "</li>";
                    }
                    mysqli_close($con);
                ?>
            </ul>
            
            <ul class="buttons">
                <li><button onclick="location.href='board_form.php'">Writing</button></li>
            </ul>
        
        </div>
    </section> 
</body>
</html>
