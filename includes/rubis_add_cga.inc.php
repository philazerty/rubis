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

if ($conf->global->MAIN_MULTILANGS) {
  $cga_pdf=DOL_DATA_ROOT."/mycompany/cga/cga-".$outputlangs->defaultlang.".pdf";
}else{
  $cga_pdf=DOL_DATA_ROOT."/mycompany/cga/cga.pdf";
}
if (file_exists($cga_pdf)){
            $pagecount = $pdf->setSourceFile($cga_pdf);
		     for ($i = 1; $i <= $pagecount; $i++)
			 {	 
                $tplidx = $pdf->ImportPage($i);
                $s = $pdf->getTemplatesize($tplidx);
                $pdf->AddPage('P', array($s['w'], $s['h']));
                $pdf->useTemplate($tplidx);
                // Ajout du watermark (brouillon)
                if ($object->statut==0 && (!empty($conf->global->FACTURE_DRAFT_WATERMARK))) {
                    pdf_watermark($pdf,$outputlangs,$this->page_hauteur,$this->page_largeur,'mm',$conf->global->FACTURE_DRAFT_WATERMARK);
                    $pdf->SetTextColor(0,0,60);
                }
                // Ajout du footer / pied de page
				$this->_pagefoot($pdf, $object, $outputlangs);
            }
        }
?>
