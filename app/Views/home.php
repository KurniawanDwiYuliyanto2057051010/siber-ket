<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    .judul {
      margin-top: 200px;
      margin-right: 200px;
    }

    .siber-ket {
      margin-left: 5px;
    }
  </style>

</head>

<body>
  <div class="container justify-text-center">
    <div class="row">
      <div class="col-lg-5">
        <p class="fs-2 judul"><strong><br><i>Siber-ket</i></strong></p>
        <p>Mari menjadi member minimarket kami dan dapatkan penawaran misterius lainnya</p>
      </div>
      <div class="col-lg-7">
        <img class="fs-2 siber-ket" src="/Assets/AdminLTE-3.2.0/img/Siber-ket-gambar-karyawan.png" alt="Foto hilang" width="750px">
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>

<?= $this->endSection(); ?>