
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SI PROKER OSIS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/1.jpg">
          </div>
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          SI PROKER OSIS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./mskdata.html">
              <i class="nc-icon nc-align-left-2"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./mskdata.html">
              <i class="nc-icon nc-user-run"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Halaman Utama</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- Content -->
      <div class="content">
        <div class="row">
          <!-- Button Tambah Proposal -->
          <div class="col-md-12">
            <button class="btn btn-primary mb-4" onclick="document.getElementById('proposalForm').style.display = 'block';">
              Tambah Proposal
            </button>
          </div>

          <!-- Form Tambah Proposal -->
          <div id="proposalForm" style="display: none;" class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form action="/add-proposal" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                  </div>
                  <div class="form-group">
                    <label for="situs_kegiatan">Situs Kegiatan</label>
                    <input type="text" class="form-control" id="situs_kegiatan" name="situs_kegiatan" required>
                  </div>
                  <div class="form-group">
                    <label for="tempat_kegiatan">Tempat Kegiatan</label>
                    <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" required>
                  </div>
                  <div class="form-group">
                    <label for="penyelenggara">Penyelenggara</label>
                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                  </div>
                  <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                  </div>
                  <div class="form-group">
                    <label for="dana_keluar">Dana Keluar</label>
                    <input type="number" class="form-control" id="dana_keluar" name="dana_keluar" required>
                  </div>
                  <div class="form-group">
                    <label for="proposal">Upload Proposal</label>
                    <input type="file" class="form-control-file" id="proposal" name="proposal" required>
                  </div>
                  <button type="submit" class="btn btn-success">Tambah</button>
                  <button type="button" class="btn btn-secondary" onclick="document.getElementById('proposalForm').style.display = 'none';">Batal</button>
                </form>
              </div>
            </div>
          </div>

        <!-- Display Data -->
@foreach ($users as $user)
<div class="col-md-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $user->kegiatan }}</h5>
      <p class="card-text">Tanggal Kegiatan: {{ $user->tanggal_kegiatan }}</p>
      <p class="card-text">Situs Kegiatan: {{ $user->situs_kegiatan }}</p>
      <p class="card-text">Tempat: {{ $user->tempat_kegiatan }}</p>
      <p class="card-text">Penyelenggara: {{ $user->penyelenggara }}</p>
      <p class="card-text">Keterangan: {{ $user->keterangan }}</p>
      <p class="card-text">Jam Mulai: {{ $user->jam_mulai }}</p>
      <p class="card-text">Jam Selesai: {{ $user->jam_selesai }}</p>
      <p class="card-text">Dana Keluar: {{ $user->dana_keluar }}</p>
      <p class="card-text">
        Proposal: <a href="{{ url('proposals/' . $user->proposal) }}" target="_blank">Lihat Proposal</a>
      </p>
      <p class="card-footer text-muted">Dibuat pada: {{ $user->created_at }}</p>

     <!-- Tombol Edit -->
<a href="{{ route('mskdata.edit', $user->id_mskdata) }}" class="btn btn-warning">Edit</a>

       <!-- Tombol Hapus -->
       <form action="{{ route('mskdata.destroy', $user->id_mskdata) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
      </form>

    </div>
  </div>
</div>
@endforeach


        </div>
      </div>
      <!-- End Content -->

      <footer class="footer footer-black footer-white">
        <div class="container-fluid">
          <div class="credits ml-auto">
            <span class="copyright">
              © <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>
