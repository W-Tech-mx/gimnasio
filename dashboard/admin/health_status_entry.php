﻿<?php
require '../../include/db_conn.php';
page_protect();

$uid=0;
$uname=0;
$udob=0;
$ujoin=0;
$ugender=0;
$cal="";
$hei="";
$wei="";
$fa="";
$remar="";

if(isset($_POST['submit'])){
	$calorie=$_POST['calorie'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$fat=$_POST['fat'];
	$remarks=$_POST['remarks'];
	$userid=$_POST['usrid'];

	$query="update health_status set calorie='".$calorie."', height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$userid."'";

	if(mysqli_query($con,$query)){
		echo "<head><script>alert('Estado de Salud Agregado ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_health_status.php'>";

	}
	else{
	 echo "<head><script>alert('NO ES EXITOSO, verifique nuevamente');</script></head></html>";
	 echo "error".mysqli_error($con);
	 echo "<meta http-equiv='refresh' content='0; url=new_health_status.php'>";
        
	}

	
}
else{
	$uid=$_POST['uid'];
	$uname=$_POST['uname'];
	$udob=$_POST['udob'];
	$ujoin=$_POST['ujoin'];
	$ugender=$_POST['ugender'];
	
	$sql="select * from health_status where uid='".$uid."'";
	$result=mysqli_query($con,$sql);
	if($result){
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
       	$cal=$row['calorie'];
		$hei=$row['height'];
		$wei=$row['weight'];
		$fa=$row['fat'];
		$remar=$row['remarks'];
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
    <body id="body-pd">

            <?php include('nav.php'); ?>


    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Bienvenid@ <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Cerrar Sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		

		<hr />

		

		
		<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Editar Estado de Salud</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
			<td height="35">ID Membresía:</td>
           	   <td height="35"><input type="text" id="boxx" readonly value=<?php echo $uid ?> name="usrid"></td>
         	   </tr>
			   
			   <tr>
               <td height="35">Nombre de Usuario:</td>
               <td height="35"><input type="text" id="boxx" readonly value=<?php echo $uname ?>></td>
             </tr>
             <tr>
               <td height="35">Fecha de Nacimiento:</td>
               <td height="35"><input type="text" id="boxx" readonly value=<?php echo $udob ?>></td>
             </tr>
             <tr>
               <td height="35">Género:</td>
               <td height="35"><input type="text" id="boxx" readonly value=<?php echo $ugender ?>></td>
             </tr>
             <tr>
               <td height="35">Fecha de Ingreso:</td>
               <td height="35"><input type="text" id="boxx" readonly value=<?php echo $ujoin ?>></td>
             </tr>
            <tr>
               <td height="35">Calorias:</td>
               <td height="35"><input type="text" id="boxx" name="calorie" value='<?php echo $cal?>'></td>
             </tr>
            <tr>
               <td height="35">Altura:</td>
               <td height="35"><input type="text" id="boxx" name="height" value='<?php echo $hei?>'placeholder="Enter Height in cm"></td>
             </tr>
            
			
			 
             <tr>
               <td height="35">Peso:</td>
               <td height="35"><input type="text" id="boxx" name="weight" value='<?php echo $wei?>'placeholder="Enter Weight in kg"></td>
             </tr>
            <tr>
               <td height="35">Grasa:</td>
               <td height="35"><input type="text" id="boxx" name="fat" value='<?php echo $fa?>'></td>
             </tr>
			 <tr>
               <td height="35">Observaciones:</td>
               <td height="35"><textarea id="remarks" rows="5" name="remarks" placeholder="Remarks not more than 200 character" style="margin: 0px; width: 220px; height: 72px; resize:none;"><?php echo $remar?></textarea></td>
             </tr>
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Enviar" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Borrar"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>

