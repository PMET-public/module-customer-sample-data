<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagentoEse\CustomerSampleData\Setup;

use Magento\Framework\Setup;
use Magento\Customer\Model\GroupFactory;

class InstallData implements Setup\InstallDataInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var Installer
     */
    protected $installer;

    protected $groupSetup;

    public function __construct(Setup\SampleData\Executor $executor, Installer $installer,GroupFactory $groupSetup)
    {
        $this->executor = $executor;
        $this->installer = $installer;
        $this->groupSetup = $groupSetup;
    }

    /**
     * {@inheritdoc}
     */
    public function install(Setup\ModuleDataSetupInterface $setup, Setup\ModuleContextInterface $moduleContext)
    {
        $setup->startSetup();
        $_customerGroup = 'VIP';
        $group = $this->groupSetup->create();
        $group->setCode($_customerGroup)->setTaxClassId(3)->save();
        $setup->endSetup();
        $this->executor->exec($this->installer);

    }
}
