<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Police Emergency Service System</title>
</head>
<body>
<script>
function Christy()
 {
  var x=document.forms["frmLogCall"]
  ["CallerName"].value;
  if (x==null || x=="")
 {
  alert("Caller Name is required.");
  return false;
 }
 }
 </script>
 <?php require_once 'nav.php';
 ?>
 <?php require_once 'db.php';
 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
 if($conn->connect_error){
  die("Connection failed: " . $conn_>connect_error);
 }
 $sql = "SELECT * FROM incidenttype";
 $result = $conn-> query($sql);
 if ($result->num_rows > 0){
  while ($row = $result-> fetch_assoc()){
   $incidentType[$row['incidentTypeId']] =
   $row['incidentTypeDesc'];
  }
 }
 $conn->close();
 ?>
 <fieldset>
 <legend>Log Call</legend>
 <form name="frmLogCall" method="post" action="Dispatch.php" onSubmit="return Christy();">
 <table width="45%" border="2" align="center"
 cellpadding="5" cellspacing="5">
 <tr>
 <td width="20%" align="center"> Name of caller:</td>
 <td width="50%"><input type="text"  name="callerName" id="callerName" pattern="[a-zA-Z- ]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" onkeypress="return onlyAlphabets(event,this);"></td>
 </tr>
 <tr>
 <td width="20%" align="center">Contact Number:</td>
 <td width="50%"><input type="text" name="contactNo" id="contactNo"></td>
 </tr>
 <tr>
 <td width="50%" align="center">Location:</td>
 <td width="50%"><input type="text" name="location" id="location"></td>
 </tr>
 <tr>
 <td width="50%" align="center">Incident Type:</td>
 
 <td width="50%"><select name="incidentType" id="incidentType">
 
 <?php foreach($incidentType as $key=> $value) {?><option value="<?php echo $key ?>">
  <?php echo $value ?> </option>
  <?php } ?>
  </select>
  </td>
 </tr>
  <tr>
  <td width="50%"
  align="center">Description:</td>
  <td width="50%"><textarea name="incidentDesc" id="incidentDesc" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
  <table width="40%" border="0" align="center" cellpadding="5" cellspacing="5">
  <td align="center"><input type="reset" name="cancelProcess" id="cancelProcess" value="Reset"</td>
  <td align="center"><input type='submit' name="btnProcessCall" id="btnProcessCall" value="Process Call"</td>
  </tr>
   </table>
  </table>
  </form>
 </fieldset>
	<script>
	function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32)
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
	</script>
</body>
</html>