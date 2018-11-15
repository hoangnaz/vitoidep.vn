<html>
<head>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script type="text/javascript">
$(function() 
{
 $( "#coding_language" ).autocomplete({
  source: 'autocomplete.php'
 });
});
</script>
</head>
<body>
<div id="wrapper">

<div class="ui-widget">
 <p>Enter Coding Language</p>
 <input type="text" id="coding_language">
</div>

</div>
</body>
</html>