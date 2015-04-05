<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header">
        <h1>Control de gastos</h1>
    </div>
    
    
    <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Gastos más recientes de <?php echo $mes; ?> del <?php echo $año; ?></h3>
            </div>
            <div class="panel-body">
          
                  <div class="list-group">
                      <?php if (count($actuales) < 1) { ?>
                         <a href="#" class="list-group-item"> No se han encontrado resultados </a> 
                      <?php }?>          
                      
                      <?php foreach ($actuales as $actual) {?>                                            <!-- for para mostrar todos los gastos del usuario -->
                        <a href="#" class="list-group-item"><?php echo $actual->nombre; ?> --> <?php echo $actual->valor.'€'; ?></a> 
                      <?php } ?>
                  </div>
            </div>
                    <button type="button" onclick="location.href='<?php echo $this->Url->build(array('controller' => 'Expenses', 'action' => 'inicioAnterior', $mes_num));?>'" value="menos" class="btn btn-sm btn-success"><< Mes anterior</button>
                    <button type="button" onclick="location.href='<?php echo $this->Url->build(array('controller' => 'Expenses', 'action' => 'inicioSiguiente', $mes_num));?>'" class="btn btn-sm btn-success pull-right">Mes siguiente >></button>

          </div>
        </div><!-- /.col-sm-4 -->
    
        <div>
             <button type="button" onclick="location.href='add'" class="btn btn-lg btn-success">Añadir un nuevo gasto</button>
        </div>
        
    </div>



