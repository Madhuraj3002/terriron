<?php
session_start();

$pay=0;
	$totalamt=0;
	$count=0;
	$user="root";
$password="";
$db="agri_shop";
$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");

if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="home.php";
</script>';
}


if(isset($_POST['pay']))
{
			$query=mysqli_query($connect,"SELECT * FROM `product_count` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $ct = $row['count'];
    $py = $row['pay'];
}	
	if(($ct!=0)&&($py==1))
	{
		
//$query=mysqli_query($connect,"UPDATE `product_count` SET `count`=0, `pay` = 0 ") or die(mysqli_error($conn));

			$query=mysqli_query($connect,"SELECT * FROM `product_id` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $pid = $row['id'];
}				
			$query=mysqli_query($connect,"SELECT * FROM `added_items` WHERE `id`='$pid' ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $id = $row['id'];
	$name=$row['name'];
    $price=$row['price'];
	$quantity=$row['quantity'];
	$sid=$row['supplier_id'];
	
		$query1=mysqli_query($connect,"SELECT * FROM `supplier_details` WHERE `id`=$sid ") or die(mysqli_error($connect));
                          
while($row=mysqli_fetch_array($query1))
{
	
	$sname=$row['name'];
    $semail=$row['email'];
	$scontact=$row['contact'];
	$saddress=$row['address'];
}	
}
			$query=mysqli_query($connect,"SELECT * FROM `user_id` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $uid = $row['id'];
    
}	

	$query1=mysqli_query($connect,"SELECT * FROM `user_details` WHERE `id`=$uid ") or die(mysqli_error($connect));
                          
while($row=mysqli_fetch_array($query1))
{
	
	$uname=$row['name'];
    $uemail=$row['email'];
	$ucontact=$row['contact'];
	$uaddress=$row['address'];
}	
$query1=mysqli_query($connect,"SELECT * FROM `product_count` WHERE 1 ") or die(mysqli_error($connect));
                          
while($row=mysqli_fetch_array($query1))
{
	
	$pcount=$row['count'];
   
}
echo "count";
echo $pcount;
echo "price";
echo $price;
$ptot=0;
$com=0;
$sprice=0;
echo "   ";
$ptot = (((int)$pcount)*((int)$price));
$com = (0.1*$ptot);
$sprice=$ptot-(int)$com;
echo $ptot;
echo "   ";
echo $com;
echo "   ";
echo $price;

$query=mysqli_query($connect,"INSERT INTO `transaction`(`gname`, `sname`, `semail`, `scontact`, `saddress`, `uname`, `uemail`, `ucontact`, `uaddress`, `quantity`, `totalamt`, `useramt`, `commission`, `price`, `uid`, `sid`) VALUES ('$name','$sname','$semail','$scontact','$saddress','$uname','$uemail','$ucontact','$uaddress','$pcount','$ptot','$sprice','$com','$price','$uid','$sid')") or die(mysqli_error($conn));


			$query=mysqli_query($connect,"SELECT * FROM `added_items` WHERE `id`='$pid' ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $quanti = $row['quantity'];
}
$quanti = $quanti-$pcount;
$query=mysqli_query($connect,"UPDATE `added_items` SET `quantity`='$quanti' WHERE `id`= '$pid' ") or die(mysqli_error($conn));



echo ' <script language="javascript" type="text/javascript">
alert("Payment Successfull");
parent.document.location="home.php";
</script>';
	
		
	}
	else{
		
echo ' <script language="javascript" type="text/javascript">
alert("Please give valid product quantity");
parent.document.location="payment.php";
</script>';
	
		
	}
			

}

if(isset($_POST['submit']))
{

$count=$_POST['count'];
echo $count;
			$query=mysqli_query($connect,"SELECT * FROM `product_id` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $pid = $row['id'];
}				
			$query=mysqli_query($connect,"SELECT * FROM `added_items` WHERE `id`='$pid' ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
	$quantity1=$row['quantity'];
	$price1=$row['price'];
}

if($count>$quantity1)
{
	$pay=0;
echo ' <script language="javascript" type="text/javascript">
alert("Givent quantity of product not in stock, so please Reduce quantity");
parent.document.location="payment.php";
</script>';
	
}
else{
	$pay=1;
	$totalamt=0;
	$totalamt = $count*$price1;
$query=mysqli_query($connect,"UPDATE `product_count` SET `count`='$count', `pay` = '$pay' ") or die(mysqli_error($conn));
	
}


 	
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 90%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 90%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
/*
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}*/
</style>
</head>
<body>
<img src="gro.jpg" alt="Nature" class="responsive" width="100%" height="300">
<br><br>

<form method="GET" action="payment.php">
<button type="submit" name="back" class="registerbtn">Back</button>
</form>

<center>
<h2>Payment</h2>
</center>
<center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Agri Products names.." title="Type in a name">
<div style="overflow-x:auto;">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Agri Products Name</th>
	<th style="width:60%;">Price per kg/litre</th>
	<th style="width:60%;">Quantity in Hand kg/litre</th>
	<th style="width:60%;">Supplier Name</th>
	<th style="width:60%;">Email</th>
	<th style="width:60%;">Contact</th>
	<th style="width:60%;">Address</th>
    </tr>
      
         <?php  
		 $user="root";
				$password="";
				$db="agri_shop";
				$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");
			$query=mysqli_query($connect,"SELECT * FROM `product_id` WHERE 1 ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $pid = $row['id'];
}				
			$query=mysqli_query($connect,"SELECT * FROM `added_items` WHERE `id`='$pid' ") or die(mysqli_error($connect));
                             $x=1;
while($row=mysqli_fetch_array($query))
{
    $id = $row['id'];
	$name=$row['name'];
    $price=$row['price'];
	$quantity=$row['quantity'];
	$id=$row['supplier_id'];
	
		$query1=mysqli_query($connect,"SELECT * FROM `supplier_details` WHERE `id`=$id ") or die(mysqli_error($connect));
                          
while($row=mysqli_fetch_array($query1))
{
	
	$sname=$row['name'];
    $email=$row['email'];
	$contact=$row['contact'];
	$address=$row['address'];
}	
	
echo" <tr>
      
	<td>$name</td>
    <td>$price</td>
    <td>$quantity</td>
    <td>$sname</td>
	<td>$email</td>
	<td>$contact</td>
	<td>$address</td>
	</tr>
    ";


}
?> 

       
  
</table>
<br><br>

<center>
<h5>Enter Required Quantity in kg/litres</h5>
<form method="post" enctype="multipart/form-data" id="form" >  
     <select name="count" form="form">
  <option value="1">choose</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  
  <option value="6">6</option>
  
  <option value="7">7</option>
  
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="25">25</option>
  <option value="50">50</option>
  
 </select>
 <input type="submit" class="button" name="submit" Value="submit">
 
 
 
 <br><br>
</center>

<h3>Product quantity in kg/litres : <?php echo $count ?></h3>
<br><br>
<h3>Total Price : <?php echo $totalamt ?></h3>
<br>
<hr>

<h3>Payment Details</h3>
<h3>Bank Name: </h3><br><input type = "text" name="bkn">
<h3>Account Number: </h3><br><input type = "text" name="accno">

<h3>cvv Number: </h3><br><input type = "text" name="cvvno">
<br>

 <input type="submit" class="button" name="pay" Value="Pay">
 
</form>
</div>
</center>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
