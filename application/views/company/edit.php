<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Company's - Edit</title>
  <?php echo assets_top(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php echo page_header(); ?>
  <?php echo page_sidebar(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company's
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo set_url("company"); ?>">Company's</a></li>
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
                <h3 class="box-title">Edit Data</h3>

                <div class="box-tools pull-right">
                  <button onclick="saveForm()" type="button" name="button" class="btn btn-primary btn-sm"><i class="fa fa-save"></i></button>
                  <a href="<?php echo set_url("company"); ?>" class="btn btn-default btn-sm" title="Back"><i class="fa fa-reply"></i></a>
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" title="minimaze/maximaze"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $edit->name; ?>" required data-valid-label="Nama" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $edit->phone_number; ?>" required data-valid-label="Phone Number" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo $edit->address; ?>" required data-valid-label="Address" minlength="1">
                    </div>
                    <div class="form-group">
                      <label>Logo</label>
                      <br>
                      <center><img src="<?php echo base_url("files/" . $edit->logo); ?>" alt="" height="50"></center> <br>
                      <p class="text-warning">Kosongkan jika tidak ingin mengubah logo.</p>
                      <input type="file" class="form-control" name="logo" id="logo" value="">
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
                <a href="<?php echo set_url("company"); ?>" class="btn btn-default" title="Back"><i class="fa fa-reply"></i></a>
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
  if(!isValid("#address")) return;

  var formData = new FormData($("#form1")[0]);

  $.ajax({
    url: '<?php echo set_url("company", "save"); ?>',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
      loadingSpinner.show();
    },
    data: formData
  })
  .done(function(response) {
    if(response.status == true){
      alertify.alert(response.message);
      messageBox("Alert", response.message, function(){ redirect('<?php echo set_url("company"); ?>') });
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
</script>

</body>
</html>
