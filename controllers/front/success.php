<?php


/*
 * (c) 2017 ExtrumWeb International <info@extrumweb.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class ClictopaySuccessModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        Tools::redirect('index.php?controller=order-confirmation');
    }
}
