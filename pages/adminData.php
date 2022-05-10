<?php
    include_once('../CRUD.php');
?>

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
    <h1 class="center">Users</h1>
    <br>
    <div class="table_users">


            <?php $users = getAllUsers(); ?>
            <table id="users">
                <tr>
                    <th>userID</th>
                    <th>firstName</th>
                    <th>lastName</th>
                    <th>dob</th>
                    <th>eMail</th>
                    <th>phoneNr</th>
                    <th>postcode</th>
                    <th>city</th>
                    <th>address</th>
                    <th>answerCorrect</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['userID'] ?></td>
                        <td><?php echo $user['firstName'] ?></td>
                        <td><?php echo $user['lastName'] ?></td>
                        <td><?php echo $user['dob'] ?></td>
                        <td><?php echo $user['eMail'] ?></td>
                        <td><?php echo $user['phoneNr'] ?></td>
                        <td><?php echo $user['postcode'] ?></td>
                        <td><?php echo $user['city'] ?></td>
                        <td><?php echo $user['address'] ?></td>
                        <td><?php echo $user['answerCorrect'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        <br>
    </div>
</section>

<section class="admin_sidebar">
    <a href="adminQuestion.php" class="sidebarRemoveLink"><div  class="sidebarItem">Questions</div></a>
    <a href="adminGallery.php" class="sidebarRemoveLink"><div class="sidebarItem">Gallery</div></a>
    <a href="adminData.php" class="sidebarRemoveLink"><div class="sidebarItem" id="currentPage">Data</div></a>
    <a href="adminWinner.php" class="sidebarRemoveLink"><div  class="sidebarItem">Winner</div></a>
    <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Logout</div></a>
</section>

</body>
</html>


