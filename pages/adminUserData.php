<?php
    include_once('../CRUD.php');
    $users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olma | Registrierte Benutzer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <section class="admin_content">
        <div class="table_users">
            <div class="title">
                <h1 class="center">Registrierte Benutzer</h1>
            </div>

            <?php $users = getAllUsers(); ?>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                        <table class="table table-bordered table-hovered table-striped" id="users">
                            <thead>
                            <th>Vorname</th>
                            <th>Nachname</th>
                            <th>DOB</th>
                            <th>eMail</th>
                            <th>Tel.</th>
                            <th>Adresse</th>
                            <th>Antwort korrekt?</th>
                            <th>Selfie</th>
                            </thead>

                            <tbody>
                                <?php foreach ($users as $user) {
                                     $picture = getImageSrc($user['userID']);
                                    ?>
                                <tr>
                                    <td><?php echo $user['firstName'] ?></td>
                                    <td><?php echo $user['lastName'] ?></td>
                                    <td><?php echo date_format(date_create($user['dob']), 'd.m.Y'); ?></td>
                                    <td style="word-break: break-word"><?php echo $user['eMail'] ?></td>
                                    <td><?php echo $user['phoneNr'] ?></td>
                                    <td><?php echo $user['street'] . ', ' . $user['postCode'] . ' ' . $user['city']  ?></td>
                                    <td><?php echo $user['answerCorrect'] ? 'Ja' : 'Nein'; ?></td>
                                    <td><?php if ($picture !== 'data:image/png;base64,') echo '<img src="'.$picture.'" alt="'.$user['firstName'].'" height="125">' ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="admin_sidebar">
        <a href="adminUserData.php" class="sidebarRemoveLink"><div class="sidebarItem" id="currentPage">Benutzer</div></a>
        <a href="adminWinner.php" class="sidebarRemoveLink"><div  class="sidebarItem">Gewinner</div></a>
        <a href="home.php" class="sidebarRemoveLink"><div class="sidebarItem">Abmelden</div></a>
    </section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

</body>
</html>
<script>
	$(document).ready(function() {
    	$('#users').DataTable();
	});
</script>