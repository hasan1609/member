    <?php
    if (!$_SESSION['login']) {
        if (!$_SESSION['role'] == 1 or !$_SESSION['role'] == 2) {
            header("Location:../../login.php");
        }
    }
    ?>