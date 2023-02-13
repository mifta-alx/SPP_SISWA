<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPP SISWA - <?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/fontawesome-free-5.15.2/css/fontawesome.min.css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" media="all">
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/template/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?= base_url() ?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/sweetalert2/sweetalert2.css">
  <!-- Toast-->
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/toastr/toastr.min.css">
  <!-- LINE AWESOME -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/line-awesome/css/line-awesome.min.css">
  <!-- FEATHER -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/feather-icons/feather.css" rel="stylesheet" />
  <!-- CORK TEMPLATE -->
  <!-- <link href="<?= base_url() ?>/template/assets1/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" /> -->
  <link href="<?= base_url() ?>/template/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
  <!-- datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/vendor/bootstrap-datepicker/css/datepicker.css">
  <?php if ($title == 'Settings') { ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/plugins/dropify/dropify.min.css">
    
  <?php } ?>
  <style>
    table {
      text-align: center;
      border-collapse: collapse;
      border-spacing: 2px;
      border-top: none;
    }

    th {
      color: black;
      font-weight: 500;
    }

    td {
      color: black;
      font-weight: 300;
    }

    body {
      /* font-family: 'Nunito', sans-serif; */
      font-family: Poppins, sans-serif;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">