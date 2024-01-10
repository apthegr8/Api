<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (editPost($conn, $id, $title, $content)) {
        echo "<p>Post updated successfully!</p>";
    } else {
        echo "<p>Error updating post.</p>";
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = getPostById($conn, $id);

    if ($post) {
        echo "<form action='edit.php' method='post'>
                <input type='hidden' name='id' value='{$post['id']}'>
                <label for='title'>Title:</label>
                <input type='text' id='title' name='title' value='{$post['title']}' required>

                <label for='content'>Content:</label>
                <textarea id='content' name='content' required>{$post['content']}</textarea>

                <input type='submit' value='Update Post'>
              </form>";
    } else {
        echo "<p>Post not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}

include 'templates/footer.php';
