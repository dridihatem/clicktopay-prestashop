<?php


/*
 * (c) 2025 DA WEB COMPANY
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class ClictopaySmtcontrolModuleFrontController extends ModuleFrontController
{
    public $Reference;
    public $Action;
    public $Params;
    public $Montant;
    public $Cart;

    public function initContent()
    {
        parent::initContent();
        $referenceRaw = Tools::getValue('Reference');
        $actionRaw = Tools::getValue('Action');
        $paramRaw = Tools::getValue('Param');

        if (empty($referenceRaw) || empty($actionRaw)) {
            die('');
        }

        $this->Reference = (int) $referenceRaw;
        $this->Action = Tools::strtoupper(trim($actionRaw));
        $this->Params = $paramRaw ? Tools::safeOutput($paramRaw) : null;

        if ($this->Reference <= 0) {
            die('');
        }

        $this->Cart = new Cart((int)$this->Reference);
        if (!Validate::isLoadedObject($this->Cart)) {
            die('');
        }
        $this->Montant = sprintf("%.3f", (float) $this->Cart->getOrderTotal());

        $allowedActions = array(
            'DETAIL' => 'DETAIL',
            'ACCORD' => 'ACCORD',
            'ERREUR' => 'ERREUR',
            'REFUS' => 'REFUS',
            'ANNULATION' => 'ANNULATION',
        );

        if (!isset($allowedActions[$this->Action])) {
            die('');
        }

        $method = $allowedActions[$this->Action];
        $resp = $this->$method();
        if ($resp === false) {
            die('');
        }

        die($resp);
    }


    /**
     * Detail of order required by SMT
     */
    public function DETAIL()
    {
        return "Reference=" . $this->Cart->id . "&Action=" . $this->Action . "&Reponse=" . $this->Montant;
    }

    /**
     * If payment accepted by SMT, Validate the Purchase Order,
     */
    public function ACCORD()
    {
        $this->module->setOrder(Configuration::get('SMT_OS_ACCEPTED'), $this->Cart, $this->Params);
        return "Reference=" . $this->Cart->id . "&Action=" . $this->Action . "&Reponse=OK";
    }

    /**
     * If a transaction error received by the SMT, Update the Purchase Order.
     */
    public function ERREUR()
    {
        $this->module->setOrder(Configuration::get('SMT_OS_ERROR'), $this->Cart);
        return $response = "Reference=" . $this->Cart->id . "&Action=" . $this->Action . "&Reponse=OK";
    }

    /**
     * If a refusal of payment received by the SMT, Update the Purchase Order.
     */
    public function REFUS()
    {
        $this->module->setOrder(Configuration::get('SMT_OS_REFUSED'), $this->Cart);
        return "Reference=" . $this->Cart->id . "&Action=" . $this->Action . "&Reponse=OK";
    }

    /**
     * If a cancellation of payment received by the SMT, Update the Purchase Order.
     */
    public function ANNULATION()
    {
        $this->module->setOrder(Configuration::get('SMT_OS_CANCELED'), $this->Cart);
        return "Reference=" . $this->Cart->id . "&Action=" . $this->Action . "&Reponse=OK";
    }
}
