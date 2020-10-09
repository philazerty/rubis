<?php
/* Copyright (C) 2015		Charles-fr BENKE 			<charles.fr@benke.fr>
 * Copyright (C) 2019		Philippe SAGOT (Philazerty)	<courrier@mon-dolibarr.fr>
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
 */

/**
 *		\file       htdocs/rubis/admin/setup.php
 *		\ingroup    rubis
 *		\brief      Page to setup the module rubis
 */

// Dolibarr environment
$res=0;
if (! $res && file_exists("../../main.inc.php")) $res=@include("../../main.inc.php");		// For root directory
if (! $res && file_exists("../../../main.inc.php")) $res=@include("../../../main.inc.php");	// For "custom" directory

require_once DOL_DOCUMENT_ROOT . '/core/lib/admin.lib.php';
dol_include_once('/rubis/core/lib/rubis.lib.php');

$langs->load("admin");
$langs->load("rubis@rubis");

if (! $user->admin) accessforbidden();

$action = GETPOST('action','alpha');

// Parameters RUBIS_* and others
$list = array (
    'RUBIS_LOGO_RUBIS',
	'RUBIS_LINE_COLOR',
	'RUBIS_DEPOSIT_COLOR',
    'RUBIS_LOGO_EDISON',
	'RUBIS_LINE_COLOR_EDISON',
	'RUBIS_DEPOSIT_COLOR_EDISON',
    'RUBIS_LOGO_HOMARD',
	'RUBIS_LINE_COLOR_HOMARD',
	'RUBIS_HOMARD_MODE_TRAITE',
	'RUBIS_LOGO_EPINOCHE',
	'RUBIS_LOGO_SOPHIE',
	'RUBIS_LOGO_BOURGOGNE'
);

/*
 * Actions
 */
if ($action == 'update') {
	$error = 0;

    foreach ( $list as $constname ) {
        $constvalue = GETPOST($constname, 'alpha');

        if (! dolibarr_set_const($db, $constname, $constvalue, 'chaine', 0, '', $conf->entity)) {
            $error ++;
        }
    }

    if (! $error) {
        setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
    } else {
        setEventMessages($langs->trans("Error"), null, 'errors');
    }
}

if ($action == 'setsignaturecontract') {
    $setsignature2 = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "ALTO_ENABLE_SIGNATURE", $setsignature2, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setfooter') {
    $setfooter = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "MAIN_GENERATE_DOCUMENTS_SHOW_FOOT_DETAILS", $setfooter, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setsignature') {
    $setsignature = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "RUBIS_SIGNATURE_AREA", $setsignature, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setsignature2') {
    $setsignature2 = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "RUBIS_SIGNATURE_AREA2", $setsignature2, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setfoldmark') {
    $setfoldmark = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "RUBIS_FOLD_MARK", $setfoldmark, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setiban') {
    $setiban = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "PDF_BANK_HIDE_NUMBER_SHOW_ONLY_BICIBAN", $setiban, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setwarningonpdf') {
    $setiban = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "RUBIS_WARNING_ON_PDF", $setiban, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

if ($action == 'setwarningimg') {
    $setiban = GETPOST('value', 'int');
    $res = dolibarr_set_const($db, "RUBIS_WARNING_IMG", $setiban, 'yesno', 0, '', $conf->entity);
    if (! $res > 0)
        $error ++;

        if (! $error) {
            setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
        } else {
            setEventMessages($langs->trans("Error"), null, 'mesgs');
        }
}

/*
 * View
 */
llxHeader('',$langs->trans("Rubis"),$help_url);

$form = new Form($db);

$linkback='<a href="'.DOL_URL_ROOT.'/admin/modules.php">'.$langs->trans("BackToModuleList").'</a>';
print_fiche_titre($langs->trans("RubisSetup"),$linkback,'setup');

$head = rubis_admin_prepare_head();
dol_fiche_head($head, 'setup', $langs->trans("Rubis"), 0, 'list');

print '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
print '<input type="hidden" name="action" value="update">';

print '<table class="noborder" width="100%">';
print '<tr class="liste_titre">';
print '<td colspan="2">' . $langs->trans('Options') . '</td>';
print "</tr>\n";

foreach ( $list as $key ) {
	$var = ! $var;

	print '<tr ' . $bc[$var] . ' class="value">';
	// Param
	$label = $langs->trans($key);
	print '<td>'.$label.'</td>';
	// Value
	print '<td align="right">';
	print '<input type="text" size="20" id="' . $key . '" name="' . $key . '" value="' . $conf->global->$key . '">';
	print '</td>';
	print '</tr>';
}
if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("ALTO_ENABLE_SIGNATURE") . '</td>';
    if (! empty($conf->global->ALTO_ENABLE_SIGNATURE)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignaturecontract&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignaturecontract&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}
if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("MAIN_GENERATE_DOCUMENTS_SHOW_FOOT_DETAILS") . '</td>';
    if (! empty($conf->global->MAIN_GENERATE_DOCUMENTS_SHOW_FOOT_DETAILS)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setfooter&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setfooter&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("RUBIS_SIGNATURE_AREA") . '</td>';
    if (! empty($conf->global->RUBIS_SIGNATURE_AREA)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignature&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignature&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("RUBIS_SIGNATURE_AREA2") . '</td>';
    if (! empty($conf->global->RUBIS_SIGNATURE_AREA2)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignature2&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setsignature2&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("RUBIS_FOLD_MARK") . '</td>';
    if (! empty($conf->global->RUBIS_FOLD_MARK)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setfoldmark&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setfoldmark&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("PDF_BANK_HIDE_NUMBER_SHOW_ONLY_BICIBAN") . '</td>';
    if (! empty($conf->global->PDF_BANK_HIDE_NUMBER_SHOW_ONLY_BICIBAN)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setiban&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setiban&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("RUBIS_WARNING_ON_PDF") . '</td>';
    if (! empty($conf->global->RUBIS_WARNING_ON_PDF)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setwarningonpdf&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setwarningonpdf&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

if (! empty($user->admin))
{
    $var = ! $var;
    print "<tr " . $bc[$var] . ">";
    print '<td>' . $langs->trans("RUBIS_WARNING_IMG") . '</td>';
    if (! empty($conf->global->RUBIS_WARNING_IMG)) {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setwarningimg&value=0">';
        print img_picto($langs->trans("Activated"), 'switch_on');
        print '</a></td>';
    } else {
        print '<td align="right"><a href="' . $_SERVER['PHP_SELF'] . '?action=setwarningimg&value=1">';
        print img_picto($langs->trans("Disabled"), 'switch_off');
        print '</a></td>';
    }
    print '</tr>';
}

print '</table>';

dol_fiche_end();

print '<div class="center"><input type="submit" class="button" value="' . $langs->trans('Modify') . '" name="button"></div>';

print '<br>';
print '<br>';

print $langs->trans("RubisManualOptions");
//print  nl2br (file_get_contents('./othersmanualoptions.txt'));

llxFooter();
$db->close();