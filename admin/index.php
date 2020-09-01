<?php
session_start();
if ($_SESSION["login"] == "false") {
    header("Location: login");
} else {
    header("Location: admin");
}
