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

// les extrafields du contrat
$extrafields= new ExtraFields($this->db);
// on récupère les champs dans extralabels
$extralabels=$extrafields->fetch_name_optionals_label($object->table_element);
// on récupère le résultat dans $societe->array_options["options_NOMDUCHAMP"];
$res=$object->fetch_optionals($object->id,$extralabels);
$rubistemplate=$extrafields->showOutputField("rubistemplate", $object->array_options["options_rubistemplate"]);
$pdf->writeHTMLCell(190, 3, $this->posxdesc-1, $tab_top-1, dol_htmlentitiesbr($rubistemplate), 0, 1);
$pdf->writeHTMLCell(190, 3, $this->posxdesc-1, $tab_top-1, "hello", 0, 1);

if ($conf->global->MAIN_MULTILANGS) {
  $rubistemplate_pdf=DOL_DATA_ROOT."/doctemplates/contracts/".$outputlangs->defaultlang."/".$rubistemplate.".pdf";
}else{
  $rubistemplate_pdf=DOL_DATA_ROOT."/doctemplates/contracts/".$rubistemplate.".pdf";
  //$cgv_pdf=DOL_DATA_ROOT."/mycompany/cgv/cgv.pdf";
}
//if (file_exists($rubistemplate_pdf)){
            $pagecount = $pdf->setSourceFile($rubistemplate_pdf);
            for ($i = 1; $i <= $pagecount; $i++) {
                $tplidx = $pdf->ImportPage($i);
                $s = $pdf->getTemplatesize($tplidx);
                $pdf->AddPage('P', array($s['w'], $s['h']));
                $pdf->useTemplate($tplidx);
                // Ajout du watermark (brouillon)
                if ($object->statut==0 && (!empty($conf->global->FACTURE_DRAFT_WATERMARK))) {
                    pdf_watermark($pdf,$outputlangs,$this->page_hauteur,$this->page_largeur,'mm',$conf->global->FACTURE_DRAFT_WATERMARK);
                    $pdf->SetTextColor(0,0,60);
                }
                // Ajout du titre de la pièce
                $alto_posx=$this->page_largeur-$this->marge_droite-100;
            		$alto_posy=$this->marge_haute;
                $pdf->SetXY($alto_posx,$alto_posy);
                $pdf->SetFont('','B',$default_font_size + 3);
            		$pdf->SetTextColor(0,0,60);
            		$title=$outputlangs->transnoentities("AltoContractCard");
            		$pdf->MultiCell(100, 4, $title, '', 'R');

                // Ajout de la reférence
            		$alto_posy+=5;
            		$pdf->SetXY($alto_posx,$alto_posy);
                $pdf->SetFont('','B',$default_font_size + 2);
            		$pdf->SetTextColor(0,0,60);
            		$pdf->MultiCell(100, 4, $outputlangs->transnoentities("Ref")." : " . $outputlangs->convToOutputCharset($object->ref), '', 'R');

                // Ajout de la date
                $alto_posy+=5;
             		$pdf->SetXY($alto_posx,$alto_posy);
                $pdf->SetFont('','', $default_font_size);
            		$pdf->SetTextColor(0,0,60);
            		$pdf->MultiCell(100, 3, $outputlangs->transnoentities("Date")." : " . dol_print_date($object->date_contrat,"day",false,$outputlangs,true), '', 'R');

                // Ajout du footer / pied de page
                pdf_pagefoot($pdf,$outputlangs,'',$this->emetteur,$this->marge_basse,$this->marge_gauche,$this->page_hauteur,$object);
            }
    //    }
?>
