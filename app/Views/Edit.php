<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi CRUD!</title>
    <link type="text/css" href="<?= base_url();  ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLES -->


</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#BFDCE5;">
        <div class="container">
            <a class="navbar-brand" href="#">CLLAU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="<?= base_url('tambah') ?>">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <form method="post" action="<?= base_url('Tambah/update'); ?>">
            <?= csrf_field(); ?>
            <div class="form-group">

                <input type="hidden" name="id" value="<?= $karyawan->id; ?>">
                <label for="exampleInputNama1">Nama</label>
                <input type="text" class="form-control" id="exampleInputNama1" name="nama" value="<?= $karyawan->nama; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTanggal1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleInputTanggal1" name="tanggal_lahir" value="<?= $karyawan->tanggal_lahir; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputGaji1">Gaji</label>
                <input type="text" class="form-control" id="exampleInputGaji1" name="gaji" value="<?= $karyawan->gaji; ?>">
            </div>
            <label for="exampleRadios2">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="exampleRadios2" value="1" name="status" <?php if ($karyawan->status == "1") {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                <label class="form-check-label" for="exampleRadios2">
                    Aktif
                </label>
                <br>
                <input class="form-check-input" type="radio" id="exampleRadios2" value="0" name="status">
                <label class="form-check-label" for="exampleRadios2">
                    Tidak Aktif
                </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>