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
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gaji</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($karyawan as $isi) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $isi['nama']; ?></td>
                        <td><?= $isi['tanggal_lahir']; ?></td>
                        <td>Rp<?= number_format($isi['gaji']); ?></td>
                        <td>
                            <?php if ($isi['status'] == "1") {
                                echo "aktif";
                            } else {
                                echo "tidak aktif";
                            } ?>
                        </td>
                        <td>
                            <a href="<?= base_url('edit/' . $isi['id']); ?>" class="btn btn-success">
                                Edit</a>
                            <a href="<?= base_url('hapus/' . $isi['id']); ?>" onclick="javascript:return confirm('Yakin mau hapus?')" class="btn btn-danger">
                                Hapus</a>

                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>

</body>

</html>