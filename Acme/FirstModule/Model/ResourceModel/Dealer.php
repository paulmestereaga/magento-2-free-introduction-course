<?php
namespace Acme\FirstModule\Model\ResourceModel;

class Dealer extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('dealers', 'entity_id');
    }
}
