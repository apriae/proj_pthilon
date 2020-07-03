
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css'); ?>">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/all.css'); ?>">
<!-- Alertify -->
<link rel="stylesheet" href="<?php echo base_url('plugins/alertifyjs/css/alertify.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('plugins/alertifyjs/css/themes/default.min.css'); ?>">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.css'); ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/select2/dist/css/select2.min.css'); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('dist/css/styles.css?t='.time()); ?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('dist/css/skins/_all-skins.min.css'); ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

<!-- <link rel="stylesheet" href="<?php echo base_url('bower_components/jquery-ui/themes/base/jquery-ui.min.css'); ?>"> -->

<!-- jQuery 3 -->
<!-- <script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php echo base_url('bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script> -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<script>
  var baseUrl = '<?php echo base_url(); ?>';
</script>

<style>
  .ui-draggable, .ui-droppable {
    background-position: top;
  }
  .cke-elfinder, .ui-dialog{
    position: fixed;
    z-index: 99999999 !important;
  }

  .ui-dialog-content{
    padding: 0 !important;
    height: 450px !important;
  }
</style>

<style media="screen">
  .line-separator{
    margin-top: 5px;
    margin-bottom: 5px;
    border: 1px solid #ddd;
  }
  .content-header h1{
    padding-bottom: 15px;
    border-bottom: 1px solid #ddd;
  }
  .wrapper{
    display: none;
  }
  .modal-full{
    margin-left: 15px;
    margin-right: 15px;
    width: auto;
  }
</style>
<style media="screen">
  .cke_wysiwyg_frame{
    padding: 5px !important;
  }
</style>
