<?php
	session_start();
	$p=$_SESSION["IDEMPL"];
	require __DIR__ .'/vendor/autoload.php';
	setcookie("idEmpleado",$p,time()+3600);
	$_COOKIE["idEmpleado"] = $p;
	//setcookie("idEmpleado","HEHJN05N09",time()+3600);
	//$_COOKIE["idEmpleado"] = "HEHJN05N09";
	$co = $_COOKIE["idEmpleado"];

	use mikehaertl\wkhtmlto\Pdf;

	$pdf = new Pdf([
	    'commandOptions' => [
	        'useExec' => true,
	                'escapeArgs' => false,
	        'procOptions' => array(
	            // This will bypass the cmd.exe which seems to be recommended on Windows
	            'bypass_shell' => true,
	            // Also worth a try if you get unexplainable errors
	            'suppress_errors' => true,
				'ignoreWarnings' => true,
	        ),
	    ],
	]);
	$globalOptions = array(
	    'no-outline',         // Make Chrome not complain
	    // Default page options
	    'page-size' => 'Letter',
	    'cookie' => array('id'=>$co)
	);

	$pdf->setOptions($globalOptions);
	$pdf->addPage("localhost/SMT/impresion.php");
	//$pdf->addPage("");
	$pdf->binary = "C:\Users\Manuel Hernández\Desktop\wkhtmltopdf.exe";
	if (!$pdf->send()) {
	    throw new Exception('Could not create PDF: '.$pdf->getError());
	}
?>