
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profil </a></li>
        <li class="active">Profil Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>/asset/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">User</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Pengikut</b></b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Ikuti</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Teman</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Ikuti</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

              <p class="text-muted">
                Menempuh pendidikan S3 Manajeman Informatika di IAIN Batusangkar Tahun 2014- 2017
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">Limo Kaum, Batusangkar</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Keahlian</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Note</strong>

              <p>Harus Wisuda tahun ini juga kalau tidak dosennya tewas</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
              <li><a href="#settings" data-toggle="tab">Data Pengguna</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
            
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="nama"class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="email" disabled="disabled" class="form-control" id="inputName" placeholder="Widya">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" disabled="disabled"class="form-control" id="inputEmail" placeholder="Widya@gmail.com">
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="agama" class="col-sm-2 control-label">Agama</label>
    
                        <div class="col-sm-10">
                          <input type="text" disabled="disabled"class="form-control" id="inputagama" placeholder="Islam">
                        </div>
                      </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <input type="text"disabled="disabled" class="form-control" id="inputName" placeholder="Batusangkar">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pendidikan" class="col-sm-2 control-label">Pendidikan</label>

                    <div class="col-sm-10">
                      <textarea disabled="disabled"class="form-control" id="inputExperience" placeholder="IAIN Batusangkar"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keahlian" class="col-sm-2 control-label">Keahlian</label>

                    <div class="col-sm-10">
                      <input type="text"disabled="disabled" class="form-control" id="inputSkills" placeholder="Main bola">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Edit Profil</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>