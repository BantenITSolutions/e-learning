<?php
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
    include 'controller.php';
}
?>