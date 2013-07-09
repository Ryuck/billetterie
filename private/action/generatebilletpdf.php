<?php
include(LIBS_PATH.'/qrlib/qrlib.php');

$pdf=new phpToPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

//i correspondra au nombre de billet
$i = 1;
//=====Pour chaque billet on parcoure et on génére un qrcode avant de l'insérer dans le pdf
foreach($billet as $b){
	if(($i%2)==0){
		//Quand le nombre de billet est paire ça correspond au second billet de la page
		
		//=====Création du second billet de la page
		$pdf->Text(15,155,"Salon de la décoration de Lille");
		$pdf->Rect(10, 149, 190, 130);
		$pdf->SetFont('Arial','B',14);
		$pdf->Text(50, 175, 'Billet électronique à présenter à l\'entrée du salon');
		$content= $billet[$i-1]['numero'];
		$filename = 'qr'.$i.'.png';
		$errorCorrectionLevel = 'H';
		$matrixPointSize = 8;
		
		//on génére le qrcode
		QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$pdf->Image($filename, 75, 178);
		$pdf->SetFont('Arial','',16);
		$pdf->Text(70,235,'Numéro : '.$content);
		$pdf->SetFont('Arial','',10);
		$pdf->Text(70,245,'Entrée '.$billet[$i-1]['tarif'].' : '.$billet[$i-1]['prix'].' euros');
		$pdf->SetFont('Arial','',14);
		$pdf->Text(25, 270, "Ce billet donne droit à un accès unique au salon. Toute sortie est définitive.");
		$pdf->Text(24, 275, "Pour plus d'informations veuillez consulter les conditions générales de vente.");
		//===========
		
		//On ajoute une page pour continuer a écrire
		$pdf->AddPage();
	}
	else{
		//=====Création du premier billet de la page
		$pdf->Text(15,15,"Salon de la décoration de Lille");
		$pdf->Rect(10, 8, 190, 130);
		$pdf->SetFont('Arial','B',14);
		$pdf->Text(50, 35, 'Billet électronique à présenter à l\'entrée du salon');
		$content= $billet[$i-1]['numero'];
		$filename = 'qr'.$i.'.png';
		$errorCorrectionLevel = 'H';
		$matrixPointSize = 8;
		
		//on génére le qrcode
		QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$pdf->Image($filename, 75, 38);
		$pdf->SetFont('Arial','',16);
		$pdf->Text(70,95,'Numéro : '.$content);
		$pdf->SetFont('Arial','',10);
		$pdf->Text(70,105,'Entrée '.$billet[$i-1]['tarif'].' : '.$billet[$i-1]['prix'].' euros');
		$pdf->SetFont('Arial','',14);
		$pdf->Text(25, 130, "Ce billet donne droit à un accès unique au salon. Toute sortie est définitive.");
		$pdf->Text(24, 135, "Pour plus d'informations veuillez consulter les conditions générales de vente.");
		//=========
	}
	$i++;
}
//==========

//On crée le pdf "à la volée" en le stockant dans une variable
$pdfcontentbillet = $pdf->Output("ebillet.pdf", "S");

//=====On supprime les qrcode devenus inutiles
$i = 1;
while(file_exists( "qr".$i.".png" )){
   unlink( "qr".$i.".png" ); 
   $i++;
}
//==========

?>