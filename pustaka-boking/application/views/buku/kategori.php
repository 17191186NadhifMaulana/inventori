<!-- Begin Page Content -->
<div class="container-fluid">
    <?=$this->session->flashdata('pesan');?>
    <div class="row"><!-- cek sesi -->
        <div class="col-lg-3">
             <?php if(validation_errors()){?>
                 <div class="alert alert-danger"role="alert">
                     <?=validation_errors();?>
                 </div>
             <?php } ?><!-- tampilkan data -->
             <?=$this->session->flashdata("pesan");?><!-- pesan input -->
             <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategoriBaruModal">
                 <i class="fas fa-file-alt"></i>Tambah Kategori </a>
             <table class="table table-hover"><!-- button -->
             <thead>
     <tr>
         <th scope="col">No</th>
         <th scope="col">Kategori</th>
         <th scope="col">Pilihan</th>
    <?php
    $a=1;
     foreach($kategori as $k) { ?>
         <tr><!-- tampil no -->
     </tr>
</thead>
<tbody>
              <th scope="row"><?=$a++;?></th>
              <td><?=$k['kategori']; ?></td><!-- tampil kategori -->
              <td><!-- button ubah dan hapus -->
        <a href="<?= base_url("buku/ubahKategori/"). $k['id_kategori']; ?>"
        class="badge badge-info"><i class="fas fa-edit"></i>Ubah </a>
        <a href="<?= base_url('buku/hapuskategori/') . $k['id_kategori']; ?>"
        onclick="return confirm('Kamu yakin akan menghapus<?-$judul .''.$k['kategori'];?> ?');"
        class="badge badge-danger"><i class="fas fa-trash"></i>Hapus </a>
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah kategori baru -->
<div class="modal fade"id="kategoriBaruModal"tabindex="-1"role="dialog"
aria-labelledby="kategoriBaruModalLabel"aria-hidden="true">
    <div class="modal-dialog"role="document">
        <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title"id="kategoriBaruModalLabel">Tambah Kategori</h5>
                 <button type="button"class="close"data-dismiss="modal"aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                 </button><!-- css toggle -->
             </div>
             <form action="<?=base_url('buku/kategori');?>"method="post">
                 <div class="modal-body">
                     <div class="form-group">
                     <input type="text"name="kategori"id="kategori"placeholder="Masukkan Nama Kategori"
class="form-control form-control-user">
</div>
</div>
<div class="modal-footer">
<button type="button"class="btn btn-secondary"data-dismiss="modal"><i
class="fas fa-ban"></i>Close</button>
<button type="submit"class="btn btn-primary"><i
class="fas fa-plus-circle"></i>Tambah</button>
</div>
</form>
</div>
</div>
</div>
<!-- End of Modal Tambah Mneu -->