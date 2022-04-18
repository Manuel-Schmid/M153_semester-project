<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="admin-view_body">
    <section class="admin_content">
        <form action="adminQuestion.php" action="post">
            <p>Question</p>
            <input type="text" name="Question">
            <p>Anwser 1</p>
            <input type="text" name="Answer1">
            <p>Anwser 2</p>
            <input type="text" name="Answer2">
            <p>Anwser 3</p>
            <input type="text" name="Answer3">
            <p>Anwser 4</p>
            <input type="text" name="Answer4">
        </form>
    </section>

    <section class="admin_sidebar">
        <a href="adminQuestion.php"><div id="currentPage" class="sidebarItem">Questions</div></a>
        <a href="adminGallery.php"><div class="sidebarItem">Gallery</div></a>
        <a href="adminData.php"><div class="sidebarItem">Date</div></a>
        <a href="adminWinner.php"><div class="sidebarItem">Winner</div></a>
    </section>


</body>
</html>

