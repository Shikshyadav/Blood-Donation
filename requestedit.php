<?php
//connection
include 'conn.php';

    $id = $_GET['id'];     /*variable*/
    $sql="SELECT * FROM REQUESTS where id=$id";

    $result=mysqli_query($conn,$sql); 
    $row=mysqli_fetch_assoc($result);

    $Full_Name = $row['Full_Name'];
    $Email= $row['Email'];
    $Blood_Group= $row['Blood_Group'];
    $Phone= $row['Phone'];
    $Note= $row['Note'];
    $Addreess = $row['Addreess'];


    if(isset($_POST['Update']))
{
    $Full_Name = $_POST['Full_Name'];
    $Email= $_POST['Email'];
    $Blood_Group= $_POST['Blood_Group'];
    $Phone= $_POST['Phone'];
    $Note= $_POST['Note'];
    $Addreess = $_POST['Addreess'];

    $sql_query= "UPDATE REQUESTS SET  id=$id, Full_Name= '$Full_Name', Email = '$Email', Blood_Group='$Blood_Group', Phone='$Phone', Addreess = '$Addreess', Note = '$Note' WHERE id=$id";
    if(mysqli_query($conn,$sql_query))
        {
            header("location: requestcrud.php");
                }
    else
        {
            echo "Data failed to update" . mysqli_error($conn);
        }
        mysqli_close($conn);
      }    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate</title>
  <link rel="stylesheet" type="text/css" href="donate.css">
  <link rel="icon" href="drop1.jpg">

</head>

<body>
  <div>
    <nav class="nav">
      <div class="flex-container">

        <img src="orangered.png" height="60px" width="80px" style="margin-left: 10vh;" alt="logo">
        <ul>
          <b>
            <li><a href="HemoGive.php" style="margin-left: 30vh;">Home</a></li>
          </b>
          <b>
            <li><a href="#about" style="margin-left: 20px;">About Us</a></li>
          </b>
          <b>
            <li><a href="#whyus" style="margin-left: 20px;">Why Us?</a></li>
          </b>
          <b>
            <li><a href="#footer" style="margin-left: 20px;">Contact Us</a></li>
          </b>
          <b>
            <li><a href="donate.php" class="button" style="margin-left: 30vh;">Donate Blood</a></li>
          </b>
          <b>
            <li><a href="request1.php" class="button" style="margin-left: 30px;">Request Blood</a></li>
          </b>
        </ul>
      </div>
    </nav>
  </div>
  <br><br><br><br><br><br>
  <h1>Request Blood</h1>
  </div>
  <div class="mainbody">

    <div class="img" style="display: inline-block;">
      <img src="donate1.jpg" height="400" width="350">
    </div>
    <div class="outerbox" style="display: inline-block;">
    <form action="insert2.php" name="formfill" method="POST" onsubmit="return validation()">
        <span class="title"> <b>Update Details</b></span><br>
        <input type="text" name="Full_Name" value="<?php echo $Full_Name; ?>" placeholder="Name" required><br>
        <input type="tel" name="Phone" value="<?php echo $Phone; ?>" placeholder="Phone" required><br>
        
        <input type="email" name="Email" value="<?php echo $Email; ?>" placeholder="Email" required><br>
        <textarea name="Note" id="note" cols="43" rows="4" placeholder="Note">
        value="<?php echo $Note; ?>"
        </textarea>     
         <select name="Blood_Group" value="<?php echo $Blood_Group; ?>" id="bloodgrp" required>
          <option value="bloodgrp">Blood Group</option>
          <option value="A+"<?php
          if($row['Blood_Group'] == 'A+')
          {
            echo "selected";
          }
          ?>
          >A+</option>
          <option value="A-"  <?php
          if($row['Blood_Group'] == 'A-')
          {
            echo "selected";
          }
          ?>>A-</option>
          <option value="B+"  <?php
          if($row['Blood_Group'] == 'B+')
          {
            echo "selected";
          }
          ?>>B+</option>
          <option value="B-"  <?php
          if($row['Blood_Group'] == 'B-')
          {
            echo "selected";
          }
          ?>>B-</option>    <!-- textarea ko beech ma garne opening ra closing tag ko beech ma-->
          <option value="O+"  <?php
          if($row['Blood_Group'] == 'O+')
          {
            echo "selected";
          }
          ?>>O+</option>
          <option value="O-"  <?php
          if($row['Blood_Group'] == 'O-')
          {
            echo "selected";
          }
          ?>>O-</option>
          <option value="AB+"  <?php
          if($row['Blood_Group'] == 'AB+')
          {
            echo "selected";
          }
          ?>>AB+</option>
          <option value="AB-"  <?php
          if($row['Blood_Group'] == 'AB-')
          {
            echo "selected";
          }
          ?>>AB-</option>
          <option value="unknown"  <?php
          if($row['Blood_Group'] == 'unknown')
          {
            echo "selected";
          }
          ?>>Unknown</option>
        <input type="text" name="Addreess" value="<?php echo $Addreess; ?>" placeholder="Address"><br>
        <input type="submit" value="Update" name="Update">

        
        </center>
      </form>
    </div>
    <script>
      function validation() {
        var x=document.formfill.Email.value;
        var atpos=x.indexOf('@');
        var dotpos=x.lastIndexOf('.');
        if (document.formfill.Full_Name.value == "") {
            alert("Please enter your Name!");
            document.formfill.Full_Name.focus();
            return false;
        }
     
        else if ((document.formfill.Email.value == "") || (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)) {
            alert("Please enter valid email!");
            document.formfill.Email.focus();
            return false;
        }
        else if((document.formfill.Phone.value=="")||(document.formfill.Phone.value.length!=10)){
            alert("Please enter valid contact number!");
            document.formfill.Phone.focus();
            return false;
        }
        else if(document.formfill.Addreess.value==""){
            alert("Please provide valid address");
            document.formfill.Addreess.focus();
            return false;
        }
        else if(document.formfill.Note.value==""){
            alert("Please provide valid address");
            document.formfill.Note.focus();
            return false;
        }
        alert("Thank You! Your Request has been submitted. We will get back to you soon!");
        return true;
    }
  </script>
  </div>
  <br><br>
 
  
  <div id="footer">
    <div class="text" style="display: inline-block;">

    <h3><b>Contact info</b></h3>
    <br>
    Address: Khwopa Engineering College,
    <br>
     Libali, Bhaktapur
    <br>
    <br>
    Phone: 9835679854, 01-2638296
    <br>
    <br>
    Email Address: shikshyadav81@gmail.com
    </p>
    </div>
    <div class="icon" style="display: inline-block;">
      <a href="#" target="_blank">
        <img src="facebook.png" height="40px" width="40px">
      </a>
      &nbsp;

   <a href="#" target="_blank">
        <img src="instagram.png" height="40px" width="40px">
      </a>
      &nbsp;
      <a href="#" target="_blank">
        <img src="twitter-hlb.png" height="40px" width="40px">
      </a>
      &nbsp;
      <a href="#" target="_blank">
        <img src="linkedin.png" height="40px" width="40px">
      </a>
    
     </div>
    
    <br><br>
    <hr>
    <P style="margin-top: 20px; margin-bottom: 10px; color: #888;">
       Copyright ©
      <script> 
      document.write(new Date().getFullYear());
      </script>
       | All rights reserved | Privacy Policy 
    </P>

    </div>
  </div>

</body>

</html>