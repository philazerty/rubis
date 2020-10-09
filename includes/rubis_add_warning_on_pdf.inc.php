<?php

/* Copyright (C) 2020		SAGOT Philippe (Philazerty)
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
* or see http://www.gnu.org/
*/

// Mention avertissement sur les PDFs / Warning or message on PDFs
if (!empty($conf->global->RUBIS_WARNING_ON_PDF))
{
  $xcg=12;
  if(!empty($conf->global->MAIN_GENERATE_DOCUMENTS_SHOW_FOOT_DETAILS)){ $ycg=197-6; }else{ $ycg=197; }	// si détail dans le pied de page on remonte le warning
  $widthwarningbox=80;
  $heightwarningbox=25;
  $marginwarningbox=2;
  $xcgtxt=$xcg;
  $ycgtxt=$ycg;

  if (!empty($conf->global->RUBIS_WARNING_IMG)){
    $stamp=DOL_DOCUMENT_ROOT.'/custom/rubis/img/warning.png';
    if (is_readable($stamp)){
      $pdf->Image($stamp, $xcg+2 , $ycg+$marginwarningbox , 0, 20);	// width=0 (auto)
      $widthwarningbox+=20; // si le logo est là on ajoute 20
      $xcgtxt=$xcg+20;
    }
  }

  //$pdf->SetTextColor(200,0,0);
  //$pdf->SetFont('','B', $default_font_size);
  //$html="le texte<br>la suite<br>la suite<br>la suite<br>la suite<strong>A3sys Normandie</strong>";
  //$pdf->writeHTMLCell($widthwarningbox-$marginwarningbox-$marginwarningbox,$heightwarningbox,$xcgtxt+$marginwarningbox,$ycgtxt,$html);
  $pdf->SetDrawColor(255,0,0);
  $pdf->SetLineWidth(0.2835);
  $pdf->RoundedRect($xcg,$ycg,$widthwarningbox, $heightwarningbox,2); //RoundedRect(x coin gauche, y coin gauche, largeur, hauteur, rayon)

  $pdf->SetTextColor(200,0,0);
  $pdf->SetFont('','B', $default_font_size); // première ligne en gras
  $pdf->SetXY($xcgtxt, $ycgtxt);
  $pdf->MultiCell(80, 5, $outputlangs->transnoentities("RUBIS_WARNING_LINE1"), 0, 'C');
  
  $pdf->SetFont('','', $default_font_size);
  $ycgtxt+=5;
  $pdf->SetXY($xcgtxt, $ycgtxt);
  $pdf->MultiCell(80, 5,  $outputlangs->transnoentities("RUBIS_WARNING_LINE2"), 0, 'C');
  $ycgtxt+=5;
  $pdf->SetXY($xcgtxt, $ycgtxt);
  $pdf->MultiCell(80, 5,  $outputlangs->transnoentities("RUBIS_WARNING_LINE3"), 0, 'C');
  $ycgtxt+=5;
  $pdf->SetXY($xcgtxt, $ycgtxt);
  $pdf->MultiCell(80, 5,  $outputlangs->transnoentities("RUBIS_WARNING_LINE4"), 0, 'C');
  $ycgtxt+=5;
  $pdf->SetXY($xcgtxt, $ycgtxt);
  $pdf->MultiCell(80, 5,  $outputlangs->transnoentities("RUBIS_WARNING_LINE5"), 0, 'C');
  $pdf->SetTextColor(0,0,60);
}
?>
