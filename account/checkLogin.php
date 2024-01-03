<?php
if (isset($_SESSION['user'])) {
} else {
    header("location:/learn_php/assignment/account/login.php");
}
