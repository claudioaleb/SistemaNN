<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'north_nutrition');
  $mysqli->set_charset('utf8');

?>


<html>
<html lang="en">
<head>

<!-- JQuery Envio de Datos sin recargar pagina -->
    <script language="javascript" src="../estilos/js/jquery-1.3.min.js"></script>
    <script language="javascript">
    $(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
    $('#form, #fat, #register-form').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);

            }
        })
        
        return false;
    }); 
})  
</script>
<!-- FIN JQuery Envio de Datos sin recargar pagina -->




<!-- Estilo de Cuadro de texto de Datos Cargados-->
<style>
#result {
  width:115px;
  padding:0px;
  border:1px solid #bfcddb;
  margin:auto;
  margin-top:15px;
  border-radius: 3px;
}
</style>
<!-- FIN Estilo de Cuadro de texto de Datos Cargados-->
</head>
<body>


<form role="form" id="register-form" name="register-form" action="alta_producto.php">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
        <h5 class="modal-title">AÑADIR PRODUCTO</h5>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>

<div class="row">
    <div class="form-group col-lg-6">
    <h6 class="text-muted">ID PRODUCTO</h6>
       <div class="input-group">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="text" name="id_producto" id="id_producto" class="form-control" value="<?php echo time(); ?>" readonly>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
   

   <div class="form-group col-lg-6">
    <h6 class="text-muted">FECHA DE ALTA</h6>
       <div class="input-group">
           <div class="input-group-addon"><i class="icon-calendar"></i></div>
           <input type="text" id="fecha_alta_producto" name="fecha_alta_producto" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
    <h6 class="text-muted">FECHA DE CADUCIDAD</h6>
       <div class="input-group">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="date" name="fecha_caducidad_producto" id="fecha_caducidad_producto" class="form-control">
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>

    <div class="form-group col-lg-6">
    <h6 class="text-muted">DESCRIPCIÓN</h6>
       <div class="input-group">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="text" name="descripcion_producto" id="descripcion_producto" class="form-control" placeholder="Ingrese Detalles">
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
</div>

<div class="row">
       <div class="form-group col-lg-6">
        <h6 class="text-muted">CATEGORÍA DE PRODUCTO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-creative-commons-attribution"></i></div>
               <select name="rela_categoria" class="form-control">
               <option value="">Seleccione Categoría</option>
                   <?php
                    
                   $query = $mysqli -> query ("SELECT * FROM categoria_producto");
                      
                   while ($valores = mysqli_fetch_array($query)) {
                        
                   echo "<option value='$valores[id_categoria]'>$valores[tipo_producto]</option>";
                          
                   }
                   ?>
           </select>
           </div>
               <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-6">
        <h6 class="text-muted">CANTIDAD</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-hash"></i></div>
               <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad (Nº)">
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-6">
        <h6 class="text-muted">COSTO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" id="costo_producto" name="costo_producto" class="form-control" placeholder="Costo ($)">
           </div>
           <span class="help-block" id="error"></span>
       </div>
</div>

<div class="row"> 
       <div class="form-group col-lg-6">
        <h6 class="text-muted">PRECIO DE VENTA</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" id="precio_producto" name="precio_producto" class="form-control" placeholder="Precio ($)">
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-6">
        <h6 class="text-muted">ESTADO ACTUAL</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-alert-circle"></i></div>
               <input type="text" id="estado_producto" name="estado_producto" class="form-control" value="ACTIVO" readonly>
           </div>  
       <span class="help-block" id="error"></span>                    
   </div>
</div>

<div class="row">
           <div class="form-footer">
              <div class="modal-footer">
                <div class="pull-right">
                   <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                   <button type="submit" class="btn btn-success btn-sm"><i class="icon-check-square"></i> REGISTRAR</button>

                   <!-- Cuadro de texto confirmacion de alta de persona -->
                   <div id="result"></div>
                   <!-- FIN Cuadro de texto confirmacion de alta de persona -->
                </div>
              </div>
           </div>
        </div>
</div>

      
</div>
</div>
</div>
</form>
</body>
</html>