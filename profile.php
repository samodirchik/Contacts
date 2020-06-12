<?php
require_once ("vendor/db.php");
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация и регистрация</title>
    </head>
    <body>
        <form>
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </form>
        <main>
            <br><a href="favorite.php">My Favorite</a></br>
            <h3>Contacts</h3>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'contacts') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM numbers") or die($mysqli->error);
            ?>
            <table>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>

                        <th>Name</th>
                        <th>Phone</th>
                    </tr>
                    <tr>

                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><button>Add favorite</button>  </td>  
                    </tr>
                <?php endwhile; ?>
            </table>
        </main>
    </body>
</html>
