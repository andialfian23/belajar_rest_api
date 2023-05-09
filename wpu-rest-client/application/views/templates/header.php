<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>bootstrap/dist/css/bootstrap.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <title><?php echo $judul; ?>
  </title>
</head>

<body>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          CI App
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= base_url(); ?>" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="<?= base_url(); ?>mahasiswa" class="nav-link px-2 link-dark">Mahasiswa</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>
      </div>
    </div>
  </header>