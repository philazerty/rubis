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

// Ajout de la TRAITE / LCR
// Add by Philazerty
if ($object->mode_reglement_code == $conf->global->RUBIS_HOMARD_MODE_TRAITE)
{
  // New page
  $pdf->AddPage();
  $this->_pagehead($pdf, $object, 0, $outputlangs);
  $pdf->SetXY($this->marge_gauche, 100);
  $pdf->SetFont('helvetica','',10);
  $pdf->writeHTML($outputlangs->transnoentities('HomardLettreLCR'), true, false, true, false, '');
  //$pdf->MultiCell($largeur_cadre, 4, $outputlangs->transnoentities('LettreLCR'),0,L);
  $this->_pagelcr($pdf, $object, $this->page_hauteur-$this->marge_basse-100, $outputlangs);
  //$this->_pagelcr($pdf, $object, $this->marge_haute, $outputlangs);
  //$this->_pagefoot($pdf,$object,$outputlangs);
}
?>
