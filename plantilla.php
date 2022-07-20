<?php 

	require 'fpdf/fpdf.php';

	/**
	* Clase Para los Catálogo de Clientes
	*/
	class PDF extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE SOCIOS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}


	/**
	* Reporte de Clientes Activos  
	*/
	class facturaProducto extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(51,10,utf8_decode( 'NORTH NUTRITION'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Ln(10);
			$this->SetFont('Arial','B',8);
			$this->Cell(28, 5, ' Fecha: '.date('d-m-Y').'', 1);
			$this->Ln(10);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}

	/**
	* Reporte de Clientes Inactivos  
	*/
	class Inactivos extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE SOCIOS INACTIVOS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	/**
	* Reporte de Clases  
	*/
	class Clases extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE CLASES'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	/**
	* Reporte de Clases Activas 
	*/
	class ClasesActivas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE CLASES ACTIVAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	/**
	* Reporte de Clases Activas 
	*/
	class ClasesInactivas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE CLASES INACTIVAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}



	/**
	* Reporte de Rutinas
	*/
	class Rutinas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE RUTINAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	/**
	* Reporte de Rutinas Activas 
	*/
	class RutinasActivas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE RUTINAS ACTIVAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	/**
	* Reporte de Rutinas Inactivas 
	*/
	class RutinasInactivas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }
		
		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE RUTINAS INACTIVAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}



	/**
	* Clase Para los Catálogo de Productos
	*/
	class Productos extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE PRODUCTOS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}




	/**
	* Clase Para los Precios de Productos
	*/
	class preciosProductos extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE PRECIOS DE PRODUCTOS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}

	/**
	* Clase Para los Ventas Diarias de Productos
	*/
	class ventasDiarias extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE VENTAS DIARIAS DE PRODUCTOS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}




	/**
	* Clase Para las Ventas de Productos Por Socios
	*/
	class ventasxSocio extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE VENTAS DE PRODUCTOS POR SOCIO'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}




	/**
	* Clase Para las Ventas de Productos Por Fechas
	*/
	class ventasxFechas extends FPDF{

		var $widths;
        var $aligns;

        function SetWidths($w){

	      $this->widths=$w;
        }

         
        function SetAligns($a){

	      $this->aligns=$a;
        }

         
        function Row($data){

	      $nb=0;
	      for($i=0;$i<count($data);$i++)
		  $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	      $h=5*$nb;

	      $this->CheckPageBreak($h);

	      for($i=0;$i<count($data);$i++)
	      {
		
		  $w=$this->widths[$i];
		  $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

		  $x=$this->GetX();
		  $y=$this->GetY();
		
		  $this->Rect($x,$y,$w,$h);

		  $this->MultiCell($w,5,$data[$i],1,$a,'true');
 
		  $this->SetXY($x+$w,$y);
	    }

	    $this->Ln($h);

        }

        
        function CheckPageBreak($h){

	       if($this->GetY()+$h>$this->PageBreakTrigger)
		   $this->AddPage($this->CurOrientation);
        }


        function NbLines($w,$txt){

	       $cw=&$this->CurrentFont['cw'];
	       if($w==0)
		   $w=$this->w-$this->rMargin-$this->x;
	       $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	       $s=str_replace("\r",'',$txt);
	       $nb=strlen($s);
	       if($nb>0 and $s[$nb-1]=="\n")
		   $nb--;
	       $sep=-1;
	       $i=0;
	       $j=0;
	       $l=0;
	       $nl=1;
	       while($i<$nb)
	       
	       {
		
		   $c=$s[$i];
		   if($c=="\n")

		   {

			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		    
		    }
		    
		    if($c==' ')
			$sep=$i;
	        $l+=$cw[$c];
		    if($l>$wmax)
		    
		    {

			if($sep==-1)

			{

			if($i==$j)
			$i++;

			}

			else

			$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		    
		    }

		    else

			$i++;
	        
	        }

	        return $nl;
        }


		function Header(){

			$this->Image('imagenes/logo.jpg', 10, 5, 30);
			$this->SetFont('Arial','',8);
			$this->Cell(30);
			$this->Text(143,10,utf8_decode( 'POWER GYM'),0,0,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(165,10,utf8_decode( 'LISTADO DE VENTAS DE PRODUCTOS POR FECHAS'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(54, 10, ' Fecha de Reporte: '.date('d-m-Y').'', 1);
			$this->Ln(35);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
	}


	class VentaDiario extends FPDF{
		
		function Header(){

			$this->Image('images/stars.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode( 'Ventas Diario'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(50, 10, 'Hoy: '.date('d/m/Y').'', 0);
			$this->Ln(20);


			$this->SetFillColor(232,232,232);
			$this->SetFont('Arial','B',10);
			$this->Cell(15,6,'Folio',1,0,'C',1);
			$this->Cell(15,6,'Cod Cte',1,0,'C',1);
			$this->Cell(60,6,'Nombre Cte.',1,0,'C',1);
			$this->Cell(25,6,'Fcha. Vta',1,0,'C',1);
			$this->Cell(17,6,'Pago',1,0,'C',1);
			$this->Cell(35,6,'Sub Total',1,0,'C',1);
			$this->Cell(20,6,'Descuento',1,0,'C',1);
			$this->Cell(35,6,'Total',1,0,'C',1);
			$this->SetFont('Arial','B',8);
			$this->Cell(20,6,'Fcha. Liquidar',1,0,'C',1);
			$this->SetFont('Arial','B',10);
			$this->Cell(30,6,'Usuario',1,1,'C',1);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}

	class VentaxFexhas extends FPDF{
		
		function Header(){

			$this->Image('images/stars.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode( 'Ventas'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Ln(20);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


	class ConsigDiario extends FPDF{
		
		function Header(){

			$this->Image('images/stars.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode( 'Consignación Diario'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(50, 10, 'Hoy: '.date('d/m/Y').'', 0);
			$this->Ln(20);

			$this->SetFillColor(232,232,232);
			$this->SetFont('Arial','B',10);
			$this->Cell(15,6,'Folio',1,0,'C',1);
			$this->Cell(15,6,'Cod Cte',1,0,'C',1);
			$this->Cell(60,6,'Nombre Cte.',1,0,'C',1);
			$this->Cell(25,6,'Fcha. Consig',1,0,'C',1);
			$this->Cell(17,6,'Pago',1,0,'C',1);
			$this->Cell(35,6,'Sub Total',1,0,'C',1);
			$this->Cell(20,6,'Descuento',1,0,'C',1);
			$this->Cell(35,6,'Total',1,0,'C',1);
			$this->SetFont('Arial','B',8);
			$this->Cell(20,6,'Fcha. Liquidar',1,0,'C',1);
			$this->SetFont('Arial','B',10);
			$this->Cell(30,6,'Usuario',1,1,'C',1);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}

	class ConsigSaldo extends FPDF{
		
		function Header(){

			$this->Image('images/stars.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode( 'Consignaciónes con Saldo Pendiente'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(50, 10, 'Hoy: '.date('d/m/Y').'', 0);
			$this->Ln(20);


			$this->SetFillColor(232,232,232);
			$this->SetFont('Arial','B',10);
			$this->Cell(25,6,'Fcha. Consig',1,0,'C',1);
			$this->Cell(15,6,'Folio',1,0,'C',1);
			$this->Cell(15,6,'Cod Cte',1,0,'C',1);
			$this->Cell(70,6,'Nombre Cte.',1,0,'C',1);
			$this->Cell(30,6,'Total',1,0,'C',1);
			$this->Cell(30,6,'Pago',1,0,'C',1);
			$this->Cell(30,6,'Saldo',1,0,'C',1);
			$this->Cell(35,6,'Fcha. Liquidar',1,1,'C',1);
	
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}

	class Gastos extends FPDF{
		
		function Header(){

			$this->Image('images/stars.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode( 'Historial de Gastos'),0,0,'C');
			$this->SetFont('Arial','B',10);
			$this->Cell(50, 10, 'Hoy: '.date('d/m/Y').'', 0);
			$this->Ln(20);

			$this->SetFillColor(232,232,232);
			$this->SetFont('Arial','B',12);
			$this->Cell(15,6,'Folio',1,0,'C',1);
			$this->Cell(20,6,'Fecha',1,0,'C',1);
			$this->Cell(120,6,'Concepto',1,0,'C',1);
			$this->Cell(30,6,'Monto',1,0,'C',1);
			$this->Cell(30,6,'Usuario',1,1,'C',1);
		}

		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}


?>