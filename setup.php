<?php
/**
 * LICENSE
 *
 * Copyright © 2017 Teclib'
 *
 * This file is part of Orion for GLPI.
 *
 * Orion Plugin for GLPI is a subproject of Flyve MDM. Flyve MDM is a mobile
 * device management software.
 *
 * Orion Plugin for GLPI is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * Orion Plugin for GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License
 * along with Orion Plugin for GLPI. If not, see http://www.gnu.org/licenses/.
 * ------------------------------------------------------------------------------
 *
 * @copyright Copyright © 2017 Teclib
 * @license   AGPLv3+ http://www.gnu.org/licenses/agpl.txt
 * @link      https://github.com/flyve-mdm/orion-glpi-plugin
 * @link      https://flyve-mdm.com/
 * ------------------------------------------------------------------------------
 */

define('PLUGIN_ORION_VERSION', '0.1');
// is or is not an official release of the plugin
define('PLUGIN_ORION_IS_OFFICIAL_RELEASE', false);
// Minimal GLPI version, inclusive
define('PLUGIN_ORION_GLPI_MIN_VERSION', '9.2');
// Maximum GLPI version, exclusive
define('PLUGIN_ORION_GLPI_MAX_VERSION', '9.3');

define('PLUGIN_ORION_ROOT', GLPI_ROOT . '/plugins/orion');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_orion() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['orion'] = true;
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_orion() {
   if (defined('GLPI_PREVER') && PLUGIN_ORION_IS_OFFICIAL_RELEASE == false) {
      $glpiVersion = version_compare(GLPI_PREVER, PLUGIN_ORION_GLPI_MIN_VERSION, 'lt');
   } else {
      $glpiVersion = PLUGIN_ORION_GLPI_MIN_VERSION;
   }

   return [
      'name'           => 'orion',
      'version'        => PLUGIN_ORION_VERSION,
      'author'         => '<a href="http://www.teclib.com">Teclib\'</a>',
      'license'        => '',
      'homepage'       => '',
      'requirements'   => [
         'glpi' => [
            'min' => $glpiVersion,
            'max' => PLUGIN_ORION_GLPI_MAX_VERSION,
            'dev' => PLUGIN_ORION_IS_OFFICIAL_RELEASE == false,
            'plugins'   => [],
            'params' => [],
         ],
         'php' => [
            'exts'   => []
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_orion_check_prerequisites() {
   $prerequisitesSuccess = true;

   if (!is_readable(__DIR__ . '/vendor/autoload.php') || !is_file(__DIR__ . '/vendor/autoload.php')) {
      echo "Run composer install --no-dev in the plugin directory<br>";
      $prerequisitesSuccess = false;
   }
   return $prerequisitesSuccess;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_orion_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      _e('Installed / not configured', 'orion');
   }
   return false;
}
