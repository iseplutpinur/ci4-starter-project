<!DOCTYPE html>
<html lang="<?= config('App')->defaultLocale ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

  <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="theme-color" content="#343a40">
  <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">


  <title><?= $title ?? '' ?> | <?= config('Application')->appName ?></title>

  <!-- bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="/assets/template/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Render section boilerplate css -->
  <?= $this->renderSection('css') ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap">

</head>

<body class="layout-fixed layout-navbar-fixed sidebar-mini <?= config('Application')->theme['footer']['fixed'] ? 'layout-footer-fixed' : '' ?> <?= config('Application')->theme['body-sm'] ? 'text-sm' : '' ?>">
  <div class="wrapper">

    <!-- Navbar -->
    <?= $this->include('App\Views\layout\header') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('App\Views\layout\mainsidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?= $this->include('App\Views\layout\contentheader') ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <!-- <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div> -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <!-- <div class="float-right d-none d-sm-inline">
        <strong><a href="https://github.com/iseplutpinur/ci4-starter-project">Boilerplate</a></strong>
      </div> -->
      <!-- Default to the left -->
      <strong>&copy; <?= date('Y') ?> <a href="<?= config('Application')->theme['footer']['vendorlink'] ?>"><?= config('Application')->theme['footer']['vendorname'] ?></a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/assets/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/assets/template/dist/js/adminlte.js"></script>
  <!-- Preload Scriptt -->
  <script>
    $('.sidebar-toggle').on('click', function(event) {
      event.preventDefault();
      if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
        sessionStorage.setItem('sidebar-toggle-collapsed', '')
      } else {
        sessionStorage.setItem('sidebar-toggle-collapsed', '1')
      }
    });
    (function() {
      if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
        var body = document.getElementsByTagName('body')[0];
        body.className = body.className + ' sidebar-collapse'
      }
    })()
  </script>
  <!-- Render section boilerplate js -->
  <?= $this->renderSection('js') ?>
  <script>
    $.ajaxSetup({
      headers: {
        '<?= config('App')->CSRFHeaderName ?>': $('meta[name="<?= config('App')->CSRFTokenName ?>"]').attr('content')
      }
    })
  </script>
  <!-- Sweeat alert -->
  <script src="/assets/template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    <?php if (session('sweet-success')) { ?>
      Toast.fire({
        icon: 'success',
        title: '<?= session('sweet-success.') ?>'
      });
    <?php } ?>
    <?php if (session('sweet-warning')) { ?>
      Toast.fire({
        icon: 'warning',
        title: '<?= session('sweet-warning.') ?>'
      });
    <?php } ?>
    <?php if (session('sweet-error')) { ?>
      Toast.fire({
        icon: 'error',
        title: '<?= session('sweet-error.') ?>'
      });
    <?php } ?>
    // if (window.location.pathname == '/') {
    //   $(`.nav-item>.nav-link`).each(function() {
    //     if (this.innerText.trim() == 'Dashboard') {
    //       $(this).addClass('active');
    //     }
    //   })
    // }

    $(".btn-logout").click(function() {
      Swal.fire({
        title: 'Apakah anda yakin ingin keluar ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        inputAttributes: {
          id: "txt-note",
        },
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?= route_to('logout') ?>";
        }
      })
    })

    $("#dark-mode-switch").change(function() {
      setDarkMode(this.checked)
    })

    function setDarkMode(data) {
      data = data == 'null' ? false : ((typeof(data) == 'string') ? (data == 'false' ? false : true) : data);
      if (data) {
        $("body").addClass("dark-mode")
        $("#nav-top").removeClass("navbar-white")
        $("#nav-top").addClass("navbar-dark")
        $(".preloader").addClass("bg-dark")
        $("#dark-mode-switch-label").html('<i class="far fa-sun"></i>');
      } else {
        $("body").removeClass("dark-mode")
        $("#nav-top").removeClass("navbar-dark")
        $(".preloader").removeClass("bg-dark")
        $("#nav-top").addClass("navbar-white")
        $("#dark-mode-switch-label").html('<i class="far fa-moon"></i>');
      }
      localStorage.setItem('isDarkMode', data);
      document.querySelector("#dark-mode-switch").checked = data;
    }
    setDarkMode(localStorage.getItem('isDarkMode'));
  </script>
</body>

</html>