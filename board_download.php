<?php
    $num = $_GET["num"];

    $con = mysqli_connect("localhost", "root", "", "project");
    $sql = "SELECT * FROM board WHERE num=$num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $file_path = "./data/" . $row["file_copied"];

    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file_path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        echo("
            <script>
            alert('파일이 존재하지 않습니다.');
            history.go(-1);
            </script>
        ");
    }

    mysqli_close($con);
?>
