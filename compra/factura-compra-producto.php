<?php 

$id_venta = $_GET['id_venta'];

	include 'plantilla.php';
	include 'conexion.php';

	$query2 = "SELECT venta_producto.id_venta, venta_producto.fecha_venta, venta_producto.rela_cliente, venta_producto.sub_total, venta_producto.iva, venta_producto.total_neto, venta_producto.descuento, venta_producto.monto_total, venta_producto.monto_pagado, venta_producto.saldo, venta_producto.metodo_pago, productos.descripcion_producto, productos.nombre_producto, productos.precio_venta, detalle_ventas.cantidad, detalle_ventas.total FROM detalle_ventas
	JOIN productos on detalle_ventas.id_producto = productos.id_producto
	JOIN venta_producto ON detalle_ventas.id_venta=venta_producto.id_venta
    JOIN clientes ON venta_producto.rela_cliente=clientes.id_cliente
	WHERE venta_producto.id_venta = $id_venta";

	$resultado2 = $connect->query($query2);

	$pdf = new facturaProducto('P', 'mm', array(130,130));
	$pdf->AliasNbPages();
	$pdf->AddPage();   
	
	$pdf->Ln(5);

	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(50,6,'PRODUCTO',1,0,'C',1);
	$pdf->Cell(20,6,'PRECIO/UN',1,0,'C',1);
	$pdf->Cell(20,6,'CANTIDAD',1,0,'C',1);
	$pdf->Cell(20,6,'TOTAL',1,1,'C',1);

	$totalGasto = 0;

	
	while($row2 = $resultado2->fetch_assoc() ){
		$id_venta = $row2['id_venta'];
		$sub_total = $row2['sub_total'];
		$total_neto = $row2['total_neto'];
		$descuento = $row2['descuento'];
		$monto_total = $row2['monto_total'];
		$monto_pagado = $row2['monto_pagado'];
		$saldo = $row2['saldo'];

		$totalGasto = $totalGasto + $row2['monto_pagado'];
		$pdf->SetFillColor(252,252,252);
		$pdf->SetFont('Arial','',7);

	    $pdf->Cell(50,6,utf8_decode($row2['nombre_producto']),1,0,'',1);
	    $pdf->Cell(20,6,'$'.number_format($row2['precio_venta']),1,0,'C',1);
	    $pdf->Cell(20,6,$row2['cantidad'],1,0,'C',1);
	    $pdf->Cell(20,6,'$'.number_format($row2['total']),1,1,'C',1);
		
	}

	$pdf->Ln(3);
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(232,232,232);
	$pdf -> Text(46,6,'FACTURA Nro: '.$id_venta,2,'.','.',1,1,'L',1);
	$pdf -> Cell(50,6,'Sub-Total: $'.number_format($sub_total,2,'.','.'),1,1,'L',1);
	$pdf -> Cell(50,6,'Total-Neto: $'.number_format($total_neto,2,'.','.'),1,1,'L',1);
	$pdf -> Cell(50,6,'Descuento: $'.number_format($descuento,2,'.','.'),1,1,'L',1);
	$pdf -> Cell(50,6,'TOTAL A PAGAR: $'.number_format($monto_total,2,'.','.'),1,1,'L',1);
	$pdf -> Cell(50,6,'Pagado: $'.number_format($monto_pagado,2,'.','.'),1,1,'L',1);
	$pdf -> Cell(50,6,'Saldo: $'.number_format($saldo,2,'.','.'),1,1,'L',1);

	$pdf->Output(utf8_decode('Factura.pdf'), 'I');

?>