<!DOCTYPE html>
<html>

<head>
  <title>EDIT MAHASISWA</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">


   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT DATA MAHASISWA
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
                    <a href="<?php echo site_url('mahasiswa'); ?>"><button type="submit" class="btn btn-primary">  <i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table>
                <form role="form" action="<?php echo base_url(); ?>mahasiswa/proseseditmahasiswa" method="post" enctype="multipart/form-data">

                    <tr>
                      <div class="form-group">
                        <td><label for="nim">NIM</label></td>
                        <td>:</td>
                        <td><input type="text" id="NIM" name="nim" value="<?php echo $data[0]->nim ?>" readonly></td>
                      </div>
                    </tr>

                    <tr>
                      <div class="form-group">
                        <td><label>Nama Mahasiswa</label></td>
                        <td>:</td>
                        <td><input type="text" class="form-control" id="Nama_Mahasiswa" name="nama" value="<?php echo $data[0]->nama ?>" required></td>
                      </div>
                    <tr>

                    <tr>
                      <div class="form-group">
                        <td><label>Tgl Lahir</label><td>

                        <td><input type="date" class="form-control" id="Tanggal_Lahir" name="tgl_lahir" value="<?php echo $data[0]->tgl_lahir ?>" required></td>
                      </div>
                    </tr>

                    <tr>
                      <div class="form-group">
                          <td><label>IPK</label></td>
                          <td>:</td>
                          <td><input type="text" name="ipk" value="<?php echo $data[0]->ipk ?>" ></td>
                        </div>
                    </tr>

                    <tr>
                      <div class="form-group">
                          <td><label>Kelas</label></td>
                          <td>:</td>
                          <td><select name="kelas" class="form-control select2" style="width: 100%;" required="">
                            <option selected="selected">==PILIH===</option>
                            <option value="42-01" <?php if($data[0]->kelas=="42-01") echo "selected";?>>42-01</option>
                            <option value="42-02" <?php if($data[0]->kelas=="42-02") echo "selected";?>>42-02</option>
                          </select></td>
                        </div>
                    </tr>

                    <tr>
                      <td colspan="3"> <div class="tombol">
                            <button type="submit" class="btn btn-primary">INPUT DATA</button>
                        </div></td>
                    </tr>


                <!-- /.box-body -->


              </form>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

</body>
</html>
