<?php
include '../login/db_login.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <script language="javascript" type="text/javascript">
        window.history.forward();
        </script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Tokel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index_admin.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="barang.php">Barang</a></li>
                    </ul>
                    <form class="d-flex">
                    <a href="../login/logout.php " class="link-light  text-decoration-none btn btn-danger form-control mt-1">Logout</a>
                    </form>
                </div>
            </div>
        </nav>
         <!--carousel-->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/slide1.jpg" class="d-block w-100" alt="gambar1" style="height:450px">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="text-white" style=" font-family: roboto;">Selamat Datang Admin Kita Tercinta</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/slide2.jpg" class="d-block w-100" alt="gambar2" style="height:450px">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="text-white" style=" font-family: roboto;">Selalu Berdoa dan Utamakan kerja Cerdas</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/slide3.jpg" class="d-block w-100" alt="gambar3" style="height:450px">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="text-white" style=" font-family: roboto;">Selalu Bersemangat dan Terus Berkarya Demi Website Yang Terbaik</h3>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <div id="message"></div>
                <div class="row mt-2 pb-3">
                <?php
                        include '../login/db_login.php';
                        $stmt = $db->prepare('SELECT * FROM barang');
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()):
                    ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card-deck">
                    <div class="card p-2 border-secondary mb-2">
                        <img src="<?= $row['gambar_barang'] ?>" class="card-img-top" height="250">
                        <div class="card-body p-1">
                        <h4 class="card-title text-center"><?= $row['nama_barang'] ?></h4>
                        <h5 class="card-text text-center text-danger"><i class="fa-regular">Rp</i>&nbsp;&nbsp;<?= number_format($row['harga_barang'],2) ?>/-</h5>

                        </div>
                        <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <div class="row p-2">
                            <div class="col-md-6 py-1 pl-4">
                                <b>Quantity : </b>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control pqty" value="<?= $row['stok_barang'] ?>">
                            </div>
                            </div>
                            <input type="hidden" class="pid_barang" value="<?= $row['id_barang'] ?>">
                            <input type="hidden" class="pname" value="<?= $row['nama_barang'] ?>">
                            <input type="hidden" class="pprice" value="<?= $row['harga_barang'] ?>">
                            <input type="hidden" class="pimage" value="<?= $row['gambar_barang'] ?>">
                            <input type="hidden" class="pkategori" value="<?= $row['kategori_barang'] ?>">
                            <div class="text-center"><a class="btn btn-warning mt-auto" href="edit_barang.php?idedit=<?php echo $row['id_barang']?>">Edit</a></div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Tokel 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
