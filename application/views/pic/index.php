<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>PIC</title>
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
        Manage PIC's
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage PIC's</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo show_alert(); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">PIC's Data</h3>
              <div class="box-tools pull-right">
                <a href="<?php echo set_url("pic", "add"); ?>" class="btn btn-primary btn-sm" title="Add New"><i class="fa fa-file-o"></i></a>
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" title="minimaze/maximaze"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table class="table table-bordered table-hover" id="table1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Tgl Update</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data_pic->result() as $row): ?>
                  <tr>
                    <td>
                      <span class="row-title text-center"><?php echo $row->name; ?></span>
                      <span class="row-action">
                        <a href="<?php echo set_url("pic", "edit") . "?id=" . $row->id; ?>">Edit</a> |
                        <a href="<?php echo set_url("pic", "delete") . "?id=" . $row->id; ?>" class="text-danger" onclick="return confirm('Delete?');">Delete</a> |
                        <?php if ($row->status == "inactive"): ?>
                        <a href="<?php echo set_url("pic", "set_status") . "?id=" . $row->id . "&status=active"; ?>" onclick="return confirm('Set Active?');">Set Active</a>
                        <?php else: ?>
                        <a href="<?php echo set_url("pic", "set_status") . "?id=" . $row->id . "&status=inactive"; ?>" class="text-warning" onclick="return confirm('Set Inactive?');">Set Inactive</a>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td><?php echo $row->email_address; ?></td>
                    <td><?php echo $row->phone_number; ?></td>
                    <td><?php echo $row->company_name; ?></td>
                    <td class="text-center"><?php echo strtoupper($row->status); ?></td>
                    <td class="text-center"><?php echo $row->date_modified; ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo page_footer(); ?>

  <?php echo page_sidebar_control(); ?>
</div>
<!-- ./wrapper -->
<?php echo assets_bottom(); ?>

<script>
var table1;
$(function () {
  table1 = $('#table1').DataTable({
    "bDestroy": true,
    "stateSave": true,
  });
})
</script>

</body>
</html>
