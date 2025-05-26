<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>">
    Email: <input type="email" name="email" value="<?= $row['email'] ?>">
    <button type="submit">Update</button>
</form>