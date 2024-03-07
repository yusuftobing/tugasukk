<?php
include 'db_conn.php';
?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Home Page</title>
     <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="Assets/css/akuuuuu.css">
</head>

<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
          <div class="container-fluid">
               <a class="navbar-brand" href="blog.php">

                    <b>Gallery <span style="color :#0088FF; ">Photo</span></b>
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="index.php">Berandan</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="foto/foto.php">Upload</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="album/album.php">Album</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link " href="login.php">Login | Signup</a>
                         </li>
                    </ul>
                    <form class=" d-flex" role="search">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
               </div>
          </div>
     </nav>

     <div class="main" style="margin-top:70px;">
          <div class="gallery">
               <?php
               $stmt = $conn->prepare("SELECT * FROM foto INNER JOIN user ON foto.userid = user.userid  ORDER BY foto.userid ASC");
               $stmt->execute();
               $users = $stmt->fetchAll();
               foreach ($users as $row) {
                    ?>
                    <div class="img">
                         <a href="tampilberanda.php?fotoid=<?= $row['fotoid'] ?>">
                              <img src="Assets/img/<?= $row['lokasifile'] ?>" title="<?= $row['judulfoto'] ?>"
                                   style="width:300px">
                         </a>
                         <div class="yee">
                              <a href="tampilberanda.php?fotoid=<?= $row['fotoid'] ?>">
                                   <?= $row['judulfoto'] ?>
                              </a>
                              <div class="username">
                                   <a href="tampilberanda.php?fotoid=<?= $row['fotoid'] ?>">
                                        <?= $row['username'] ?>
                                   </a>
                              </div>
                         </div>
                    </div>


               <?php } ?>
          </div>
     </div>


     <script src="Assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>