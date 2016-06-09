<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagentoEse\CustomerSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * Setup class for customer
     *
     * @var \MagentoEse\CustomerSampleData\Model\Customer
     */
    protected $customerSetup;

    /**
     * @param \MagentoEse\CustomerSampleData\Model\Customer $customerSetup
     */
    public function __construct(
        \MagentoEse\CustomerSampleData\Model\Customer $customerSetup
    ) {
        $this->customerSetup = $customerSetup;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->customerSetup->install(['MagentoEse_CustomerSampleData::fixtures/customer_profile.csv']);
    }
}