 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <title>Hari Raya Idul Fitri</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h4>Hari Raya</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pesan_pesan">Pesan-Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pengembang">pengembang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="jumbotron" id="beranda">
        <div class="container">
            <div class="row top">
                <div class="col-md-6 align-self-center justify-content-center d-flex">
                     <div class="Box">
                         <center>
                             <div class="judul">
                                 <h3>Salam salam dulu</h3>
                             </div>
                         </center>
                         <form action="store.php" method="post">
                            <div class="mb-4">
                                <label for="nama" class="form-label text-white">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" autofocus required>
                            </div>
                            <label for="pesan" class="form-label text-white">Pesan</label>
                            <textarea name="pesan" id="pesan" cols="30" rows="5" class="form-control" required></textarea>
    
                            <input type="submit" name="simpan" class="btn btn-success text-white mt-4" value="simpan">
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="jumbotron2">
    <div class="pesan-pesan text-white id="pesan_pesan">
        <center>
            <h2 class="mb-5 text-white">Pesan - Pesan</h2>
        </center>
        <div class="container">

        <?php
            require_once "koneksi.php";

            $sql = "SELECT *From pengunjung";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<div class='row justify-content-center mobile d-flex'>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='col-md-3 mb-3'>";
                            echo "<div class='Box2'>";
                                echo "Dari : ";
                                $nama = $row['nama'];
                                echo htmlspecialchars($nama);
                                echo "<br>";
                                echo "Pesan : ";
                                $pesan = $row['pesan'];
                                echo htmlspecialchars($pesan);
                            echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                         
                    mysqli_free_result($result);
                } else{
                    echo "<p class='lead text-center text-white'><em>Belum ada pesan nih!</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }


            // Close connection
            mysqli_close($link);
        ?>
        </div>
    </div>
</div>

    <footer id="pengembang">
        <div class="footerTetap fixed-bottom">
            <a href="https://www.instagram.com/arifinhabibi_" class="text-decoration-none  text-white">
                <img src="assets/img/ig.png" alt="">
                <h5>@arifinhabibi_</h5>
            </a>
        </div>
    </footer>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>