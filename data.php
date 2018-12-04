<html>
<body>
<?php
    $conn=mysqli_connect("localhost","root","","products_l3");
    $page=$_GET["page"];

    if($page=="" || $page=="1")
    {
        $page1=0;
    }    
    else{
        $page1=($page*5)-5;
    }
    $sql="select * from pro_details limit 0 ,5";
    $result = $conn->query($sql);
    while($r = mysqli_fetch_array($result)){

    echo $r["pname"];
    echo "<br>";
    } 
    ?>

    <?php 
    $countres =mysqli_query($conn,"SELECT * FROM pro_details");
    $row = mysqli_num_rows($countres);
    $total_records = $row[0];
    $a= ceil($total_records/5);
    for ($i=1; $i<=$a; $i++) {  
        ?><a href="data.php?page=<?php echo $i;?>">
            <?php echo $i." "; ?></a>
        <?php
        }; 
?>
</body>
</html>