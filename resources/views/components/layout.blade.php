<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CoLearn</title>

  <link href="{{asset('assets log/rel_icon_helpmatch.png')}}" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <script src="https://kit.fontawesome.com/aad4ebe7ad.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap Bundle (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    * {
    box-sizing: border-box; /* Menghitung padding dan margin dalam lebar dan tinggi elemen */
    }
    body {
    overflow-x: hidden; /* Menonaktifkan scroll horizontal */
    }
    .table {
        border-radius: 10px; /* Membulatkan sudut tabel */
        overflow: hidden;
    }

    .table th, .table td {
        vertical-align: middle; /* Menyelaraskan teks di tengah */
        padding: 15px; /* Spasi internal */
    }

    .badge {
        padding: 10px 15px;
        font-size: 14px;
        border-radius: 20px;
    }

    .btn {
        border-radius: 5px; /* Membulatkan tombol */
    }

    .btn i {
        margin-right: 5px; /* Spasi ikon */
    }

    .search-btn {
      font-size: 9px;
      padding: 4px 8px;
      line-height: 1.2;
    }

    .card-dashboard {
        border: 2px solid black; /* Menebalkan border */
        border-radius: 10px; /* Membuat ujung border sedikit melengkung */
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Memberikan efek shadow */
        padding: 20px; /* Menambahkan jarak di dalam kartu */
        margin: 20px; /* Menambahkan jarak di luar kartu */
    }

    .card-dashboard2 {
    border: 2px solid black; /* Menebalkan border */
    border-radius: 10px; /* Membuat ujung border sedikit melengkung */
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Memberikan efek shadow */
    padding: 20px; /* Menambahkan jarak di dalam kartu */
    margin: 20px; /* Menambahkan jarak di luar kartu */
    width: 80%; /* Mengatur lebar card menjadi 80% dari elemen induknya */
    max-width: 546px; /* Memberikan batas maksimal lebar card */
    }

    .d-flex {
        display: flex;
    }

    #current-time-card {
        min-width: 250px; /* Ensures the time box is large enough */
    }

    .dropdown {
    position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%; /* Dropdown muncul di bawah tombol */
        left: 0;
        z-index: 10;
        min-width: auto; /* Atur agar tidak default Bootstrap */
        width: auto; /* Sesuaikan otomatis dengan konten */
        max-width: 88px; /* Batas maksimal dropdown */
        padding: 5px 10px; /* Atur padding untuk tampilan lebih rapi */
    }

    .form-search {
    margin-left: auto; /* Pastikan elemen search tetap berada di sisi kanan */
    }

    .info-box {
      border-radius: 10px;
      padding: 20px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: -10px 0;
    }
    .info-box .icon {
      font-size: 2rem;
    }
    .info-box .details {
      text-align: right;
    }
    .info-box a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-size: 0.9rem;
    }
    .info-box a:hover {
      text-decoration: underline;
    }

    .info-box2 {
      border-radius: 10px;
      padding: 20px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: -20px 0;
    }
    .info-box2 .icon {
      font-size: 2rem;
    }
    .info-box2 .details {
      text-align: right;
    }
    .info-box2 a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-size: 0.9rem;
    }
    .info-box2 a:hover {
      text-decoration: underline;
    }
</style>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar (kita pecah beri nama header.blade.php) --> 
    @include('components.header') <!-- file terdapat di folder admin/header.blade.php -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container  (kita pecah beri nama sidebar.blade.php)  -->
    @include('components.sidebar') <!-- file terdapat di folder admin/sidebar.blade.php -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>{{ $title ?? 'Blank Page' }} </h1> <!-- artinya jika titlenya tidak di kirim maka isinya blank page -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('halaman_utama') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $breadcrumb_active ?? 'Blank Page' }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-pasien">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
         {{ $slot }}
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- (kita pecah beri nama footer.blade.php) -->
    @include('components.footer') <!-- file terdapat di folder admin/footer.blade.php -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/js/demo.js')}}"></script>
</body>
</html>
