<!DOCTYPE html>
<html>
<head>
<title>Sprint</title>	
<link rel="stylesheet" type="text/css" href="Sprint.css">
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

	 <a href ="winkelwagen.php">
<img src="winkelwagen.jpg" class="winkelwagen" alt="winkelwagen" width="35" height="35">

</a>

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
	
	<!-- BombaRockets -->
<?php
	include_once ('connect.php');
	$query="select * from vuurwerk
	where product= 'BombaRockets'";
	$result=mysqli_query($con, $query);
		while($rows= mysqli_fetch_assoc($result)) {
		  $bomba=$rows['Product'];
		$bombaprijs=$rows['Prijs']; 
		}
	?>
	
	<!-- Sputniks -->
<?php
	include_once ('connect.php');
	$query="select * from vuurwerk
	where product= 'sputniks'";
	$result=mysqli_query($con, $query);
		while($rows= mysqli_fetch_assoc($result)) {
		  $sputniks=$rows['Product'];
		$sputniksprijs=$rows['Prijs']; 
		}
	?>

  <article>
  
  <h1> Vuurpijlen </h1>
  
	  <div class= "cross2">
  
	<tr>

	    <td><?php echo $cross; ?></td>
		<td>&euro;<?php echo $crossprijs; ?></td>
			</br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>

</br>  
		<input action="winkelwagenshow.php" name="thunderking" value="toevoegen" type="submit">
		
		</div>
		
		
		 <div class= "bomba">
  
	<tr>

	    <td><?php echo $bomba; ?></td>
		<td>&euro;<?php echo $bombaprijs; ?></td>
			</br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>

</br>  
		<input action="winkelwagenshow.php" name="thunderking" value="toevoegen" type="submit">
		
		</div>
		
		</tr>	
		
		 <div class= "sputniks">
  
	<tr>

	    <td><?php echo $sputniks; ?></td>
		<td>&euro;<?php echo $sputniksprijs; ?></td>
			</br></br></br>
		</br></br></br>
		</br></br></br>
		</br></br></br>

</br>  
		<input action="winkelwagenshow.php" name="thunderking" value="toevoegen" type="submit">
		
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
	where product= 'bombarockets'
	or product= 'sputniks'
	or product= 'crossair'";
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
<p>Vuurwerkshop Gewoon Boem!</p> <div class="contactfooter"><a href="Contact.php">Contactgegevens</a></div>
Stolwijkstraat 8</br>
3079DN Rotterdam</br></p>


</footer>


</body>
</html>