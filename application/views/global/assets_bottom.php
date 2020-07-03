<!-- DataTables -->
<script src="<?php echo base_url('bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
<!-- Alertify -->
<script src="<?php echo base_url('plugins/alertifyjs/alertify.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/alertifyjs/alertify.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
<!-- Number Format -->
<script src="<?php echo base_url('dist/js/number-func.js?time='.time()); ?>"></script>
<script src="<?php echo base_url('dist/js/app.js?time='.time()); ?>"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
  $(".wrapper").hide();
  loadingSpinner.show();

  $(document).ready(function() {
    $(".wrapper").fadeIn("fast", function() {

      loadingSpinner.hide();
    });
  });
</script>

<!-- Elfinder -->
<link rel="stylesheet" href="<?php echo base_url("elfinder/css/elfinder.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("elfinder/css/theme.css"); ?>">
<script src="<?php echo base_url("elfinder/js/elfinder.min.js"); ?>" charset="utf-8"></script>
<!-- CK Editor -->
<script src="<?php echo base_url("bower_components/ckeditor/ckeditor.js"); ?>"></script>

<script>
// CKEditor 4
CKEDITOR.editorConfig = function( config ) {

  // Define changes to default configuration here.
  // For complete reference see:
  // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

  // The toolbar groups arrangement, optimized for two toolbar rows.
  config.toolbarGroups = [
    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
    { name: 'links' },
    { name: 'insert' },
    { name: 'forms' },
    { name: 'tools' },
    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'others' },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
    { name: 'styles' },
    { name: 'colors' },
    { name: 'about' }
  ];

  // Remove some buttons provided by the standard plugins, which are
  // not needed in the Standard(s) toolbar.
  config.removeButtons = 'Underline,Subscript,Superscript';

  // Set the most common block elements.
  config.format_tags = 'p;h1;h2;h3;pre';

  // Simplify the dialog windows.
  config.removeDialogTabs = 'image:advanced;link:advanced';
};

CKEDITOR.on('dialogDefinition', function(event) {
  var editor = event.editor;
  var dialogDefinition = event.data.definition;
  var dialogName = event.data.name;

  if(dialogName == "image"){
    var tabCount = dialogDefinition.contents.length;
    for (var i = 0; i < tabCount; i++) {
      var browseButton = dialogDefinition.contents[i].get('browse');

      if (browseButton !== null) {
        browseButton.hidden = false;
        browseButton.onClick = function(dialog, i) {
          editor._.filebrowserSe = this;
          var mm = jQuery('<div \>');
          mm.dialog({
            modal: true,
            width: "80%",
            title: "File Manager",
            create: function(event, ui) {
              var mm = jQuery(this).parents("div.ui-dialog");
              jQuery(this).elfinder({
                resizable: false,
                commandsOptions:{
                  getfile:{
                    onlyURL: false,
                    folders: false,
                    multiple: false,
                    oncomplete: "destroy"
                  }
                },
                url: "<?php echo base_url('file_manager/connect');?>",
                getFileCallback: function(file) {
                  console.log(file);
                  CKEDITOR.tools.callFunction(editor._.filebrowserFn, file.url);
                  mm.find('button.ui-dialog-titlebar-close').click()
                }
              }).elfinder('instance');

              jQuery(this).parents("div.ui-dialog").addClass("cke-elfinder");
            }
          })
        }
      }
    }
  }
});
</script>

<script>
function browseFile(element_id, callback=null){

  jQuery('<div \>').dialog({
    modal: true,
    width: "80%",
    title: "Insert image",
    zIndex: 99999999,
    create: function(event, ui) {
      var meDialog = jQuery(this).parents("div.ui-dialog");
      jQuery(this).elfinder({
        resizable: false,
        url: "<?php echo base_url('admin/file_manager/connect');?>",
        getFileCallback: function(file) {
          $(element_id).val(file.url);
          meDialog.find('button.ui-dialog-titlebar-close').click()
        }
      }).elfinder('instance')
    },
    close: callback
  })
}
</script>
