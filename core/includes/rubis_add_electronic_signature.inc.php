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

// Update by Philazerty for eletronic signature
// Update : 27/08/2019

$pdf->SetCreator("Dolibarr ".DOL_VERSION." with Rubis 9.0.1");

// Prévoir un file_exists et erreur Dolibarr
//$cert=file_get_contents(DOL_DATA_ROOT."/users/".$user->id."/certificates/signature.crt");
$cert=file_get_contents(DOL_DATA_ROOT."/mycompany/certificates/signature.crt");
if ($cert){
  $info = array(
    'Name' => $this->emetteur->name,
    'Location' => getCountry($this->emetteur->country_code, 0),
	  'Reason' => $RubisReasonSignature,
	  'ContactInfo' => $this->emetteur->email
	);
	$pdf->setSignature($cert, $cert, $this->emetteur->name, '', 2, $info);
	$RubisSignatureStamp=1;
}

?>
