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
      
     
     
      <div class="row">
        <div class="large-4 columns">
          <img src="http://placehold.it/400x300&text=[img]"/>
          <h4>Your Points!</h4>
          

          <?php
            $db_conn = oci_connect("ora_r3v8", "a21491139", "ug");
            //!!! NEED TO TAKE MEMBER ID FROM LOGIN
            $Memberid = 90876543;
            $Memberpoints = oci_parse($db_conn, "SELECT POINTS FROM MEMBER MEMBER WHERE CID=:Memberid");
            oci_bind_by_name($Memberpoints, ":Memberid", $Memberid);
            $Memberpointsexecute = oci_execute($Memberpoints);
            echo "<p> MemberID: " . $Memberid . "</p>";
            if($Memberpointsexecute){
              while($row = oci_fetch_assoc($Memberpoints)){
                print "<p> You have " . $row['POINTS'] . " points. </p>";
              }
            }
            //while ($row = oci_fetch_array($Memberpointsexecute, OCI_BOTH)) {
            //  echo "<p> you have " . $row['POINTS'] . " points </p>";
            //}
          
            //echo "you can afford the following items!";
          ?>
        </div>
        
        <div class="large-4 columns">
          <img src="http://placehold.it/400x300&text=[img]"/>
          <h4>Your history</h4>
          <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
        </div>
        
        <div class="large-4 columns">
          <img src="http://placehold.it/400x300&text=[img]"/>
          <h4>This is a content section.</h4>
          <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
        </div>
      
        </div>
        <div class= "row">
  <!--- Add  ---->

  <!--- search bar -->
  <!--refresh page when submit-->

  <p> Search an item: <input type="text" name="searchitem" size="6">

<?php
$branchcity = oci_parse($db_conn, "SELECT distinct CITY FROM BRANCH");
$branchaddress = oci_parse($db_conn, "SELECT distinct ADDRESS FROM BRANCH");
$resultcity = oci_execute($branchcity);
$resultaddress = oci_execute($branchaddress);
echo '<p> Branch city </p>';
echo "<select name = 'branchcity'>";
echo "<option value = 'empty'> ---- </option>";
while ($row = oci_fetch_assoc($branchcity)) {
  echo "<option value='" . $row['CITY'] . "'>" . $row['CITY'] . "</option>";
}
echo "</select>";
echo '<p> Branch address </p>';
echo "<select name = 'branchaddress'>";
echo "<option value = 'empty'> ---- </option>";
while ($row = oci_fetch_array($branchaddress)) {
  echo "<option value='" . $row['ADDRESS'] . "'>" . $row['ADDRESS'] . "</option>";
}
echo "</select>";
?>

  <input type="submit" value="search" name="searchitembutton">
  </p>




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