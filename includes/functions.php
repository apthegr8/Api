<?php
function getAllPosts($conn) {
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    return ($result->num_rows > 0) ? $result : false;
}

function getPostById($conn, $id) {
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);

    return ($result->num_rows == 1) ? $result->fetch_assoc() : false;
}

function createPost($conn, $title, $content) {
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    return $conn->query($sql);
}

function editPost($conn, $id, $title, $content) {
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    return $conn->query($sql);
}

function deletePost($conn, $id) {
    $sql = "DELETE FROM posts WHERE id=$id";
    return $conn->query($sql);
}
