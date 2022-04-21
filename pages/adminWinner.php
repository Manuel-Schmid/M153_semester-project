<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Home</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="admin-view_body">
<section class="admin_content">
    <br>
    <h1>Winner</h1>
    <br>
    <form action="adminWinner.php" method="post">
        <input type="button" name="pickWinner" value="Pick">
    </form>
    <form action="" method="get">

    </form>
</section>

<section class="admin_sidebar">
    <a href="adminQuestion.php" class="sidebarRemoveLink"><div  class="sidebarItem">Questions</div></a>
    <a href="adminGallery.php" class="sidebarRemoveLink"><div class="sidebarItem">Gallery</div></a>
    <a href="adminData.php" class="sidebarRemoveLink"><div class="sidebarItem">Data</div></a>
    <a href="adminWinner.php" class="sidebarRemoveLink"><div id="currentPage" class="sidebarItem">Winner</div></a>
    <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Logout</div></a>
</section>


</body>
</html>

