<html>
<body>

<p>Enter the Name:</p> <input type="text" name="Nameone" />
<p>Enter the Barcode:</p> <input type="number" name="Barcodeone" />
<p>Enter the ESRB:</p> <input type="text" name="rateone" />
<p>Enter The Number Players:</p> <input type="number" name="playersone" />
<p>Enter the Price: </p> <input type = "number" name = "priceone" />
<p></p>
<input type="submit" value="AddGames" name = "submit">

<p>Select your order: <input type="text" name="productorder"> 
<input type="submit" value="purchase" name="purchasesubmit">

</body>
</html>

<?php
$productorder = $_POST['productorder'];


if(!($productorder == 0)){
	$queryten = executePlainSQL("SELECT Name 							
							FROM ProductBarcode p						
							WHERE rownum = $productorder");
	$row = OCI_Fetch_Assoc($queryten);
	echo $row['Name'];
	echo $row["Name"];
	echo  "you have purchased" . $row["Name"];
}
?>