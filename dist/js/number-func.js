function number_format (number, decimals, dec_point='.', thousands_sep=',') {
  // Strip all characters but numerical ones.
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = thousands_sep,
  dec = dec_point,
  s = '',
  toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

(function ( $ ) {
  $.fn.numberFormat = function(options, val){

    if(options=="getValue"){
      if($(this)){
        if($(this).val()){
          var elemValue = $(this).val();
          if(elemValue.length){
            var unMaskedValue = parseFloat(elemValue.replace(/\,/g, ''));
            return unMaskedValue;
          }else{
            return 0;
          }
        }
      }
    }

    if(options=="setValue"){
      var precision = parseInt($(this).data("precision"));
      if(precision>=0){
        $(this).val(number_format(val, precision));
      }else{
        $(this).val(number_format(val, 2));
      }
    }

    if(options=="clear"){
      $(this).val('');
    }

    return this.each(function() {

      if(options==null){
        var elem = $( this );
        $(this).keypress(function(e) {
          var elemValue = $(this).val();
          var sElemVal = elemValue.split('.');
          var precision = 2;
          if($(this).data("precision")>=0){
            precision = $(this).data("precision");
          }

          // Allow 0-9 & . (comma)
          if ((e.which < 48 || e.which > 57) && (e.which < 46 || e.which > 46)) {
            return false;
          }
          // Pembatasan Comma hanya 1
          if (e.which == 46) {
            if(sElemVal.length > 1){
              return false;
            }
          }

          if(sElemVal[1] && sElemVal[1].length > precision){
            $(this).val(elemValue.substring(0,elemValue.length-1));
            return false;
          }

        });
        $(this).focusin(function(event) {
          var elemValue = $(this).val();
          var newValue = elemValue.replace(/\,/g, '');
          if(elemValue==0){
            $(this).val('');
          }else{
            $(this).val(newValue);
          }
        });
        $(this).focusout(function(e) {
          var elemValue = $(this).val();
          var precision = 2;
          if($(this).data("precision")>=0){
            precision = $(this).data("precision");
          }
          if(elemValue==0){
            $(this).val(number_format(0, precision));
          }else{
            $(this).val(number_format(elemValue, precision));
          }
        });
        $(this).on('mouseup', function() { $(this).select(); });
      }

    });
  };
}( jQuery ));

$(function() {
  $(".numberFormat").numberFormat();
});

function val_min_max($selector){
  $($selector).keyup(function(){
    this_val = $(this).val();
    this_min = $(this).attr('min');
    this_max = $(this).attr('max');
    if(this_val > this_max){
      $(this).val(this_max);
    }
    if(this_val < this_min){
      $(this).val(this_min);
    }
  })
}
