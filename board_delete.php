<?php
    $num = $_GET["num"];

    $con = mysqli_connect("localhost", "root", "", "project");
    $sql = "DELETE FROM board WHERE num=$num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
       <script>
        location.href = 'board_list.php';
       </script>
    ";
?>
