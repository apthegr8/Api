<?php
include 'includes/db.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deletePost($conn, $id)) {
        echo "<p>Post deleted successfully!</p>";
    } else {
        echo "<p>Error deleting post.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
