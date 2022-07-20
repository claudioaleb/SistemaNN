$.ajax({
                        url : form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),                 
                        dataType: 'json',
                        success:function(response) {
                            console.log(response);

                            $("#createOrderBtn").button('reset');
                            
                            $(".text-danger").remove();
                            $('.form-group').removeClass('has-error').removeClass('has-success');

                            if(response.success == true) {
                                

                                $(".success-messages").html('<div class="alert alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                    ' <br /> <br /> <a type="button" onclick="printOrder('+response.order_id+')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Imprimier </a>'+
                    '<a href="orders.php?o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar nueva orden </a>'+
                    
                   '</div>');
                                
                            $("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);


                            $(".submitButtonFooter").addClass('div-hide');

                            $(".removeProductRowBtn").addClass('div-hide');
                                
                            } else {
                                alert(response.messages);                               
                            }
                        } 
                    }); // Fin Ajax




function getProductData(row = null) {
    if(row) {
        var productId = $("#nombre_producto"+row).val();        
        
        if(productId == "") {
            $("#precio_unitario"+row).val("");

            $("#cantidad"+row).val("");                     
            $("#total"+row).val("");


        } else {
            $.ajax({
                url: 'fetchSelectedProduct.php',
                type: 'post',
                data: {productId : productId},
                dataType: 'json',
                success:function(response) {
                    
                    $("#precio_unitario"+row).val(response.precio_venta);
                    $("#precio_unitarioValue"+row).val(response.precio_venta);

                    $("#cantidad"+row).val(1);

                    var total = Number(response.precio_venta) * 1;
                    total = total.toFixed(2);
                    $("#total"+row).val(total);
                    $("#totalValue"+row).val(total);
            
                    subAmount();
                }
            });  
        }
                
    } else {
        alert('Error! Refresque la Página');
    }
} // 


function getTotal(row = null) {
    if(row) {
        var total = Number($("#precio_unitario"+row).val()) * Number($("#cantidad"+row).val());
        total = total.toFixed(2);
        $("#total"+row).val(total);
        $("#totalValue"+row).val(total);
        
        subAmount();

    } else {
        alert('Error! Refresque la Página');
    }
}

function subAmount() {
    var tableProductLength = $("#productTable tbody tr").length;
    var subTotal = 0;
    for(x = 0; x < tableProductLength; x++) {
        var tr = $("#productTable tbody tr")[x];
        var count = $(tr).attr('id');
        count = count.substring(3);

        subTotal = Number(subTotal) + Number($("#total"+count).val());
    }

    subTotal = subTotal.toFixed(2);

    // sub total
    $("#sub_total").val(subTotal);
    $("#sub_totalValue").val(subTotal);

    // iva
    var iva = (Number($("#sub_total").val())/100) * 30;
    iva = iva.toFixed(2);
    $("#iva").val(iva);
    $("#ivaValue").val(iva);

    // total neto
    var totalNeto = (Number($("#sub_total").val()) + Number($("#iva").val()));
    totalNeto = totalNeto.toFixed(2);
    $("#total_neto").val(totalNeto);
    $("#total_netoValue").val(totalNeto);

    var descuento = $("#descuento").val();
    if(descuento) {
        var montoTotal = Number($("#total_neto").val()) - Number(descuento);
        montoTotal = montoTotal.toFixed(2);
        $("#monto_total").val(montoTotal);
        $("#monto_totalValue").val(montoTotal);
    } else {
        $("#monto_total").val(totalNeto);
        $("#monto_totalValue").val(totalNeto);
    } // /else descuento 

    var monto_pagado = $("#monto_pagado").val();
    if(monto_pagado) {
        monto_pagado =  Number($("#monto_total").val()) - Number(monto_pagado);
        monto_pagado = monto_pagado.toFixed(2);
        $("#saldo").val(monto_pagado);
        $("#saldoValue").val(monto_pagado);
    } else {    
        $("#saldo").val($("#monto_total").val());
        $("#saldoValue").val($("#monto_total").val());
    } // else

} // /sub total

function descuentoFunc() {
    var descuento = $("#descuento").val();
    var totalNeto = Number($("#total_neto").val());
    totalNeto = totalNeto.toFixed(2);

    var montoTotal;
    if(totalNeto) {   
        montoTotal = Number($("#total_neto").val()) - Number($("#descuento").val());
        montoTotal = montoTotal.toFixed(2);

        $("#monto_total").val(montoTotal);
        $("#monto_totalValue").val(montoTotal);
    } else {
    }

    var monto_pagado = $("#monto_pagado").val();

    var saldo;  
    if(monto_pagado) {
        saldo = Number($("#monto_total").val()) - Number($("#monto_pagado").val());
        saldo = saldo.toFixed(2);

        $("#saldo").val(saldo);
        $("#saldoValue").val(saldo);
    } else {
        $("#saldo").val($("#monto_total").val());
        $("#saldoValue").val($("#monto_total").val());
    }

} // Fin Descuento

// Monto Pagado
function montoPagado() {
    var montoTotal = $("#monto_total").val();

    if(montoTotal) {
        var saldo = Number($("#monto_total").val()) - Number($("#monto_pagado").val());
        saldo = saldo.toFixed(2);
        $("#saldo").val(saldo);
        $("#saldoValue").val(saldo);
    } 
} // Fin Monto Pagado


// Resetear Orden
function resetOrderForm() {
    
    $("#createOrderForm")[0].reset();
    
    $(".text-danger").remove();
    
    $(".form-group").removeClass('has-success').removeClass('has-error');
} // Fin Resetear Orden


// Añadir Producto
function addRow() {
    $("#addRowBtn").button("Añadiendo");

    var tableLength = $("#productTable tbody tr").length;

    var tableRow;
    var arrayNumber;
    var count;

    if(tableLength > 0) {       
        tableRow = $("#productTable tbody tr:last").attr('id');
        arrayNumber = $("#productTable tbody tr:last").attr('class');
        count = tableRow.substring(3);  
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;                  
    } else {

        count = 1;
        arrayNumber = 0;
    }

    $.ajax({
        url: 'fetchProductData.php',
        type: 'post',
        dataType: 'json',
        success:function(response) {
            $("#addRowBtn").button("reset");            

            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+                          
                '<td>'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                    '<div class="input-group-addon"><i class="icon-shopping-bag"></i></div>'+
                    '<select class="form-control" name="nombre_producto[]" id="nombre_producto'+count+'" onchange="getProductData('+count+')" >'+
                        '<option value="">Seleccione Producto</option>';

                        $.each(response, function(index, value) {
                            tr += '<option value="'+value[0]+'">'+value[1]+'</option>';                         
                        });
                                                    
                    tr += '</select>'+
                    '</div>'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<div class="input-group">'+
                    '<div class="input-group-addon"><i class="icon-credit"></i></div>'+
                    '<input type="text" name="precio_venta[]" id="precio_venta'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
                    '<input type="hidden" name="precio_ventaValue[]" id="precio_ventaValue'+count+'" autocomplete="off" class="form-control" />'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<div class="input-group">'+
                    '<div class="input-group-addon"><i class="icon-hash"></i></div>'+
                    '<input type="number" name="cantidad[]" id="cantidad'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<div class="input-group">'+
                    '<div class="input-group-addon"><i class="icon-credit"></i></div>'+
                    '<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
                    '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="icon-trash"></i></button>'+
                '</td>'+
            '</tr>';
            if(tableLength > 0) {                           
                $("#productTable tbody tr:last").after(tr);
            } else {                
                $("#productTable tbody").append(tr);
            }       

        }
    });

} // Fin Añadir Producto


// Remover Producto
function removeProductRow(row = null) {
    if(row) {
        $("#row"+row).remove();


        subAmount();
    } else {
        alert('Error! Refresque la Página');
    }
} // Fin Remover Producto