  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">Tambah Buku</a>
      <?= $this->session->flashdata('message')?>
      <div class="card">            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>ISBN</th>
                  <th>Kategori</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($dataBuku as $bk) :?>
                  <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?= $bk['judul_buku'];?></td>
                    <td><?= $bk['isbn'];?></td>
                    <td><?= $bk['nama_kategori'];?></td>
                    <td><?= $bk['pengarang'];?></td>
                    <td><?= $bk['penerbit'];?></td>
                    <td> <?php 
                         if ($bk['status_id'] == '0') {
                          echo '<div class="badge badge-pill badge-warning">dipinjam</div>';
                        }elseif ($bk['status_id'] == '1') {
                          echo '<div class="badge badge-pill badge-info">tersedia</div>';
                        }  
                      ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#editData<?php echo $i;?>" href="<?= base_url('buku/editData/'.$bk['id_buku']);?>"> <i class="fas fa-edit"></i> &nbsp;&nbsp;   </a>
                      <a onclick="javascript: return confirm('Anda yakin untuk menghapus?')"  href="<?= base_url('buku/deleteDataBuku/'.$bk['id_buku']);?>"> <i class="fas fa-trash-alt"></i> </a>
                    </td>
                    </td>
                  </tr> 
                  <?php $i++; ?>
                  <?php endforeach; ?>       
                </tbody>

                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>ISBN</th>
                  <th>Kategori</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Status</th>
                  <th>Aksi</th>
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
      
      <form action="<?= base_url('buku/addDataBuku');?>" method="post">
        <div class="modal-body">
            <div class="form-group">          
              <input type="text" class="form-control" name = "isbn" id="isbn" placeholder="ISBN" >
            </div>
            <div class="form-group">          
              <input type="text" class="form-control" name = "judul_buku" id="judul_buku" placeholder="Judul" >
            </div>

            <div class="form-group">
              <select name="kategori_id" class="form-control">
                <option value="">Pilih Kategori</option>
                
                <?php foreach ($kategori as $mkategori){
                  $idKategori = $mkategori['id_kategori'];
                  $namaKategori = $mkategori['nama_kategori'];
                  echo '<option value="'.$idKategori.'">'.$namaKategori.'</option>';
                  }
                ?>
              </select>
          </div>
          <div class="form-group">              
            <input type="text" class="form-control" name = "pengarang" id="pengarang" placeholder="Pengarang" >
          </div>            
          <div class="form-group">              
            <input type="text" class="form-control" name = "penerbit" id="penerbit" placeholder="Penerbit" >
          </div>
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
foreach($dataBuku as $i):
  $id = $i['id_buku'];
  $isbn = $i['isbn'];
  $judul = $i['judul_buku'];
  $mkategori = $i['id_kategori'];
  $pengarang = $i['pengarang'];
  $penerbit = $i['penerbit'];
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

      <form action="<?= base_url('buku/updateDataBuku');?>" method="post">
      <div class="modal-body">
            <div class="form-group">                        
              <input type="text" class="form-control" name = "isbn" id="isbn" placeholder="ISBN" value="<?= $isbn;?>" >
            </div>
            <div class="form-group">          
              <input type="hidden" class="form-control" name = "id_buku" id="id_buku" placeholder="Judul" value="<?= $id;?>" >
              <input type="text" class="form-control" name = "judul_buku" id="judul_buku" placeholder="Judul" value="<?= $judul?>" >
            </div>
            <div class="form-group">
              <select name="kategori_id" class="form-control">
                <option value="">Pilih Kategori</option>                
                <?php
                  
                   for ($x = 0; $x < count($kategori); $x++) {
                    $namaKategori =  $kategori[$x]['nama_kategori'];
                    $idKategori =  $kategori[$x]['id_kategori'];

                    
                    if ($mkategori == $idKategori){
                      echo "<option value='$idKategori' selected>$namaKategori</option>";
                    } else {
                      echo "<option value='$idKategori'>$namaKategori</option>";

                    }
                    
                  }
                ?>
                
                
              </select>
          </div>
            <div class="form-group">              
              <input type="text" class="form-control" name = "pengarang" id="pengarang" placeholder="Pengarang" value="<?= $pengarang;?>" >
            </div>            
            <div class="form-group">              
              <input type="text" class="form-control" name = "penerbit" id="penerbit" placeholder="Penerbit" value="<?= $penerbit;?>">
            </div>
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