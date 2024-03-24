<?php
include 'database.class.php';
include 'user.class.php';

if (user::login("user", "root1")) {
    echo "succes";
} else {
    echo "failed";
}
