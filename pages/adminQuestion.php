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
            <br>
            <h1> Create a new Question </h1>
            <br>
            <p>Question: <input type="text" name="Question"></p>
            <p>Wrong Answer 1: <input type="text" name="WrongAnswer1"></p>
            <p>Wrong Answer 2: <input type="text" name="WrongAnswer2"></p>
            <p>Wrong Answer 3: <input type="text" name="WrongAnswer3"></p>
            <p>Correct Answer: <input type="text" name="CorrectAnswer"></p>
            <br>
            <input type="button" value=" submit " name="submitQuestion">
        </form>
    </section>

    <section class="admin_sidebar">
        <a href="adminQuestion.php" class="sidebarRemoveLink"><div id="currentPage" class="sidebarItem">Questions</div></a>
        <a href="adminGallery.php" class="sidebarRemoveLink"><div class="sidebarItem">Gallery</div></a>
        <a href="adminData.php" class="sidebarRemoveLink"><div class="sidebarItem">Date</div></a>
        <a href="adminWinner.php" class="sidebarRemoveLink"><div class="sidebarItem">Winner</div></a>
        <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Logout</div></a>
    </section>

</body>
</html>

