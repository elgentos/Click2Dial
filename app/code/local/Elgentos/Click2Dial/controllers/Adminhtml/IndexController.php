<?php

class Elgentos_Click2Dial_Adminhtml_IndexController extends Mage_Core_Controller_Front_Action
{
    public function dialAction() {
        $number = $this->getRequest()->getParam('number');
        $origin = $this->getRequest()->getParam('origin');
        Mage::helper('click2dial')->dial($number,$origin);
    }
}
