function mysql_date(source_date, source_format="dd/mm/yyyy") {
  if(!source_date){
    var d = new Date();

    var _date = d.getDate();
    if(parseInt(_date)<10){
      _date = "0"+_date;
    }
    var _month = d.getMonth();
    if(parseInt(_date)<10){
      _month = "0"+_month;
    }
    var _year = d.getFullYear();
    source_date = [_date, _month, _year].join('-');
  }
  if(source_format == "dd/mm/yyyy"){
    var split_date = source_date.split("/");
    // re format
    source_date = [split_date[2], split_date[1], split_date[0]].join("-");
    return source_date;
  }
  var d = new Date(source_date),
  month = '' + (d.getMonth() + 1),
  day = '' + d.getDate(),
  year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');
}

function indo_date(source_date) {
  var d = new Date(source_date),
  month = '' + (d.getMonth() + 1),
  day = '' + d.getDate(),
  year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [day, month, year].join('/');
}
