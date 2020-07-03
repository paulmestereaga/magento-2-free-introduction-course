<?php
namespace Acme\FirstModule\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\NoSuchEntityException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DisableProduct extends Command
{
    const INPUT_KEY_SKU = 'sku';
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var \Magento\Framework\App\State
     */
    private $state;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\App\State $state
    ) {
        $this->productRepository = $productRepository;
        $this->state = $state;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('acme:disable-product')
            ->addArgument(
                self::INPUT_KEY_SKU,
                InputArgument::REQUIRED,
                'Sku of the product you want to disbale'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
        $sku = $input->getArgument(self::INPUT_KEY_SKU);

        try {
            $product = $this->productRepository->get($sku, true, 0, true);
            $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_DISABLED);
            $this->productRepository->save($product);
            echo "Product " . $sku . " was disabled";
        } catch (NoSuchEntityException $e) {
            echo "ERROR " . $e->getMessage();
        }

        return Cli::RETURN_SUCCESS;
    }
}
