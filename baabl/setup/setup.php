<?php
define('SMARTY_DIR', '../smarty-3.1.27/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');


class Smarty_Setup extends Smarty {

   function __construct()
   {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('../templates/');
        $this->setCompileDir('../templates_c/');
        $this->setConfigDir('../configs/');
  
   }

}
?>
