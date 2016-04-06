<?php
// app/code/local/Envato/Custompaymentmethod/Block/Form/Custompaymentmethod.php
class Plus_Espaypaymentmethod_Block_Form_Espaypaymentmethod extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setTemplate('espaypaymentmethod/form/espaypaymentmethod.phtml');
  }
}
