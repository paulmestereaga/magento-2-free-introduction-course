<?php
namespace Acme\FirstModule\Model\ResourceModel\Dealer;

use Acme\FirstModule\Model\Dealer;
use Acme\FirstModule\Model\ResourceModel\Dealer as DealerResource;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init(Dealer::class, DealerResource::class);
    }
}
