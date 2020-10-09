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

$extrafields= new ExtraFields($this->db); // les extrafields de la pièce
// on récupère les champs dans extralabels
$extralabels=$extrafields->fetch_name_optionals_label($object->table_element);
// on récupère le résultat dans $societe->array_options["options_NOMDUCHAMP"];
$res=$object->fetch_optionals($object->id,$extralabels);
			
$refmarche=$extrafields->showOutputField("d4d_contract_number", $object->array_options["options_d4d_contract_number"]);
if(!empty($refmarche))
{
	$textmarche=$outputlangs->transnoentities("RubisContractNumber").$extrafields->showOutputField("d4d_contract_number", $object->array_options["options_d4d_contract_number"]."<br />");
	$notetoshow=$textmarche.$notetoshow;
}
$refengagement=$extrafields->showOutputField("d4d_promise_code", $object->array_options["options_d4d_promise_code"]);
if(!empty($refengagement))
{
	$textengagement=$outputlangs->transnoentities("RubisPromiseCode").$extrafields->showOutputField("d4d_promise_code", $object->array_options["options_d4d_promise_code"]."<br />");
	$notetoshow=$textengagement.$notetoshow;
}
?>
