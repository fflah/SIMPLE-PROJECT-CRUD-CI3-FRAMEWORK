  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">Tambah Anggota</a>
      <?= $this->session->flashdata('message')?>
      <div class="card">            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nim</th>
                  <th>Alamat</th>
                  <th>Tgl Lahir</th>
                  <!-- <th>Status</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  ?>
                  <?php foreach ($mahasiswa as $mh) :?>
                  <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?= $mh['nama_anggota'];?></td>
                    <td><?= $mh['nim'];?></td>
                    <td><?= $mh['alamat'];?></td>
                    <td><?= $mh['ttl_anggota'];?></td>
                    <!-- <td><?//=$mh['status_anggota'];?></td> -->
                    <td>
                      <a data-toggle="modal" data-target="#editData<?php echo $i;?>" class="badge badge-pill badge-success" href="<?= base_url('mahasiswa/editData/'.$mh['nim']);?>"> edit</a>
                      <a onclick="javascript: return confirm('Anda yakin untuk menghapus?')" class="badge badge-pill badge-danger" href="<?= base_url('mahasiswa/deleteData/'.$mh['nim']);?>"> delete</a>
                    </td>
                    </td>
                  </tr> 
                  <?php $i++; ?>
                  <?php endforeach; ?>       
                </tbody>

                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nim</th>
                  <th>Alamat</th>
                  <th>Tgl Lahir</th>
                  <!-- <th>Status</th> -->
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahData">Tambah data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?= base_url('mahasiswa/addData');?>" method="post">
        <div class="modal-body">
            <div class="form-group">          
              <input type="text" class="form-control" name = "nama_anggota" id="nama_anggota" placeholder="Nama" required >
            </div>
            <div class="form-group">              
              <input type="text" class="form-control" name = "nim" id="nim" placeholder="Nim" required>
            </div>
            <div class="form-group">              
              <input type="text" class="form-control" name = "alamat" id="alamat" placeholder="Alamat" required>
            </div>
            <div class="form-group">              
              <input type="text" class="form-control datepicker" data-provide="datepicker" id="ttl_anggota" name="ttl_anggota" placeholder="Tanggal lahir" autocomplete="off" required>
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
            <!-- <div class="form-group">              
              <input type="text" class="form-control" name = "status_anggota" id="status_anggota" placeholder="Status anggota" >
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit data -->
<?php 
$no = 1;
foreach($mahasiswa as $i):
  $id = $i['id_anggota'];
  $nama = $i['nama_anggota'];
  $nim = $i['nim'];
  $alamat = $i['alamat'];
  $ttl = $i['ttl_anggota'];
  // $status = $i['status_anggota'];
?>
<div class="modal fade" id="editData<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editData">Edit data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('mahasiswa/updateData');?>" method="post">
        <div class="modal-body">
        
            <div class="form-group">    
            <input type="hidden" class="form-control" name = "id_anggota" id="id_anggota" placeholder="Nama" value="<?= $id; ?>" >      
              <input type="text" class="form-control" name = "nama_anggota" id="nama_anggota" placeholder="Nama" value="<?= $nama; ?>" >
            </div>
            <div class="form-group">              
              <input type="text" class="form-control" name = "nim" id="nim" placeholder="Nim" value="<?= $nim;  ?>">
            </div>
            <div class="form-group">              
              <input type="text" class="form-control" name = "alamat" id="alamat" placeholder="Alamat" value="<?= $alamat; ?>" >
            </div>
            <div class="form-group">              
              <input type="text" class="form-control datepicker" data-provide="datepicker" id="ttl_anggota" name="ttl_anggota" placeholder="Tanggal lahir" autocomplete="off" value="<?= $ttl; ?>">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
            <!-- <div class="form-group">              
              <input type="text" class="form-control" name = "status_anggota" id="status_anggota" placeholder="Status anggota" value="<?//= $status; ?>" >
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
           
      </form>

    </div>
  </div>
</div>
<?php
  $no++;  
  endforeach;
?>




<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script type="text/javascript">
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
});
var flash = '<?php echo $this->session->flashdata('message')?>';
if(flash != ""){
  setTimeout(function(){    
    $("#notif").slideUp(1000, function(){ $(this).remove() });
  }, 2000);
}
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>