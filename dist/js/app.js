
alertify.defaults.transition = "zoom";
alertify.defaults.theme.ok = "ui positive button";
alertify.defaults.theme.cancel = "ui black button";

function getHistory(doc_name, doc_id){
  $.ajax({
    url:baseUrl + 'doc_history/modal_content',
    data:{
      doc_name:doc_name,
      doc_id:doc_id
    },
    type:"post",
    success:function(response){
      alertify.dialog('alert').set({
        transition:'zoom',
        padding:false,
        height:"600px",
        maxHeight:"600px",
        resizable:true,
        title:"Riwayat Data",
        message: response
      }).show();
    }
  });
}

class LoadingSpinner{
  show(){
    var html = '<div class="lds lds-container"><div class="lds-dual-ring"></div></div>';
    $("body").append(html)
  }
  hide(){
    $(".lds").remove();
  }
}
var loadingSpinner = new LoadingSpinner();


function isValid(element){
  var valid = true;
  var border_success = "rgb(25, 231, 27)";
  var border_danger = "rgb(251, 29, 29)";

  // Empty
  var me = $(element);

  me.css("border-color", border_success);

  var label = me.attr("name");

  if(me.data("valid-label")){
    label = me.data("valid-label");
  }

  if(me.attr("required") == "required"){
    if(me.val().length == 0){
      me.focus();
      me.css("border-color", border_danger);
      alertify.error("The <b>" + label + "</b> is Required!");
      return false;
    }

    var minlength = me.attr("minlength");
    if(me.data("valid-minlength")){
      minlength = me.data("valid-minlength");
    }
    if(me.val().length < minlength){
      me.focus();
      me.css("border-color", border_danger);
      alertify.error("The Minlength <b>" + label + "</b> is "+minlength+" character!");
      return false;
    }

    var maxlength = me.attr("maxlength");
    if(me.data("valid-maxlength")){
      maxlength = me.data("valid-maxlength");
    }
    if(me.val().length > maxlength){
      me.focus();
      me.css("border-color", border_danger);
      alertify.error("The Maxlength <b>" + label + "</b> is "+maxlength+" character!");
      return false;
    }
  }

  return true;
}


function redirect(url){
  window.location = url;
}

function messageBox(title, message, callback = null){
  if (typeof callback === "function") {
    alertify.alert(title, message, callback);
  }else{
    alertify.alert(title, message, function(){
      return;
    });
  }

}
