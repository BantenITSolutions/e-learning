<?php
/**
 *
 */
session_start();
if (empty($_SESSION['username'])AND empty($_SESSION['password'])){
    echo '
            <!Doctype html>
            <html>
                <head>
                <title>Halaman Login Administrator</title>
                </head>
                <body>
                        <form action="masuk.php" method="POST" class="forms">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="username">
                        <br/>
                        <label for="password">Password</label>
                        <input type="password" name="password"placeholder="Password">
                        <br/>
                        <input class="button" type="submit" value="Masuk">
                        </form>
                </body>
            </html>';
} else {
?>
<!Doctype html>
<html>
<head>
    <title>Dashboard - E-Learning</title>
</head>
<body>
    <h1>Selamat Datang :)</h1>
    <?php
        include 'inc/Autoloader.php';
        $url = $_GET['halaman'];
        if ($url == 'lihat') {
            include 'lihat-profil.php';
        } else {
            echo'<ul>
                <li><a href="lihat-profil.php">Lihat Profil</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>';
        }
    ?>
</body>
</html>
<?
}
?>
