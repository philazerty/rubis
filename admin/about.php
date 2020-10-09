<?php
/* Copyright (C) 2015		Charles-fr BENKE 			  <charles.fr@benke.fr>
 * Copyright (C) 2016	    Philippe SAGOT (Philazerty)   <courrier@mon-dolibarr.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 	\file		htdocs/rubis/admin/about.php
 * 	\ingroup	rubis
 * 	\brief		about page
 */

// Dolibarr environment
$res=0;
if (! $res && file_exists("../../main.inc.php")) $res=@include("../../main.inc.php");		// For root directory
if (! $res && file_exists("../../../main.inc.php")) $res=@include("../../../main.inc.php");	// For "custom" directory




// Libraries
dol_include_once('/rubis/core/lib/rubis.lib.php');

// Translations
$langs->load("rubis@rubis");

// Access control
if (!$user->admin)
	accessforbidden();

/*
 * View
 */
llxHeader('',$langs->trans("Rubis"),$help_url);

$linkback='<a href="'.DOL_URL_ROOT.'/admin/modules.php">'.$langs->trans("BackToModuleList").'</a>';
print_fiche_titre($langs->trans("RubisSetup"),$linkback,'setup');

// Configuration header
$head = rubis_admin_prepare_head();
dol_fiche_head($head, 'about', $langs->trans("Rubis"), 0, "list");

// About page goes here
print '<H3>'.$langs->trans("MonDolibarrPresent").'</H3>';

$url='http://www.mon-dolibarr.fr';
print '<img border="0" src="'.dol_buildpath('/rubis/img/object_rubis.png',1).'">';
print '<a href="'.$url.'" target="_blank"><img border="0" width="320" src="'.dol_buildpath('/rubis/img/mon-dolibarr.jpg',1).'"></a>';

print '<H3>Licence</H3>';
print 'GPL v3 et supérieur.</br>';
print'<img src="' . dol_buildpath('/rubis/img/gplv3.png', 1) . '"/>';

llxFooter();
$db->close();
?>
