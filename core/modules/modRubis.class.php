<?php
/* Copyright (C) 2003		Rodolphe Quiedeville			<rodolphe@quiedeville.org>
 * Copyright (C) 2004-2012	Laurent Destailleur			<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012	Regis Houssin				<regis.houssin@capnetworks.com>
 * Copyright (C) 2016		Philippe SAGOT (Philazerty)	<courrier@mon-dolibarr.fr>
 
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
 * 	\defgroup   mymodule     Module MyModule
 *  \brief      Example of a module descriptor.
 *				Such a file must be copied into htdocs/mymodule/core/modules directory.
 *  \file       htdocs/mymodule/core/modules/modMyModule.class.php
 *  \ingroup    mymodule
 *  \brief      Description and activation file for module MyModule
 */
include_once DOL_DOCUMENT_ROOT .'/core/modules/DolibarrModules.class.php';


/**
 *  Description and activation class for module MyModule
 */
class modRubis extends DolibarrModules
{
	/**
	 * Constructor. Define names, constants, directories, boxes, permissions
	 *
	 * @param DoliDB $db Database handler
	 */
	public function __construct($db)
	{
        global $langs,$conf;
		
        $this->db = $db;

		// Id for module (must be unique).
		// Use here a free id (See in Home -> System information -> Dolibarr for list of used modules id).
		$this->numero = 424001;
		$this->editor_name = "Mon-Dolibarr";
	    $this->editor_web = "https://www.mon-dolibarr.fr";
		
		// Key text used to identify module (for permissions, menus, etc...)
		$this->rights_class = 'Rubis';

		// Family can be 'crm','financial','hr','projects','products','ecm','technic','other'
		// It is used to group modules in module setup page
		$this->family = "Mon-Dolibarr";
		// Module label (no space allowed), used if translation string 'ModuleXXXName' not found (where XXX is value of numeric property 'numero' of module)
		$this->name = preg_replace('/^mod/i','',get_class($this));
		// Module description, used if translation string 'ModuleXXXDesc' not found (where XXX is value of numeric property 'numero' of module)
		$this->description = "Mon-Dolibarr : Pack de modèles Rubis, Edison, Homard... avec CGV/CGA, LCR";
		// Possible values for version are: 'development', 'experimental', 'dolibarr' or 'dolibarr_deprecated' or version
		$this->version = '11.0.1';
		// Key used in llx_const table to save module status enabled/disabled (where MYMODULE is value of property name of module in uppercase)
		$this->const_name = 'MAIN_MODULE_'.strtoupper($this->name);
		// Where to store the module in setup page (0=common,1=interface,2=others,3=very specific)
		$this->special = 0;
		// Name of image file used for this module.
		// If file is in theme/yourtheme/img directory under name object_pictovalue.png, use this->picto='pictovalue'
		// If file is in module/img directory under name object_pictovalue.png, use this->picto='pictovalue@module'
		$this->picto='rubis@rubis';

		// Defined all module parts (triggers, login, substitutions, menus, css, etc...)
		$this->module_parts = array('models' => 1);				// used for specific edition

		// Data directories to create when module is enabled.
		// Example: this->dirs = array("/mymodule/temp");
		$this->dirs = array();

		// Config pages. Put here list of php page, stored into mymodule/admin directory, to use to setup module.
		$this->config_page_url = array("setup.php@rubis");

		// Dependencies
		$this->hidden = false;			// A condition to hide module
		$this->depends = array();		// List of modules id that must be enabled if this module is enabled
		$this->requiredby = array();	// List of modules id to disable if this one is disabled
		$this->conflictwith = array();	// List of modules id this module is in conflict with
		$this->phpmin = array(5,0);					// Minimum version of PHP required by module
		$this->need_dolibarr_version = array(11,0);	// Minimum version of Dolibarr required by module
		$this->langfiles = array("rubis@rubis");

		// Constants
		$this->const = array(0=>array('RUBIS_FOLD_MARK','chaine',1,'',0, 'current', 0),
							 1=>array('RUBIS_SIGNATURE_AREA','chaine',1,'',0, 'current', 0),
							 2=>array('RUBIS_DEPOSIT_COLOR','chaine','200,0,0','',0, 'current', 0),
							 3=>array('ALTO_ENABLE_SIGNATURE','chaine',1,'',0, 'current', 0),
							 4=>array('RUBIS_HOMARD_MODE_TRAITE','chaine','TRA','',0, 'current', 0),
							 5=>array('RUBIS_DEPOSIT_COLOR_EDISON','chaine','200,0,0','',0, 'current', 0));
							 

        $this->tabs = array();

        // Dictionaries
		$this->dictionaries=array();

        // Boxes
        $this->boxes = array();			// List of boxes

		// Cronjobs
		$this->cronjobs = array();			// List of cron jobs entries to add

		// Permissions
		$this->rights = array();		// Permission array used by this module
		$r=0;

		// Main menu entries
		$this->menu = array();			// List of menus to add
		$r=0;

		// Exports
		$r=1;
	}

	/**
	 *		Function called when module is enabled.
	 *		The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
	 *		It also creates data directories
	 *
     *      @param      string	$options    Options when enabling module ('', 'noboxes')
	 *      @return     int             	1 if OK, 0 if KO
	 */
	public function init($options='')
	{
		$sql = array();

		//$this->_load_tables('/mymodule/sql/');

		return $this->_init($sql, $options);
	}

	/**
	 * Function called when module is disabled.
	 * Remove from database constants, boxes and permissions from Dolibarr database.
	 * Data directories are not deleted
	 *
	 * @param      string	$options    Options when enabling module ('', 'noboxes')
	 * @return     int             	1 if OK, 0 if KO
	 */
	public function remove($options = '')
	{
		$sql = array();

		return $this->_remove($sql, $options);
	}

}

