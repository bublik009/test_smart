
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <script src="http://127.0.0.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/bootstrap.min.css">
</head>
<style>
 .param-set-class{
   display: flex;
 }
 .form-group{
   padding: 10px;
 }
</style>
<body>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<form>
  <fieldset>
   <div id="params-container">
    <div class="param-set-class" id="param-set_1">
    <div class="form-group">
     <label for="exampleSelect1">Param</label>
     <select class="form-control" id="param_1">
       <option>size</option>
       <option>forks</option>
       <option>stars</option>
       <option>followers</option>
     </select>
   </div>
   <div class="form-group">
     <label for="exampleSelect1">Operator</label>
     <select class="form-control" id="operator_1">
       <option>=</option>
       <option><</option>
       <option>></option>
     </select>
   </div>
   <div class="form-group">
       <label class="form-control-label" for="input1">Value</label>
       <input type="text" class="form-control" id = "value_1">
   </div>
   <div class="form-group">

     <button type="button" style="position: relative; margin-top: 25px;" class="btn btn-danger" id="delete_1" onclick = "

     $('#param-set_'+this.id.replace(/.*\_/, '')).remove();

     ">Delete</button>
   </div>

   </div>
 </div>


  </fieldset>
</form>
<button type="button" class="btn btn-info" id="apply">Apply</button>
<button type="button" class="btn btn-success" id="add-rule">Add rule</button>
<button type="button" class="btn btn-warning" id="clear">Clear</button>
<div id="jqGrid"></div>
<script>
var counter = 1;
var clonedElemMain = $("#param-set_1").clone();
$( "#clear" ).click(function() {
  var setCount = $(".param-set-class").remove();
  clonedElemMain.appendTo("#params-container");
});
$( "#add-rule" ).click(function() {
   counter++;
   clonedElem = $("#param-set_1").clone().attr('id', 'param-set_'+counter).appendTo("#params-container");
   clonedElem.find("select").attr('id', function(){
      return this.id.replace(/\_.*/, '') + '_' + counter;
   });
   clonedElem.find("input").attr('id', function(){
      return this.id.replace(/\_.*/, '') + '_' + counter;
   });
   clonedElem.find("button").attr('id', function(){
      return this.id.replace(/\_.*/, '') + '_' + counter;
   });
});

$( "#apply" ).click(function() {
  var reqCollection = [];
  var setCount = $(".param-set-class").length;
  for(i = 1; i <= setCount; i++)
  {
    reqCollection.push($("#param_"+i).val() + ':' + ($("#operator_"+i).val() == '=' ? '' : $("#operator_"+i).val()) + $("#value_"+i).val());
  }
    $.ajax({
    url: 'http://127.0.0.1/api.php',
    type: "post",
    data: {data: reqCollection},
    success: function(data){

      console.log(data);
    }
  });

});
</script>
