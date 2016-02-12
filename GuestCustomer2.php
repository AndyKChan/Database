<html>

<body>
      <div class="row">
        <div class="large-3 columns">
          <h1><img src="http://placehold.it/400x100&text=DATABLAZERGAMES"/></h1>
        </div>
        <div class="large-9 columns">
          <ul class="right button-group">
          <li><a href="#" class="button">Link 1</a></li>
          <li><a href="#" class="button">Link 2</a></li>
          <li><a href="#" class="button">Link 3</a></li>
          <li><a href="#" class="button">Link 4</a></li>
          </ul>
         </div>
       </div>
      

      <div class="row">
        <div class="large-12 columns">
        <div id="slider">
          <img src="http://placehold.it/1000x400&text=[ img 1 ]"/>
        </div>
        
        <hr/>
        </div>
      </div>

<div class= "row">
  <!--- Add  ---->

  <!--- search bar -->
  <!--refresh page when submit-->

  
<form method="POST" action="GuestCustomer2.php">
<?php
  
$db_conn = oci_connect("ora_r3v8", "a21491139", "ug");
function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	//echo "<br>running ".$cmdstr."<br>";
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
		$e = OCI_Error($db_conn); // For OCIParse errors pass the       
		// connection handle
		echo htmlentities($e['message']);
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
		echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
		echo htmlentities($e['message']);
		$success = False;
	} else {

	}
	return $statement;

}

$branchcity = oci_parse($db_conn, "SELECT distinct CITY FROM BRANCH");
$branchaddress = oci_parse($db_conn, "SELECT distinct ADDRESS FROM BRANCH");
$resultcity = oci_execute($branchcity);
$resultaddress = oci_execute($branchaddress);
$cityvalue = '';
$addressvalue = '';
echo '<p> Branch city: '; 
echo "<select name = 'branchcity </p>'> ";
echo "<option $cityvalue = 'empty'> ---- </option>";
while ($row = oci_fetch_assoc($branchcity)) {
  echo "<option $cityvalue='" . $row['CITY'] . "'>" . $row['CITY'] . "</option>";
}
echo "</select>";

echo '<p> Branch address: ';
echo "<select name = 'branchaddress </p>'> ";
echo "<option $addressvalue = 'empty'> ---- </option>";
while ($row = oci_fetch_array($branchaddress)) {
  echo "<option $addressvalue='" . $row['ADDRESS'] . "'>" . $row['ADDRESS'] . "</option>";
}
echo "</select>";

?>

<p> Search an item: <input type="text" name="productname"> 

<input type="submit" value="search" name="searchsubmit">
</p>
</form>	

<?php
echo '<p> Selected products: </p> ';
$selectedcity = $_POST['cityvalue'];
$selectedaddress = $_POST['addressvalue']; 
$productname = $_POST['productname'];

if(selectedcity && selectedaddress !== "----"){
//query filtering branch and address 
	$query = executePlainSQL("SELECT Name, Quantity, b.City, b.Address
							  FROM Has h, ProductBarcode p, Branch b
							  WHERE h.Barcode = p.Barcode AND 
							        h.bID = b.bID AND  
							        Name LIKE ‘%$productname%’ AND
									b.City LIKE '%$selectedcity%' AND 
									b.address LIKE '%$selectedaddress%'
							  GROUP BY b.bID");
}else{
//query for searching for product name only
	$query = executePlainSQL("SELECT Name 
							  FROM ProductBarcode 
							  WHERE Name 
							  LIKE '%$productname%'");
}
if(!($_POST['productname'] == NULL)){
	while($row = OCI_Fetch_Assoc($query)){
		echo "</tr><td>" . $row["NAME"] . "</td></tr>" . "<br>"; //or just use "echo $row[0]" 
	}
}


?>



  <!-- at branch -->

  <!--- list ALL items -->


</div>




      
     
  
    <div class="row">
        <div class="large-12 columns">
        
          <div class="panel">
            <h4>Get in touch!</h4>
                
            <div class="row">
              <div class="large-9 columns">
                <p>We'd love to hear from you, you attractive person you.</p>
              </div>
              <div class="large-3 columns">
                <a href="#" class="radius button right">Contact Us</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
     
       
      
      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-6 columns">
              <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
              <ul class="inline-list right">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
              </ul>
            </div>
          </div>
        </div> 
      </footer>
    </body>

</html>