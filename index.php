<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'templates/header.php';

$posts = getAllPosts($conn);

if ($posts) {
    while ($row = $posts->fetch_assoc()) {
        echo "<article>
                <h2>{$row['title']}</h2>
                <p>{$row['content']}</p>
                <a href='edit.php?id={$row['id']}'>Edit</a>
                <a href='delete.php?id={$row['id']}'>Delete</a>
              </article>";
    }
} else {
    echo "<p>No posts available.</p>";
}

include 'templates/footer.php';
