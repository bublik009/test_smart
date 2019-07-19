
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <script src="http://127.0.0.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/bootstrap.min.css">
</head>
<style>
 .form-group{
   width: 20%;
   padding: 10 px;
 }
</style>
<body>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<form>
  <fieldset>
   <div id="params-container">
    <div class="param-set-class" id="param-set_1">
    <div class="form-group">
     <label for="exampleSelect1">Example select</label>
     <select class="form-control" id="param_1">
       <option>size</option>
       <option>forks</option>
       <option>stars</option>
       <option>followers</option>
     </select>
   </div>
   <div class="form-group">
     <label for="exampleSelect1">Example select</label>
     <select class="form-control" id="operator_1">
       <option>=</option>
       <option><</option>
       <option>></option>
     </select>
   </div>
   <div class="form-group has-danger">
       <label class="form-control-label" for="input1">input</label>
       <input type="text" class="form-control" id = "value_1">
   </div>
   <button type="button" class="btn btn-danger">Delete</button>
   </div>
 </div>
    <button type="submit" class="btn btn-info">Apply</button>

  </fieldset>
</form>

<button type="button" class="btn btn-success" id="add-rule">Add rule</button>
<button type="button" class="btn btn-warning" id="apply">Clear</button>
<script>
var counter = 1;
$( "#add-rule" ).click(function() {
   counter++;
   var clonedElem = $("#param-set_1").clone().attr('id', 'param-set_'+counter).appendTo("#params-container");
   clonedElem.find("select").attr('id', function(){
      return this.id.replace(/\_.*/, '') + '_' + counter;
   });
   clonedElem.find("input").attr('id', function(){
      return this.id.replace(/\_.*/, '') + '_' + counter;
   });
});
$( "#apply" ).click(function() {
  var reqCollection = [];
  var setCount = $(".param-set-class").length;
  for(i = 1; i <= setCount; i++)
  {
    reqCollection.push({param: $("#param_"+i).val(), operator: $("#operator_"+i).val(), value: $("#value_"+i).val()});
  }
    $.ajax({
    url: 'http://127.0.0.1/api.php',
    type: "GET",
    dataType: 'json',
    data: reqCollection,
    success: function(data){
      console.log(data);
    }
  });

});
</script>
