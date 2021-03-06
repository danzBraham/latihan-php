<?php 
session_start();
require 'functions.php';

if (!isset($_SESSION['login'])) {
   header("Location: login.php");
   exit;
}

// jika tidak ada id di url
if (!isset($_GET['id'])) {
   header("Location: index.php");
   exit;
}

// ambil id dari url
$id = $_GET['id'];

// query anime berdasarkan id
$anime = query("SELECT * FROM anime WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Anime Details</title>
   <style>
      html {
         text-align: center;
         font-family: Arial, Helvetica, sans-serif;
      }
   </style>
</head>
<body>
   
      <h1><?= $anime['Title']; ?></h1>

      <p><img src="img/<?= $anime['Poster']; ?>" alt="Poster" width="225"></p>
      <p>Studio : <?= $anime['Studio']; ?></p>
      <p>Source : <?= $anime['Source']; ?></p>
      <p>Premiered : <?= $anime['Premiered']; ?></p>
      <p>MC : <?= $anime['MC']; ?></p>
      <p><a href="edit.php?id=<?= $anime['id']; ?>">Edit</a> | <a href="delete.php?id=<?= $anime['id'];?>" onclick="return confirm('Are u sure want to delete it?')">Delete</a></p>
      <p><a href="index.php">Back to Anime List</a></p>

</body>
</html>