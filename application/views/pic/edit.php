<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>PIC - Edit</title>
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
        PIC
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo set_url("pic"); ?>">PIC</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo show_alert(); ?>
      <form id="form1">
        <input type="hidden" name="id" value="<?php echo $edit->id; ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Add New</h3>

                <div class="box-tools pull-right">
                  <button onclick="saveForm()" type="button" name="button" class="btn btn-primary btn-sm"><i class="fa fa-save"></i></button>
                  <a href="<?php echo set_url("pic"); ?>" class="btn btn-default btn-sm" title="Back"><i class="fa fa-reply"></i></a>
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" title="minimaze/maximaze"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $edit->name; ?>" data-precision="0" required data-valid-label="Name">
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" name="email_address" id="email_address" value="<?php echo $edit->email_address; ?>" required data-valid-label="Email Address" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo $edit->address; ?>" required data-valid-label="Address" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $edit->phone_number; ?>" required data-valid-label="Phone Number" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Company</label>
                      <select class="form-control select2" name="company_id">
                        <option value="0">--- Select Company ---</option>
                        <?php foreach($company->result() as $row): ?>
                        <option value="<?php echo $row->id; ?>"<?php if($row->id == $edit->company_id): ?> selected <?php endif; ?>><?php echo $row->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active"  <?php if($edit->status=='active') echo ' selected'; ?>>Aktif</option>
                        <option value="inactive"  <?php if($edit->status=='inactive') echo ' selected'; ?>>InActive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button onclick="saveForm()" type="button" name="button" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo set_url("pic"); ?>" class="btn btn-default" title="Back"><i class="fa fa-reply"></i></a>
              </div>
            </div>
          </div>
        </div>
      </form>
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
function saveForm(){
  var f = $("#form1");

  if(!isValid("#name")) return;
  if(!isValid("#phone_number")) return;
  if(!isValid("#email_adress")) return;
  if(!isValid("#address")) return;

  $.ajax({
    url: '<?php echo set_url("pic", "save"); ?>',
    type: 'POST',
    dataType: 'JSON',
    beforeSend: function(){
      loadingSpinner.show();
    },
    data: f.serializeArray()
  })
  .done(function(response) {
    if(response.status == true){
      alertify.alert(response.message);
      messageBox("Alert", response.message, function(){ redirect('<?php echo set_url("pic"); ?>') });
    }else{
      alertify.error(response.message);
    }
  })
  .fail(function(response) {
    alertify.error('Error!');
  })
  .always(function() {
    loadingSpinner.hide();
  });
}


$(document).ready(function() {
  $(".select2").select2();
});
</script>

</body>
</html>
