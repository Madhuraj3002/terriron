<?php  
error_reporting(E_ERROR | E_PARSE);
 $connect = mysqli_connect("localhost", "root", "", "agri_shop");  
 if(isset($_POST["back"])) 
 {
	 header("location:index.php");
	 
 }
 
 if(isset($_POST["insert"]))  
 {  
if((isset($_POST["name"]))&&(isset($_POST["email"]))&&(isset($_POST["contact"]))&&(isset($_POST["address"]))&&(isset($_POST["password"])))
{    
{

$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$password=$_POST['password'];


$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
$mob="/^[1-9][0-9]*$/";

if(ctype_alpha(str_replace(' ', '', $name)) === false)
{
$msg = "Name must contain letters and spaces only";
print '<script>alert(" '.$msg.'");</script>';
}
else if(!preg_match($mob, $contact))
{
$msg="Please enter a valid contact number";
print '<script>alert(" '.$msg.'");</script>';
}
else
{
$query=mysqli_query($connect,"SELECT `id` FROM `supplier_details` WHERE `contact`= '$contact' ") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$sid=$row['id'];

//if($degree!=NULL)
{

if($sid==NULL)
{
	//if($age>=25)
	{
 $query = "INSERT INTO `supplier_details` (`name`, `email`, `contact`, `address`, `password`) VALUES ('$name','$email','$contact','$address','$password')";

 if(mysqli_query($connect, $query))  
      {  
   
print '<script>alert("Suplier details uploaded successfully  ,Thankyou");</script>';
	  }
	}
	 
}
else{
	       echo ' <script language="javascript" type="text/javascript">
alert("Given contact matched with another registered supplier, So you Cant able to register, please try another");
parent.document.location="student_reg.php";
</script>';
	
}

}

}
}


}
    

else{
	     echo ' <script language="javascript" type="text/javascript">
alert("Please fill all fields");
parent.document.location="student_reg.php";
</script>';
}	
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      
	  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="student_reg.css" type="text/css" rel="stylesheet">
    
	<title>Add Supplier</title>
<style>     
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 10px;
} </style>
<form method="POST" action="student_reg.php">
	
     <input type="submit" class="button" name="back" value="Back">
	 </form>
	
 <h3 align="center" color="red">Supplier Registration</h3>  	 
	 </head>  
      <body>  
          
		   
		 
    
     <br />  <hr><br><br>
     <form method="post" enctype="multipart/form-data" id="form" >  
     <div class="full">
     <div class="part">
  
  
     <label>Supplier Name</label>:<input type="text" name="name" required><br><br>
	 <label>Email</label>:<input type="text" name="email" required><br><br>
	 <label>Contact</label>:<input type="text" name="contact" required><br><br>
     <label>Address</label>:<input type="text" name="address" required><br><br>
     <label>Password</label>:<input type="text" name="password" required><br><br>
	<center> 
	 <input type="submit" class="button" name ="insert" value ="submit"></center>
     </form>
	 
	 </html>