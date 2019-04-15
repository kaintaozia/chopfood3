<?php
//$db=mysqli_connect("localhost","chopsub","chopsub");
//mysqli_select_db($db,"chopsub");
$db=mysqli_connect("eu-cdbr-west-02.cleardb.net","b9cfd46243c65b","8480309c");
mysqli_select_db($db,"heroku_880ea39488893f3");
$query="select * from burger";
$resultat=mysqli_query($db,$query);
Include("phpToPDF.php");
$PDF = new phpToPDF();
$PDF->AddPage(L);
//Séction de la police
$PDF->SetFont('Arial','B',11);
$PDF->MultiCell(0, 10, "Formulaire menu\n burger Chopine", 1, "C", 0);
$PDF->Ln(5);
while ($donnee=mysqli_fetch_array($resultat)){;
//$donnee=mysqli_fetch_array($resultat);
// Dénition des propriés du tableau.
$proprietesTableau = array(
	'TB_ALIGN' => 'L',
	'L_MARGIN' => 10,
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => '0.3',
	);

// Dénition des propriés du header du tableau.	
$proprieteHeader = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 9,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'L',
	'V_ALIGN' => 'M',
	'LN_SIZE' => 4,
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	);

// Contenu du header du tableau.	
$contenuHeader = array(
	35, 40, 50, 35,
	"[B]".$donnee['nom']."", " ",  " ",  " "
	);

// Dénition des propriés du reste du contenu du tableau.	
$proprieteContenu = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 9,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'L',
	'T_ALIGN' => 'R',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 4,
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	'BG_COLOR_COL0' => array(200,200,200),
	);	





$contenuTableau = array(
	" ", $donnee['burger'], $donnee['formule'], $donnee['prix'],
	);	

// D'abord le PDF, puis les propriés globales du tableau. 
// Ensuite, le header du tableau (propriés et donné) puis le contenu (propriés et donné)
$PDF->drawTableau($PDF, $proprietesTableau, $proprieteHeader, $contenuHeader, $proprieteContenu, $contenuTableau);
$PDF->Ln(3);
}
$PDF->Output();
?>
