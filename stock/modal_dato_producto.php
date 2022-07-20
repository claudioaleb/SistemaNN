<div class="modal fade" id="dataVista" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">DATOS DEL PRODUCTO</h5>
      </div>

<div class="modal-body">
  <div id="datos_ajax"></div>

<div class="row">
    <div class="form-group col-lg-6">
    <h6 class="text-muted">ID PRODUCTO</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="text" name="id_producto" id="id_producto" class="form-control" disabled>
           <input type="hidden" name="id_producto" id="id_producto" class="form-control">
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
   

   <div class="form-group col-lg-6">
    <h6 class="text-muted">FECHA DE ALTA</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-calendar"></i></div>
           <input type="text" name="fecha_alta_producto" id="fecha_alta_producto" class="form-control" disabled>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
</div>

<div class="row">
  <div class="form-group col-lg-6">
    <h6 class="text-muted">FECHA DE CADUCIDAD</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-calendar"></i></div>
           <input type="date" name="fecha_caducidad_producto" id="fecha_caducidad_producto" class="form-control" disabled>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>

    <div class="form-group col-lg-6">
    <h6 class="text-muted">DESCRIPCIÓN</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="text" name="descripcion_producto" id="descripcion_producto" class="form-control" disabled>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>

   <div class="form-group col-lg-6">
        <h6 class="text-muted">CATEGORÍA DE PRODUCTO</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-creative-commons-attribution"></i></div>
               <input type="text" name="tipo_producto" id="rela_categoria" class="form-control" disabled>
           </div>
               <span class="help-block" id="error"></span>
       </div>
</div>

<div class="row">
       <div class="form-group col-lg-4">
        <h6 class="text-muted">CANTIDAD INGRESADA</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-hash"></i></div>
               <input type="text" name="cantidad_ingreso" id="cantidad_ingreso" class="form-control" disabled>
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-4">
        <h6 class="text-muted">COSTO UNITARIO</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="costo_unitario" id="costo_unitario" class="form-control" disabled>
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-4">
        <h6 class="text-muted">COSTO TOTAL</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="costo_total" id="costo_total" class="form-control" disabled>
           </div>
           <span class="help-block" id="error"></span>
       </div>
</div>

<div class="row"> 
       <div class="form-group col-lg-6">
        <h6 class="text-muted">PRECIO DE VENTA</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="precio_venta" id="precio_venta" class="form-control" disabled>
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-6">
        <h6 class="text-muted">ESTADO ACTUAL</h6>
          <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-alert-circle"></i></div>
           <input type="text" name="estado_producto" id="estado_producto" class="form-control" disabled>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
</div>

<div class="row">
           <div class="form-footer">
              <div class="modal-footer">
                <div class="pull-right">
                   <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
           </div>
        </div>

</div>

</div>
</div>
</div>
