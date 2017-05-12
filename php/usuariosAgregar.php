<?php

if ( isset($_POST['nombre']) ){
    
   
    


	$nombre 	    = mysql_real_escape_string($_POST['nombre']);
    $password 	    = mysql_real_escape_string($_POST['password']);
    $correo         = mysql_real_escape_string($_POST['correo']);
 //getdate converted day

    
	 if ( mysql_query("INSERT INTO usuarios SET nombre='".$nombre."',privilegio='".$privilegio."',email='".$correo."',password='".$password."'") ){
		
		$errorMsg = '<div class="alert alert-success">
				<i class="fa fa-check"></i> Usuario agregado correctamente.
			</div>';
	}
	 else
	{
		$errorMsg = '<div class="alert alert-danger">
			<i class="fa fa-times"></i> Error, intenta nuevamente.
		</div>';

	}
}

function getRealIP() {

       if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }
}
 $fingreso = date("Y/m/d");

?>	
	<section class="panel panel-default">
			<header class="panel-heading">
				<i class="fa fa-user"></i> Agregar Usuario
				<?php 
					echo $_SERVER["REMOTE_ADDR"];
				 ?>
			</header>
			<div class="panel-body">
				<form class="bs-example form-horizontal" action="" method="post">
					<?php echo $errorMsg; ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-6 control-label">Nombre</label>
								<div class="col-md-6"><input type="text" name="nombre" class="form-control"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Usuario</label>
								<div class="col-md-7"><input type="text" name="nombre" class="form-control"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-6 control-label">Password</label>
								<div class="col-md-6"><input type="text" name="nombre" class="form-control"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Correo</label>
								<div class="col-md-7"><input type="text" name="nombre" class="form-control"></div>
							</div>
						</div>
					</div>
					<div class="row">
					     <div class="col-md-6">
							<div class="form-group">
								<label class="col-md-6 control-label">Fecha Ingreso</label>
								<div class="col-md-6"><input type="text" name="nombre" class="form-control" placeholder="<?php echo $fingreso; ?>" disabled></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Fecha Expiracion</label>

								<div class="container">
								    <div class="row">
								        <div class='col-sm-4'>
								            <div class="form-group">
								                <div class='input-group date' id='datetimepicker1'>
								                    <input type='text' class="form-control" />
								                    <span class="input-group-addon">
								                        <span class="glyphicon glyphicon-calendar"></span>
								                    </span>
								                </div>
								            </div>
								        </div>
								        <script type="text/javascript">
								            $(function () {
								                $('#datetimepicker1').datetimepicker({
									                format: 'YYYY/MM/DD'
									            });;
								            });
								        </script>
								    </div>
								</div>
							</div>
						</div
					</div>
					<div class="row">
						

					</div>

					<div class="line line-dashed line-lg pull-in"></div>
					<div class="form-group text-right">
						<div class="col-lg-12"> 
							<button type="submit" class="btn btn-md btn-success"><i class="fa fa-check icon"></i> Agregar</button>
							<a href="admin.php?m=usuarios" class="btn btn-md btn-danger"><i class="fa fa-times icon"></i> Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</section>
