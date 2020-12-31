  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengembalian Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Pengembalian Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">Tambah Data Pengembalian</a>
      <?= $this->session->flashdata('message')?>
      <div class="card">            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Kembali</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>ISBN</th>
                  <th>Judul Buku</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  <?php foreach ($pengembalian as $pg) :
                    
                  ?>
                  

                  <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?= date('d F Y', $pg['tgl_kembali']);?></td>
                    <td><?= $pg['nim_anggota'];?></td>
                    <td><?= $pg['nama_anggota'];?></td>
                    <td><?= $pg['isbn_buku'];?></td>
                    <td><?= $pg['judul_buku'];?></td>
                    <td>
                      <?php                         
                        if ($pg['kembali'] == 0) {
                         echo '<div class="badge badge-pill badge-success">Kembali</div>';
                       }else{
                         echo '<div class="badge badge-pill badge-success">kembali</div>';
                       }  
                      ?>
                    </td>
                    
                  </tr> 
                  <?php $i++; ?>
                  <?php endforeach; ?>  
                </tbody>

                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tanggal Kembali</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>ISBN</th>
                  <th>Judul Buku</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
      

    </section>
    <!-- /.content -->
  </div>


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
      
      <form action="<?= base_url('transaksi/addDataPengembalian');?>" method="post">
        <div class="modal-body">
            <div class="form-group">          
              <input type="text" class="form-control" name = "isbn_buku" id="isbn_buku" placeholder="ISBN" >
            </div>
            <div class="form-group">          
              <input type="text" class="form-control" name = "nim_anggota" id="nim_anggota" placeholder="NIM" >
            </div>            
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


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