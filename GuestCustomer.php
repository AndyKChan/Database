<!DOCTYPE html>
<html>
<body>

<form>
Search bar for product
<input type="text" name="product">
at Branch
<input type="text" name="at Branch">
Go
<input type="submit" value="Go">
</form>

<p>Note that the form itself is not visible.</p>

<p>Also note that the default width of a text field is 20 characters.</p>

<?php
$connection = oci_connect("ora_r3v8", "a21491139", "ug" );

function print_dropdown($query, $link){
    $queried = mysql_query($query, $link);
    $menu = '<select name="staff_name">';
    while ($result = mysql_fetch_array($queried)) {
        $menu .= '
      <option value="' . $result['id'] . '">' . $result['name'] . '</option>';
    }
    $menu .= '</select>';
    return $menu;
}

$stid = oci_parse($conn, "SELECT City, Address FROM Branch");
$result = oci_execute($stid, OCI_DEFAULT);
echo '<select>';

while ($row = oci_fetch_array($result)){
echo '<option value="' . htmlspecialchars($row['City']) . '">' . htmlspecialchars($row['Address']) . '</option>';
}
echo '<select>';
?>
</body>
</html>
