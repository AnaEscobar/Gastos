<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header">
        <h1>Añadir un nuevo gasto</h1>
    </div>
    <div class="panel-body">
          
    <form action="mailto:emaildelaempresaquehaceelformulario@email.com" method="post" enctype="text/plain">
        Gasto: <input type="text" name="gasto" size="25" maxlength="50"  placeholder="Introduce un nombre para reconocer el gasto"><br>
        Comentarios: <input type="text" name="comentarios" size="35" maxlength="100" placeholder="Introduce algún comentario"><br>
        <div> 
         Tipo de gasto:
            <br>
            <?php foreach ($tipos as $tipo) {?>  
                <input type="radio" name="tipo" value="<?php $tipo->id?>"> <?php echo $tipo->nombre?>
                <br>
            <?php }?>
          <br>
            Repetición:
            <br>
            <?php foreach ($periodos as $periodo) {?>  
                <input type="radio" name="periodo" value="<?php $periodo->id?>"> <?php echo $periodo->tiempo?>
                <br>
            <?php }?>
     </div>
    
    <br>
    
    
    
        <div style="text-align:right">
             <button type="button" onclick="location.href='inicio'" class="btn btn-lg btn-primary">Volver</button>
             <button type="button" onclick="location.href='inicio'" class="btn btn-lg btn-success">Añadir</button>
       
        </div>
        </div>
        </div>