<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (createPost($conn, $title, $content)) {
        echo "<p>Post created successfully!</p>";
    } else {
        echo "<p>Error creating post.</p>";
    }
}
?>

<form action="create.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>

    <input type="submit" value="Create Post">
</form>

<?php
include 'templates/footer.php';
