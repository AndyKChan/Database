<html>

<body>
<style>
body {background-color:black}
body {color:Red}
h1   {color:Red}
p    {color:white}
legend {color: red}
</style>
<div class="row">
<div class="large-3 columns">
<h1><img src="http://placehold.it/400x100&text=DATABLAZERGAMES"/></h1>

</div>
</div>

</body>
</html>


<?php
    //Login to Database
    $dbhandle = oci_connect("ora_i8b9", "a46664124", "ug");
    if (!$dbhandle) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }
    else {
        
    echo "EmployeeID:"; echo $_COOKIE["ForEmployeeCookie"];
        echo " ";
    }
    ?>


<html>
<body>
<p>




</p>
<fieldset>
<legend>Add New Game to Database:</legend>
<!-- ADD New Game Button -->
<form action = "employee.php" method="POST">
<p>Enter the Name:</p> <input type="text" name="Nameone" />
<p>Enter the Barcode:</p> <input type="number" name="Barcodeone" />
<p>Enter the ESRB:</p> <input type="text" name="rateone" />
<p>Enter The Number Players:</p> <input type="number" name="playersone" />
<p>Enter the Price: </p> <input type = "number" name = "priceone" />
<p>Enter the BranchID: </p> <input type = "number" name = "Bone" />
<p>Enter the City: </p> <input type = "text" name = "cityone" />
<p>Enter the Address: </p> <input type = "text" name = "addone" />
<p>Enter the Quantity: </p> <input type = "number" name = "quantityone" />
<p></p>
<input type="submit" value="AddGames" name = "submit">
</form>
</fieldset>
<p>





</p>

</body>
</html>

<?php

    if (isset($_POST['submit']) and $_POST['submit']=="AddGames"){
        $Name = $_POST['Nameone'];
        $Barcode = $_POST['Barcodeone'];
        $ESRB = $_POST['rateone'];
        $Players = $_POST['playersone'];
        $Price = $_POST['priceone'];
        $Bid = $_POST['Bone'];
        $City = $_POST['cityone'];
        $Address = $_POST['addone'];
        $Quantity = $_POST['quantityone'];
        
        
    
        
        $queryone = "Insert INTO PRODUCTBARCODE VALUES (" . $Barcode . ",'" . $Name . "', ". $Price.")";
        $querytwo = "Insert INTO GAME VALUES( " . $Barcode . ", '" . $ESRB . "'," . $Players . ")";
        $queryoneone = "Insert INTO BRANCH VALUES (" . $Bid . ",'" . $City . "', '". $Address."')";
        $querytwotwo = "Insert INTO HAS VALUES (" . $Bid . "," . $Barcode . ", ". $Quantity.")";
    
        $selectedone = OCI_parse($dbhandle, $queryone);
        $selectedtwo = OCI_parse($dbhandle, $querytwo);
        $selectedoneone = OCI_parse($dbhandle, $queryoneone);
        $selectedtwotwo = OCI_parse($dbhandle, $querytwotwo);

    
        $succuessone = OCI_execute($selectedone);
        $succuesstwo = OCI_execute($selectedtwo);
        $succuessoneone = OCI_execute($selectedoneone);
        $succuesstwotwo = OCI_execute($selectedtwotwo);
    
        if(!$succuessone){
            echo "no";
    

        }
        OCICommit($dbhandle);
    }
    
    ?>
<html>
<body>
<fieldset>
<legend>Add New Console to the Database:</legend>

<form action = "employee.php" method="POST">
<p>Enter the Name:</p> <input type="text" name="Nametwo" />
<p>Enter the Barcode:</p> <input type="number" name="Barcodetwo" />
<p>Enter the Price: </p> <input type = "number" name = "pricetwo" />
<p>Enter the BranchID: </p> <input type = "number" name = "Btwo" />
<p>Enter the City: </p> <input type = "text" name = "citytwo" />
<p>Enter the Address: </p> <input type = "text" name = "addtwo" />
<p>Enter the Quantity: </p> <input type = "number" name = "quantitytwo" />
<p> </p>
<input type="submit" value="AddConsole" name = "submit">
</form>
</fieldset>

</body>
</html>

<?php
    if (isset($_POST['submit']) and $_POST['submit']=="AddConsole"){
        $Nameone = $_POST['Nametwo'];
        $Barcodeone = $_POST['Barcodetwo'];
        $Priceone = $_POST['pricetwo'];
        $Bidone = $_POST['Btwo'];
        $Cityone = $_POST['citytwo'];
        $Addressone = $_POST['addtwo'];
        $Quantityone = $_POST['quantitytwo'];
        
        
        
        $querythree = "Insert INTO PRODUCTBARCODE VALUES (" . $Barcodeone . ",'" . $Nameone . "', ". $Priceone.")";
        $queryfour = "Insert INTO CONSOLE VALUES( " . $Barcodeone . ")";
        $querythreethree = "Insert INTO BRANCH VALUES (" . $Bidone . ",'" . $Cityone . "', '". $Addressone."')";
        $queryfourfour = "Insert INTO HAS VALUES (" . $Bidone . "," . $Barcodeone . ", ". $Quantityone.")";
        
        $selectedthree = OCI_parse($dbhandle, $querythree);
        $selectedfour = OCI_parse($dbhandle, $queryfour);
        $selectedthreethree= OCI_parse($dbhandle, $querythreethree);
        $selectedfourfour = OCI_parse($dbhandle, $queryfourfour);
        
        
        $succuessthree = OCI_execute($selectedthree);
        $succuessfour = OCI_execute($selectedfour);
        $succuessthreethree = OCI_execute($selectedthreethree);
        $succuessfourfour = OCI_execute($selectedfourfour);
        
        if(!$succuessthree){
            echo "you really no";
        }
        
        
        OCICommit($dbhandle);
    }
    
    
    ?>

<html>
<body>
<fieldset>

<legend>Add New Console to the ACCESSORY:</legend>

<form action = "employee.php" method="POST">
<p>Enter the Name:</p> <input type="text" name="Namethree" />
<p>Enter the Barcode:</p> <input type="number" name="Barcodethree" />
<p>Enter the Price: </p> <input type = "number" name = "pricethree" />
<p>Enter the BranchID: </p> <input type = "number" name = "Bthree" />
<p>Enter the City: </p> <input type = "text" name = "citythree" />
<p>Enter the Address: </p> <input type = "text" name = "addthree" />
<p>Enter the Quantity: </p> <input type = "number" name = "quantitythree" />
<p> </p>
<input type="submit" value="AddAccessory" name = "submit">
</form>
</fieldset>

</body>
</html>

<?php
    if (isset($_POST['submit']) and $_POST['submit']=="AddAccessory"){
        $Nametwo = $_POST['Namethree'];
        $Barcodetwo = $_POST['Barcodethree'];
        $Pricetwo = $_POST['pricethree'];
        $Bidtwo = $_POST['Bthree'];
        $Citytwo = $_POST['citythree'];
        $Addresstwo = $_POST['addthree'];
        $Quantitytwo = $_POST['quantitythree'];

        
        
        $queryfive = "Insert INTO PRODUCTBARCODE VALUES (" . $Barcodetwo . ",'" . $Nametwo . "', ". $Pricetwo.")";
        $querysix = "Insert INTO ACCESSORY VALUES( " . $Barcodetwo . ")";
        $queryfivefive = "Insert INTO BRANCH VALUES (" . $Bidtwo . ",'" . $Citytwo . "', '". $Addresstwo."')";
        $querysixsix = "Insert INTO HAS VALUES (" . $Bidtwo . "," . $Barcodetwo . ", ". $Quantitytwo.")";

        
        $selectedfive = OCI_parse($dbhandle, $queryfive);
        $selectedsix = OCI_parse($dbhandle, $querysix);
        $selectedfivefive = OCI_parse($dbhandle, $queryfivefive);
        $selectedsixsix = OCI_parse($dbhandle, $querysixsix);
        

        
        
        $succuessfive = OCI_execute($selectedfive);
        $succuesssix = OCI_execute($selectedsix);
        $succuessfivefive = OCI_execute($selectedfivefive);
        $succuesssixsix = OCI_execute($selectedsixsix);
        
        if(!$succuesssix){
            echo " really really no";
        }
        
        
        OCICommit($dbhandle);
    }
    
    
    ?>

<html>
<body>
<fieldset>

<legend>Update Game:</legend>

<form action = "employee.php" method="POST">
<p>Enter the Barcode:</p> <input type="number" name="Barcodeupdate" />
<p>Enter the Quantity:</p> <input type="number" name="Quantityupdate" />
<p>Enter the BranchID: </p> <input type = "number" name = "Branchupdate" />
<p> </p>
<input type="submit" value="UpdateProduct" name = "submit">
</form>
</fieldset>

</body>
</html>

<?php
    if (isset($_POST['submit']) and $_POST['submit']=="UpdateProduct"){
        $UpdateBarcode = $_POST['Barcodeupdate'];
        $UpdateQuantity = $_POST['Quantityupdate'];
        $UpdateBranch = $_POST['Branchupdate'];
        
        $normalQuery = "SELECT Quantity FROM Has Where barcode = " .$UpdateBarcode." and bID = ".$UpdateBranch."";
        $normalselected = OCI_parse($dbhandle,$normalQuery);
        $result =  OCI_execute($normalselected);
        while ($row = OCI_Fetch_ASSOC($normalselected)){
            $finalQuantity = $row['QUANTITY'];
            
        }
        $newquantityeye = $finalQuantity + $UpdateQuantity;
        echo $newquantityeye;
        
        $updatequery = "update has set Quantity = ".$newquantityeye." Where barcode = ".$UpdateBarcode."";
        $updateselected = OCI_parse($dbhandle,$updatequery);
        
        $resultone = OCI_execute($updateselected);
        if(!$resultone){
            echo "bleh";
        }
        OCICommit($dbhandle);
        
    }
    
    
       
?>


<html>
<body>
<fieldset>

<legend>Purchase Product:</legend>

<form action = "employee.php" method="POST">
<p>Enter the Barcode:</p> <input type="number" name="BarcodePurchased" />
<p>Enter the Quantity:</p> <input type="number" name="QuantityPurchased" /> 
<p>Enter the BranchID: </p> <input type = "number" name = "BranchPurchased" />
<p> </p>
<input type="submit" value="PurchaseProduct" name = "submit">
</form>
</fieldset>

</body>
</html>

<?php
    if (isset($_POST['submit']) and $_POST['submit']=="PurchaseProduct"){
        $PurchasedBarcode = $_POST['BarcodePurchased'];
        $PurchasedQuantity = $_POST['QuantityPurchased'];
        $PurchasedBranch = $_POST['BranchPurchased'];
        
        $PurchasedQuery = "SELECT Quantity FROM Has Where barcode = " .$PurchasedBarcode." and bID = ".$PurchasedBranch."";
        $PurchasedSelected = OCI_parse($dbhandle,$PurchasedQuery);
        $resultof =  OCI_execute($PurchasedSelected);
        while ($row = OCI_Fetch_ASSOC($PurchasedSelected)){
            $finaldestinationQuantity = $row['QUANTITY'];
            
        }
        $newupdatedquantityeye = $finaldestinationQuantity - $PurchasedQuantity;
        echo $newupdatedquantityeye;
        $date = strtotime("+15 day");
		$endDate = date('M d, Y', $date);
		$receiptNumber = 999999999999;
		$receiptNumber = $receiptNumber - 1;
        $PurchasedQueryone = "update has set Quantity = ".$newupdatedquantityeye." Where barcode = ".$PurchasedBarcode."";
        $RecieptUpdateQuery = "Insert INTO PurchaseExpDate VALUES(" . $receiptNumber . ", '" . $endDate . "')";
		
		$PurchasedSelectedone = OCI_parse($dbhandle,$PurchasedQueryone);
        $PurchasedReciept = OCI_parse($dbhandle,$RecieptUpdateQuery);
		
        $resultonethousand = OCI_execute($PurchasedSelectedone);
        if(!$resultonethousand){
            echo "bleh";
        }
        $resulttwothousand = OCI_execute($PurchasedReciept);
		if(!$resulttwothousand){
			echo "blah";
		}
		OCICommit($dbhandle);
		}
            
?>

