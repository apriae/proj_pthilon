<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <?php echo assets_top(); ?>
</head>
<body class="hold-transition <?php echo $this->config->item("admin_theme"); ?> sidebar-mini">
<div class="wrapper">
  <?php echo page_header(); ?>
  <?php echo page_sidebar(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo show_alert(); ?>

      <h1>Shortcut</h1>

      <a href="<?php echo set_url("company"); ?>" class="btn btn-primary btn-lg">Manage Company</a>
      <a href="<?php echo set_url("pic"); ?>" class="btn btn-primary btn-lg">Manage PIC</a>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo page_footer(); ?>

  <?php echo page_sidebar_control(); ?>
</div>
<!-- ./wrapper -->
<?php echo assets_bottom(); ?>
</body>
</html>
