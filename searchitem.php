<html>
<body>
List:
<?php
$db_conn = oci_connect("ora_r3v8", "a21491139", "ug");
$productname = $_POST['name'];
$query = "SELECT distinct NAME FROM PRODUCTBARCODE WHERE name = '" .'%$productname%' ."'";

$selected = OCI_parse(db_conn,$query);
$success = OCI_execute($selected);

?>
</body>
</html>