<?php 
session_start();
require "functions.php";

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

// cek apakah tombol edit sudah ditekan
if (isset($_POST["edit"])) {
   if (edit($_POST) > 0) {
      echo "<script>
            alert('Data Succesfully Edited!');
            document.location.href = 'index.php';
            </script>";
   } else {
      echo "<script>
            alert('Data Failed to Edit!');
            </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Anime Data</title>
</head>
<body>
   
   <h1>Edit Anime Data</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      <table>
         <input type="hidden" name="id" value="<?= $anime['id']; ?>">
         <tr>
            <td><label for="title">Title</label></td>
            <td>:</td>
            <td><input type="text" name="Title" id="title" required autofocus value="<?= $anime['Title']; ?>"></td>
         </tr>
         <tr>
            <td><label for="studio">Studio</label></td>
            <td>:</td>
            <td><input type="text" name="Studio" id="studio" required value="<?= $anime['Studio']; ?>"></td>
         </tr>
         <tr>
            <td><label for="source">Source</label></td>
            <td>:</td>
            <td><input type="text" name="Source" id="source" required value="<?= $anime['Source']; ?>"></td>
         </tr>
         <tr>
            <td><label for="premiered">Premiered</label></td>
            <td>:</td>
            <td><input type="date" name="Premiered" id="premiered" required value="<?= $anime['Premiered']; ?>"></td>
         </tr>
         <tr>
            <td><label for="MC">MC</label></td>
            <td>:</td>
            <td><input type="text" name="MC" id="MC" required value="<?= $anime['MC']; ?>"></td>
         </tr>
         <tr>
            <td><label for="poster">Poster</label></td>
            <td>:</td>
            <td><img src="img/<?= $anime['Poster']; ?>" class="img-preview" style="width: 125px; display: block;"></td>
            <td><input type="file" name="Poster" id="poster" class="img-input" onchange="previewImage()"></td>
            <input type="hidden" name="oldPoster" value="<?= $anime['Poster']; ?>">
         </tr>
         <tr>
            <td><button type="submit" name="edit">Edit Data</button></td>
            <td></td>
            <td></td>
         </tr>
      </table>
   </form>

   <script src="js/script.js"></script>
</body>
</html>