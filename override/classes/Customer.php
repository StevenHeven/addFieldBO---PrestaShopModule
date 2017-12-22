<?php
/*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class Customer extends CustomerCore
{


    /** @var string ref_sage */
    public $ref_sage;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'customer',
        'primary' => 'id_customer',
        'fields' => array(
            'secure_key' => array('type' => self::TYPE_STRING, 'validate' => 'isMd5', 'copy_post' => false),
            'lastname' => array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => true, 'size' => 32),
            'firstname' => array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => true, 'size' => 32),
            'email' => array('type' => self::TYPE_STRING, 'validate' => 'isEmail', 'required' => true, 'size' => 128),
            'passwd' => array('type' => self::TYPE_STRING, 'validate' => 'isPasswd', 'required' => true, 'size' => 32),
            'last_passwd_gen' => array('type' => self::TYPE_STRING, 'copy_post' => false),
            'id_gender' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'birthday' => array('type' => self::TYPE_DATE, 'validate' => 'isBirthDate'),
            'newsletter' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'newsletter_date_add' => array('type' => self::TYPE_DATE, 'copy_post' => false),
            'ip_registration_newsletter' => array('type' => self::TYPE_STRING, 'copy_post' => false),
            'optin' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'website' => array('type' => self::TYPE_STRING, 'validate' => 'isUrl'),
            'company' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'siret' => array('type' => self::TYPE_STRING, 'validate' => 'isSiret'),
            'ape' => array('type' => self::TYPE_STRING, 'validate' => 'isApe'),
            'outstanding_allow_amount' => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'copy_post' => false),
            'show_public_prices' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'id_risk' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
            'max_payment_days' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'deleted' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'note' => array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'size' => 65000, 'copy_post' => false),
            'is_guest' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'id_shop_group' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'id_default_group' => array('type' => self::TYPE_INT, 'copy_post' => false),
            'id_lang' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
            'ref_sage' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName')
        ),
    );


}