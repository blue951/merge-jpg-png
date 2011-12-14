<!doctype html>
<html>
<head>
<title>Merge JPG with PNG and Auto-Refresh Image</title>
<meta charset="utf-8" />
</head>
<body>
<img src="createimage.php" id="createimage">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function() {
    setInterval('reloadImage()', 9000);
});
function reloadImage(){
    $('#createimage').attr('src', 'createimage.php?' + Math.random());
}
</script>
</body>
</html>
