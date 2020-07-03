<?php
namespace Acme\FirstModule\Setup\Patch\Data;

use Magento\Framework\App\ResourceConnection;

class AddDealers implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    protected $moduleDataSetup;
    protected $resource;

    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Framework\App\ResourceConnection $resource
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->resource = $resource;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $connection = $this->resource->getConnection(ResourceConnection::DEFAULT_CONNECTION);
        $tableName = $this->resource->getTableName('dealers');

        $sql = "INSERT INTO " . $tableName . " (name, address, phone, email) VALUES
                    ('Acme Inc', '3836  Southside Lane, LA', '323-699-0963', 'contact@acme.com'),
                    ('Power Inc', '1232  Westside Lane, LA', '421-239-3342', 'contact@power.com')";

        $connection->query($sql);

        $this->moduleDataSetup->getConnection()->endSetup();
    }
}
