<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Jumlah Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() . 'user/anggota'; ?>">
                                <i class="fas fa-users fa-3x text-warning"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Stok Buku Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ["stok != 0"];
                                $totalStok = $this->ModelBuku->total("stok", $where);
                                echo $totalStok;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() . 'buku'; ?>">
                                <i class="fas fa-book fa-3x text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Buku Yang Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ["dipinjam != 0"];
                                $totalDipinjam = $this->ModelBuku->total("dipinjam", $where);
                                echo $totalDipinjam;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() . 'user'; ?>">
                                <i class="fas fa-user-tag fa-3x text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Buku Yang Dibooking</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ["dibooking != 0"];
                                $totalDibooking = $this->ModelBuku->total("dibooking", $where);
                                echo $totalDibooking;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() . 'user'; ?>">
                                <i class="fas fa-shopping-cart fa-3x text-danger"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr class="sidebar-divider">

    <div class="row">
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-primary mt-2 ">Data user</span>
                <a class="text-danger" href="<?php echo base_url('user/data_user'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div><!-- controller user fungsi data_user-->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Memeber sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anggota as $a) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('d F Y', strtotime($a['tanggal_input'])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-book text-warning mt-2 ">Data Buku</span>
                <a class="text-danger" href="<?php echo base_url('buku'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
            </div><!-- controller user fungsi data_user-->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>ISBN</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($buku as $b) {
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $b['judul_buku']; ?></td>
                        <td><?= $b['pengarang']; ?></td>
                        <td><?= $b['penerbit']; ?></td>
                        <td><?= $b['tahun_terbit']; ?></td>
                        <td><?= $b['isbn']; ?></td>
                        <td><?= $b['stok']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of row table-->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->