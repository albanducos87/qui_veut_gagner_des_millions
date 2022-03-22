<?php
session_start();
if ($_GET['admin']) {
    $_SESSION['admin'] = true;
}