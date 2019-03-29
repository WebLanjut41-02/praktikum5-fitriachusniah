<!DOCTYPE html>
<html>

<head>
  <title>DATA MAHASISWA</title>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <center>
  <div class="wrapper">

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?php echo site_url('mahasiswa'); ?>">DATA MAHASISWA
        </a>
        <!--<small>advanced tables</small>-->
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!--<h3 class="box-title">Data Table With Full Features</h3>-->

               <div class="tombol">
                    <a href="<?php echo site_url('mahasiswa/inputmahasiswa'); ?>">Tambah Data
                    </a>
                    <br><br>
                    <form action="<?php echo base_url(); ?>mahasiswa/listPencarian" method="post">
                      <input type="text" name="keyword" placeholder="Cari ...">
                      <input type="submit" name="submit" value="Cari Data">
                    </form>
                    <br>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <center>
              <table border="1">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM.</th>
                  <th>Nama Mahasiswa</th>
                  <th>Tanggal Lahir</th>
                  <th>IPK</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                 <?php
                 $no = $this->uri->segment('3') + 1;
		               foreach($mahasiswa as $data){
                // $dataMenu = $this->session->all_data;
                // foreach ($dataMenu as $data) {
            ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->nim; ?></td>
                <td><?php echo $data->nama; ?></td>
                <td><?php echo $data->tgl_lahir; ?></td>
                <td><?php echo $data->ipk; ?></td>
                <td><?php echo $data->kelas; ?></td>
                <td>
                  <center>
                    <a href="<?php echo base_url(); ?>mahasiswa/editmahasiswa?nim=<?php echo $data->nim ?>" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> Edit |</a>
                    <a href="<?php echo base_url(); ?>mahasiswa/deletemahasiswa?nim=<?php echo $data->nim ?>" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> Delete</a>
                  </center>
                  </td>
              </tr>
            <?php } ?>
                </tbody>

              </table>
              <br/>
            	<?php
            	echo $this->pagination->create_links();
            	?>
            </center>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</center>
</body>
</html>
