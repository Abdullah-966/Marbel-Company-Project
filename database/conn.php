<?php
$con = mysqli_connect("localhost", "root", "", "rmf_db");   // establishing database connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());    // checking database connection
}
