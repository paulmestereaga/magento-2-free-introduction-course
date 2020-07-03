<?php
namespace Acme\FirstModule\Model;

class Dealer extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventManager = 'dealers';

    protected function _construct()
    {
        $this->_init(\Acme\FirstModule\Model\ResourceModel\Dealer::class);
    }
}
