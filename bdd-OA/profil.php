<?php
// session_start();
// if (isset($_SESSION['username'])) {
if (isset($_COOKIE['user'])) {
    echo "Hello" . " " . $_COOKIE['user'];
} else {
    echo 'Empty session';
}
