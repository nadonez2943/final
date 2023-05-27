<?php
$myArray = array("a", "b", "c");
$jsonArray = json_encode($myArray);
?>

<script>
var parsedArray = <?php echo $jsonArray; ?>;
for (var i = 0; i < parsedArray.length; i++) {
  console.log(parsedArray[i]);
}
</script>