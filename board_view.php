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
            <h3>Community > View</h3>
            <?php
                $num = $_GET["num"];
                $con = mysqli_connect("localhost", "root", "", "project");
                $sql = "SELECT * FROM board WHERE num=$num";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                $id = $row["id"];
                $subject = $row["subject"];
                $content = $row["content"];
                $regist_day = $row["regist_day"];
                $hit = $row["hit"];
                $file_name = $row["file_name"];
                $file_type = $row["file_type"];
                $file_copied = $row["file_copied"];

                // 조회수 증가
                $new_hit = $hit + 1;
                $sql = "UPDATE board SET hit=$new_hit WHERE num=$num";
                mysqli_query($con, $sql);
            ?>
            <ul id="view_content">
                <li class="form_row">
                    <span class="col1">Title :</span>
                    <span class="col2"><?php echo $subject; ?></span>
                </li>
                <li class="form_row">
                    <span class="col1">Content :</span>
                    <span class="col2"><?php echo $content; ?></span>
                </li>
                <?php
                    if ($file_name) {
                        $real_name = $file_copied;
                        $file_path = "./data/".$real_name;
                        $file_size = filesize($file_path);

                        echo "<li class='form_row'><span class='col1'>File :</span><span class='col2'>$file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href='board_download.php?num=$num'>[Save]</a></span></li>";
                    }
                ?>
                <li class="form_row">
                    <span class="col1">Writer :</span>
                    <span class="col2"><?php echo $id; ?> | <?php echo $regist_day; ?> | 조회 : <?php echo $new_hit; ?></span>
                </li>
            </ul>
            <ul class="buttons">
                <li><button onclick="location.href='board_list.php'">View List</button></li>
                <li><button onclick="location.href='board_modify_form.php?num=<?php echo $num; ?>'">Modify</button></li>
                <li><button onclick="location.href='board_delete.php?num=<?php echo $num; ?>'">Delete</button></li>
            </ul>
        </div>
    </section> 
</body>
</html>
