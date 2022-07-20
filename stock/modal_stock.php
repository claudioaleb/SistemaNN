
<form id="actualizarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">AÑADIR STOCK DE PRODUCTO</h5>
      </div>

<div class="modal-body">
  <div id="datos_ajax"></div>

<div class="row">
    <div class="form-group col-lg-6">
    <h6 class="text-muted">ID PRODUCTO</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-folder"></i></div>
           <input type="text" id="id_producto" class="form-control" disabled>
           <input type="hidden" name="rela_producto" id="id_producto" class="form-control">
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>

      <div class="form-group col-lg-6">
        <h6 class="text-muted">Nº DE COMPROBANTE</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-file-minus"></i></div>
               <input type="number" id="numero_comprobante" name="numero_comprobante" class="form-control">
           </div>  
          <span class="help-block" id="error"></span>                    
       </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
    <h6 class="text-muted">DESCRIPCIÓN</h6>
       <div class="input-group input-group-sm">
           <div class="input-group-addon"><i class="icon-info2"></i></div>
           <input type="text" id="descripcion_producto" class="form-control" disabled>
       </div>  
       <span class="help-block" id="error"></span>                    
   </div>
   <div class="form-group col-lg-6">
        <h6 class="text-muted">CANTIDAD</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-package"></i></div>
               <input type="number" name="cantidad_ingreso" id="cantidad_ingreso" class="form-control">
           </div>
           <span class="help-block" id="error"></span>
    </div>

        <div class="form-group col-lg-6">
        <h6 class="text-muted">COSTO UNITARIO</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="costo_unitario" id="costo_unitario" class="form-control">
           </div>
           <span class="help-block" id="error"></span>
       </div>
</div>

<div class="row">
       <div class="form-group col-lg-6">
        <h6 class="text-muted">COSTO TOTAL</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="costo_total" id="costo_total" class="form-control">
           </div>
           <span class="help-block" id="error"></span>
       </div>

       <div class="form-group col-lg-6">
        <h6 class="text-muted">PRECIO DE VENTA</h6>
           <div class="input-group input-group-sm">
               <div class="input-group-addon"><i class="icon-credit"></i></div>
               <input type="text" name="precio_venta" id="precio_venta" class="form-control">
           </div>
           <span class="help-block" id="error"></span>
       </div>
</div>

<div class="row">
           <div class="form-footer">
              <div class="modal-footer">
                <div class="pull-right">
                   <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                   <button type="submit" class="btn btn-success btn-sm"><i class="icon-refresh-cw"></i> ACTUALIZAR</button>
                </div>
              </div>
           </div>
        </div>
</div>

</div>
</div>


</div>
</form>
