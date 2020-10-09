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

// Add by Philazerty for eletronic signature stamp
// Update : 11/11/2019
//******* signature.png est carré **************

if($RubisSignatureStamp){
  $imgsignature=(DOL_DATA_ROOT."/mycompany/certificates/signature.png");
  if (is_readable($imgsignature)){
    $height=pdf_getHeightForLogo($imgsignature);
    $pdf->Image($imgsignature, $this->page_largeur-$this->marge_droite-12, $this->page_hauteur-$this->marge_basse-12, 0, 12,"PNG");	// width=0 (auto)
  }
}
?>
