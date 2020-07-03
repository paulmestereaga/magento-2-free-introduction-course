<?php
namespace Acme\FirstModule\Block;

use Acme\FirstModule\Model\DealerFactory;
use Magento\Framework\View\Element\Template;

class Hello extends \Magento\Framework\View\Element\Template
{
    protected $dealerFactory;

    public function __construct(
        DealerFactory $dealerFactory,
        Template\Context $context,
        array $data = []
    )
    {
        $this->dealerFactory = $dealerFactory;
        parent::__construct($context, $data);
    }

    public function getName()
    {
        return 'World';
    }

    public function getDealer($id)
    {
        $dealer = $this->dealerFactory->create();
        return $dealer->load($id);
    }

    public function getDealers()
    {
        $dealer = $this->dealerFactory->create();
        return $dealer->getCollection();
    }
}
