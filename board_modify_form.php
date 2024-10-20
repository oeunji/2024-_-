<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Modify</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요.");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요.");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="board_box">
            <h3>Community > Modify</h3>
            <?php
                $num = $_GET["num"];
                $con = mysqli_connect("localhost", "root", "", "project");
                $sql = "SELECT * FROM board WHERE num=$num";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                $subject = $row["subject"];
                $content = $row["content"];
            ?>
            <form name="board_form" method="post" action="board_modify.php?num=<?php echo $num; ?>" enctype="multipart/form-data">
                <ul id="board_form">
                    <li>
                        <span class="col1">ID: </span>
                        <span class="col2"><?php echo $_SESSION["userid"]; ?></span>
                    </li>
                    <li>
                        <span class="col1">Title: </span>
                        <span class="col2"><input name="subject" type="text" value="<?php echo $subject; ?>"></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">Content: </span>
                        <span class="col2"><textarea name="content"><?php echo $content; ?></textarea></span>
                    </li>
                    <li>
                        <span class="col1">File</span>
                        <span class="col2"><input type="file" name="upfile"></span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li><button type="button" onclick="check_input()">Modify</button></li>
                    <li><button type="button" onclick="location.href='board_list.php'">View List</button></li>
                </ul>
            </form>
        </div>
    </section> 
</body>
</html>

<script>
function check_input() {
    if (!document.board_form.subject.value) {
        alert("제목을 입력하세요!");
        document.board_form.subject.focus();
        return;
    }
    if (!document.board_form.content.value) {
        alert("내용을 입력하세요!");    
        document.board_form.content.focus();
        return;
    }
    document.board_form.submit();
}
</script>