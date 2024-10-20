<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Writing</title>
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
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="board_box">
            <h3>Community > Writing</h3>
            <br><br>
            <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
            <ul id="board_form">
                <li class="form_row">
                    <span class="col1">ID:</span>
                    <span class="col2"><?php echo $_SESSION["userid"]; ?></span>
                </li>
                <li class="form_row">
                    <span class="col1">Title:</span>
                    <span class="col2"><input name="subject" type="text"></span>
                </li>
                <li id="text_area">
                    <span class="col1">Content:</span>
                    <span class="col2"><textarea name="content"></textarea></span>
                </li>
                <li class="form_row">
                    <span class="col1">File:</span>
                    <span class="col2"><input type="file" name="upfile"></span>
                </li>
            </ul>
            <ul class="buttons">
                <li><button type="button" onclick="check_input()">Save</button></li>
                <li><button type="button" onclick="location.href='board_list.php'">View List</button></li>
            </ul>
            </form> 
        </div>
    </section> 
</body>
</html>
