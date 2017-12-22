<?php
class addFieldBO extends Module
{
    public function __construct()
    {
        $this->name = 'addFieldBO';
        $this->tab = 'administration';
        $this->version = '1.0';
        $this->author = 'Steven Hermitte';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6');
//        $this->dependencies = array('blockcart');

        parent::__construct();

        $this->displayName = $this->l('Add Field For Back Office');
        $this->description = $this->l('This module add field for your customer in your Back Office');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module ?');

    }

    public function install()
    {
        //Execute sql
        include(dirname(__FILE__) . '/sql/datasql.php');
        foreach ($sql as $s)
            if (!Db::getInstance()->execute($s))
                return false;

        //Install Module
        return parent::install() &&
            $this->registerHook('displayAdminCustomer') &&
            Configuration::updateValue('ADDFIELDBO_CONF', 'ok');
    }


    public function uninstall()
    {
        //Uninstall SQL
        include(dirname(__FILE__) . '/sql/uninstall.php');
        foreach ($sql as $s)
            if (!Db::getInstance()->execute($s))
                return false;

        //Uninstall Module
        return parent::uninstall() && Configuration::deleteByName('ADDFIELDBO_CONF');
    }
}
?>