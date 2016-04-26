<?php
/**
 * Shop System Plugins - Terms of Use
 *
 * The plugins offered are provided free of charge by Wirecard Central Eastern Europe GmbH
 * (abbreviated to Wirecard CEE) and explicitly do not form part of the Wirecard CEE range
 * of products and services.
 * They have been tested and approved for full functionality in the standard configuration
 * (status on delivery) of the corresponding shop system. They are under General Public
 * License Version 2 (GPLv2) and can be used, developed and passed to third parties under
 * the same terms.
 * However, Wirecard CEE does not provide any guarantee or accept any liability for any
 * errors occurring when used in an enhanced, customized shop system configuration.
 * Operation in an enhanced, customized configuration is at your own risk and requires a
 * comprehensive test phase by the user of the plugin.
 * The customer uses the plugin at own risk. Wirecard CEE does not guarantee its full
 * functionality neither does Wirecard CEE assume liability for any disadvantage related
 * to the use of this plugin. Additionally Wirecard CEE does not guarantee its full
 * functionality for customized shop systems or installed plugins of other vendors of
 * plugins within the same shop system.
 * The customer is responsible for testing the plugin's functionality within its own shop
 * system before using it within a production environment of a shop system.
 * By installing the plugin to the shop system the customer agrees to the terms of use.
 * Please do not use these plugins if you do not agree to this terms of use!
 */

/**
 * Loader class responsible for autoloading WirecardCEE library classes
 *
 * Autoloader for libraries
 */
class Shopware_Plugins_Frontend_WirecardCheckoutPage_Components_Loader implements Zend_Loader_Autoloader_Interface
{

    /**
     * Prefix for classes which
     * should be included by this autoloader
     * @var string
     */
    const PREFIX = 'WirecardCEE_';

    public function __construct()
    {
        $this->addComponentsPath();
    }

    /**
     * Add library path to PHP include path
     */
    protected function addComponentsPath()
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__));
    }

    /**
     * method used by shopware for autoloading
     *
     * @param string $class
     * @return bool|mixed
     */
    public function autoload($class)
    {
        if (!preg_match('/^' . self::PREFIX . '/', $class)) {
            return FALSE;
        }
        $fragment = str_replace('_', '/', trim($class, '_'));
        return include_once(dirname(__FILE__) . '/' . $fragment . '.php');
    }
}