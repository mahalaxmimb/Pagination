<style>
.page{
	margin-top: 5%;
	margin-left: 45%;
	margin-right: 40%;
	border: 2px solid black;
	border-radius: 5%;
	padding: 15px;
	width: 100px;
}
</style>
<?php 
$num_rec_per_page=3;

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'product_details');

if (isset($_GET["page"]))
{ 
	$page  = $_GET["page"]; 
}
else
{ 
	$page=1; 
} 

$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM product_details LIMIT $start_from, $num_rec_per_page"; 

$rs_result = mysqli_query($conn,$sql); //run the query
?> 
<h1>Pagination</h1><br>
<table border="1">
<tr><th>Name</th><th>Phone</th><th>Cost</th></tr>
<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['pdesc']; ?></td>     
            <td><?php echo $row['cost']; ?></td>     
            </tr>
<?php 
}; 
?> 
</table>
<?php 
$sql = "SELECT * FROM book"; 
$rs_result = mysqli_query($conn,$sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<div class='page'>
		<a href='database.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='database.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='database.php?page=$total_pages'>".'>|'."</a> 
		</div>"; 
?>
