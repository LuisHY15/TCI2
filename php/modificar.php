<script type="text/javascript">	
	function traerCruces(id){
		var InvId = id;
		$.ajax({
			url:"php/llenarTabla.php",
			type:"GET",
			data:{"id":id,"clave":2}
		}).done(function(data){
			var response = $.parseJSON(data);
			$("#txtInvCruDateCrossingUpt").val(response[0]["InvCruDateCrossing"]);
			$("#txtInvCruTrailerNumberUpt").val(response[0]["InvCruTrailerNumber"]);
			$("#txtInvCruDescriptionUpt").val(response[0]["InvCruDescription"]);
			$("#txtInvCruUpt").val(InvId);
			$("#txtInvCruDateCrossingUpt").prop('disabled', false);
			$("#txtInvCruTrailerNumberUpt").prop('disabled', false);
			$("#txtInvCruDescriptionUpt").prop('disabled', false);
			/*for (var i = response.length - 1; i >= 0; i--) {
				$("#tablacruces tbody").append("<tr><td>"+response[i]["InvCruDateCrossing"]+"</td><td>"+response[i]["InvCruTrailerNumber"]+"</td><td>"+response[i]["InvCruAmount"]+"</td><td>"+response[i]["InvCruDescription"]+"</td><td>"+response[i]["txtInvCruFrom"]+"</td><td>"+response[i]["InvNum"]+"</td><tr>")
			}*/
		})	
	}
	function actualizarCruce(){
		var InvCruDateCrossing 			= $("#txtInvCruDateCrossingUpt").val();
		var InvCruTrailerNumber 		= $("#txtInvCruTrailerNumberUpt").val();
		var InvCruDescription			= $("#txtInvCruDescriptionUpt").val();
		var InvCru 						= $("#txtInvCruUpt").val();
			$.ajax({
			url:"php/actualizarCruce.php",
			type:"GET",
			data:{"InvCruDateCrossing":InvCruDateCrossing,"InvCruTrailerNumber":InvCruTrailerNumber,
			"InvCruDescription":InvCruDescription,"InvCru":InvCru}
			}).done(function(data){	
				location.reload();
			});
	}
</script>
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
		Nuevo
		</button>
	</div>
</div>
<br>
<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                	<th width="200"><center>DATE OF CROSSING</center></th>
		    		<th width="150"><center>TRAILER NUMBER</center></th>
		    		<th width="150"><center>AMOUNT<center></th>
		    		<th width="250"><center>DESCRIPTION</center></th>
		    		<th width="100"><CENTER>FROM</CENTER></th>	
            		<th></th>	
            </tr>
        </thead>
        <tbody>
            <?php 
    $sqlTable = "SELECT * FROM invcruce WHERE InvId=".$_GET['id'];
    $query = $db->prepare($sqlTable);
	$query->execute();
	while ($row = $query->fetch(PDO::FETCH_OBJ))
	{
		//$arr = array("InvCruDateCrossing"=>$row->DateCrossing,"InvCruTrailerNumber"=>$row->trailerNumber,"InvCruAmount"=>$row->CruAmount,"InvCruDescription"=>$row->Description,"txtInvCruFrom"=>$row->CruFrom,"InvNum"=>$row->InvNum);
		    echo   "<tr>";
            echo   "<td><center>".$row->InvCruDateCrossing."</center></td>";
            echo   "<td><center>".$row->InvCruTrailerNumber."</center></td>";
            echo   "<td><center>".$row->InvCruAmount."</center></td>";
            echo   "<td><center>".$row->InvCruDescription."</center></td>";
            echo   "<td><center>".$row->txtInvCruFrom."</center></td>";
            echo   "<td><button  class='btn btn-primary' id='".$row->InvCru."' onClick='traerCruces(this.id)' >Elegir</button></td>";
            echo   "</tr>";
	}
 ?>
        </tbody>
    </table>
<div class="line line-dashed line-lg pull-in"></div>
    <!-- Button trigger modal -->
<div class="row form-horizontal">
			<input  class="form-control" id='txtInvCruUpt' type="hidden"  />
        	<div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5" >DATE OF CROSSING:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" id='txtInvCruDateCrossingUpt'  disabled />
                  </div>
                </div>
            </div>
            <div class="col-lg-6" >
                <div class="form-group">
                  <label class="control-label col-sm-5">TRAILER NUMBER:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" id='txtInvCruTrailerNumberUpt' disabled="" />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">AMOUNT:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" disabled value="90" id='txtInvCruAmountUpt' disabled />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">DESCRIPTION:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" id='txtInvCruDescriptionUpt' disabled=""  />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">FROM:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" value="MAHLE" id='txtInvCruFromUpt' disabled />
                  </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                  <button id="btnActualizar" onclick="actualizarCruce()" class="btn btn-primary  pull-right" >Actualizar</button>
                </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar un cruce</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="txtInvIdIns" hidden value="<?php echo $_GET['id']; ?>" id="txtInvIdIns">
        <div class="row form-horizontal">
        	<div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5" >DATE OF CROSSING:</label>
                  <div class="col-sm-7">
                  
                        <input type='text' class="form-control" id='txtInvCruDateCrossingDet'  />
                        <script type="text/javascript">
                    $('#txtInvCruDateCrossingDet').datetimepicker({
                              format: 'YYYY/MM/DD'  
                          });
                  </script>
                  </div>
                </div>
            </div>
            <div class="col-lg-6" >
                <div class="form-group">
                  <label class="control-label col-sm-5">TRAILER NUMBER:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" id='txtInvCruTrailerNumberDet'  />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">AMOUNT:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" disabled value="90" id='txtInvCruAmountDet' disabled />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">DESCRIPTION:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" id='txtInvCruDescriptionDet'  />
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label col-sm-5">FROM:</label>
                  <div class="col-sm-7">
                        <input type='text' class="form-control" value="MAHLE" id='txtInvCruFromDet' disabled />
                  </div>
                </div>
            </div>
        </div>
        		    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarDet"  >Guardar</button>
      </div>
    </div>
  </div>
</div>