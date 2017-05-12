<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><center>Clave</center></th>
                <th><center>Customer Numbe</center></th>
                <th><center>Date</center></th>
                <th><center>Invoice Number</center></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><center>Clave</center></th>
                <th><center>Customer Numbe</center></th>
                <th><center>Date</center></th>
                <th><center>Invoice Number</center></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php 
    $sqlTable = "SELECT * FROM invinfo";
    $query = $db->prepare($sqlTable);
	$query->execute();
	while ($row = $query->fetch(PDO::FETCH_OBJ))
	{
		//$arr = array("InvCruDateCrossing"=>$row->DateCrossing,"InvCruTrailerNumber"=>$row->trailerNumber,"InvCruAmount"=>$row->CruAmount,"InvCruDescription"=>$row->Description,"txtInvCruFrom"=>$row->CruFrom,"InvNum"=>$row->InvNum);
		    echo    "<tr>";
            echo    "<td><center>".$row->InvId."</center></td>";
            echo    "<td><center>".$row->InvCustomerNum."</center></td>";
            echo    "<td><center>".$row->InvDate."</center></td>";
            echo   "<td><center>".$row->InvNum."</center></td>";
            echo   "<td><center><a class='btn btn-primary' href='admin.php?m=modificar&id=".$row->InvId."'>Modificar</a></center></td>";
            echo   "<td><center><a target='_blanck' class='btn btn-primary' href='php/reporte.php?id=".$row->InvId."'>PDF</a></center></td>";
            echo   "</tr>";
	}
 ?>
        </tbody>
    </table>