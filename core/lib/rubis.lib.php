<?php
/* Copyright (C) 2015		Charles-fr BENKE 			<charles.fr@benke.fr>
 * Copyright (C) 2016		Philippe SAGOT (Philazerty)	<courrier@mon-dolibarr.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
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

/**
 *		\file	 	rubis/core/lib/rubis.lib.php
 *		\brief	 	Functions used by rubis module
 *		\ingroup	rubis
 */

function rubis_admin_prepare_head ()
{
	global $langs, $conf, $user;

	$h = 0;
	$head = array();

	$head[$h][0] = dol_buildpath('/rubis/admin/setup.php',1);
	$head[$h][1] = $langs->trans("Setup");
	$head[$h][2] = 'setup';

	$h++;
	$head[$h][0] = dol_buildpath('/rubis/admin/changelog.php',1);
	$head[$h][1] = $langs->trans("ChangeLog");
	$head[$h][2] = 'changelog';

	$h++;
	$head[$h][0] = dol_buildpath('/rubis/admin/about.php',1);
	$head[$h][1] = $langs->trans("About");
	$head[$h][2] = 'about';

	return $head;
}



?>
