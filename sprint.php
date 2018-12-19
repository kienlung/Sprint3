<!DOCTYPE html>
<html>
<head>
<title>Sprint</title>	
<link rel="stylesheet" type="text/css" href="sprint.css">
</head>
<body background = "sprint.jpg"> 
 
<header> VuurwerkShop Gewoon Boem !</header>

<nav class="enkel">

	<ul>
		<div class="dropdown">
  <button class="dropbtn">Assortiment</button>
  
  <div class="dropdown-content">
    <a href="knalvuurwerk.php">Knalvuurwerk</a>
    <a href="vuurpijlen.php">Vuurpijlen</a>
    <a href="veiligheid.php">Veiligheid</a>
	
  </div>
 
</div>
		<li><a href="sprint.php">Home</a></li>
		<li><a href="contact.php">Contact</a></li>

	</ul>	
	
</nav>

	 <a href ="winkelwagen.html">
<img src="winkelwagen.jpg" class="winkelwagen" alt="winkelwagen" width="35" height="35">

</a>
<!-- thunderking -->
<?php
	include_once ('connect.php');
	$query="select * from vuurwerk
	where product= 'thunderking'";
	$result=mysqli_query($con, $query);
		while($rows= mysqli_fetch_assoc($result)) {
		  $thunder=$rows['Product'];
		$thunderprijs=$rows['Prijs']; 
		}
	?>

	<!-- crossair -->
	<?php
	include_once ('connect.php');
	$query="select * from vuurwerk
	where product= 'crossair'";
	$result=mysqli_query($con, $query);
		while($rows= mysqli_fetch_assoc($result)) {
		  $cross=$rows['Product'];
		$crossprijs=$rows['Prijs']; 
		}
	?>

	<!-- aansteeklont -->
	<?php
	include_once ('connect.php');
	$query="select * from vuurwerk
	where product= 'aansteeklont'";
	$result=mysqli_query($con, $query);
		while($rows= mysqli_fetch_assoc($result)) {
		  $lont=$rows['Product'];
		$lontprijs=$rows['Prijs']; 
		}
	?>

  <article>
  
  <h1> Aanbiedingen </h1>
 
     <div class= "thunder">
  
	<tr>

	    <td><?php echo $thunder; ?></td>
		<td>&euro;<?php echo $thunderprijs; ?></td>
		 </br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>
	  

</br>  
		<input action="winkelwagenshow.php" name="thunderking" value="toevoegen" type="submit">

		</div>
		
		
	</tr>	
	
	     <div class= "cross">
  
	<tr>

	    <td><?php echo $cross; ?></td>
		<td>&euro;<?php echo $crossprijs; ?></td>
		</br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>
	  

</br>  
		<input action="winkelwagenshow.php" value="toevoegen" type="submit">
		</div>
		
		
	</tr>	
     <div class= "lont">
  
	<tr>

	    <td><?php echo $lont; ?></td>
		<td>&euro;<?php echo $lontprijs; ?></td>
		</br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>


</br>  
		<input action="winkelwagenshow.php" value="toevoegen" type="submit">
	</div>
	
		
		
		
	</tr>	

	<tbody>
	<table class="gridtable">
	
	
<?php

if(isset($_POST['submit'])){
	if(getimagesize($_FILES['image']['tmp_name'])==FALSE) {
		echo "failed";	
	} 
	
	else {
	$name=addslashes($_FILES['image']['name']);
	$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
	saveimage($name,$image);
	}
}

function saveimage($name,$image){
$con = mysqli_connect("localhost","root","","vuurwerkshop");
$sql="insert into vuurwerk (name,image) values('$name','$image')";
$query=mysqli_query($con,$sql);
if($query) {
	echo "succes";
}

else { 
echo "not uploaded";
}
}

display();

function display(){
	$con=mysqli_connect("localhost", "root", "", "vuurwerkshop");
	$sql="select * from vuurwerk
	where product= 'Thunderking'
	or product= 'crossair'
	or product= 'aansteeklont'";
	$query=mysqli_query($con,$sql);
	$num=mysqli_num_rows($query);
	for ($i=0; $i < $num; $i++) {
		$result=mysqli_fetch_array($query);
		$img=$result['image'];
		echo "<td>" . '<img src="data:image;base64,'.$img.'">' . "<td>";
		
		
	}
}
			

?>

	</tbody>
</table>
</div>
	
	</tbody>
	</table>
	</article>
    
  
<footer>

</footer>


</body>
</html>