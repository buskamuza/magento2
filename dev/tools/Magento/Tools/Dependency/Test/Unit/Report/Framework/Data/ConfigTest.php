<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Tools\Dependency\Test\Unit\Report\Framework\Data;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Tools\Dependency\Report\Framework\Data\Module|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $moduleFirst;

    /**
     * @var \Magento\Tools\Dependency\Report\Framework\Data\Module|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $moduleSecond;

    /**
     * @var \Magento\Tools\Dependency\Report\Framework\Data\Config
     */
    protected $config;

    public function setUp()
    {
        $this->moduleFirst = $this->getMock(
            'Magento\Tools\Dependency\Report\Framework\Data\Module',
            [],
            [],
            '',
            false
        );
        $this->moduleSecond = $this->getMock(
            'Magento\Tools\Dependency\Report\Framework\Data\Module',
            [],
            [],
            '',
            false
        );

        $objectManagerHelper = new ObjectManager($this);
        $this->config = $objectManagerHelper->getObject(
            'Magento\Tools\Dependency\Report\Framework\Data\Config',
            ['modules' => [$this->moduleFirst, $this->moduleSecond]]
        );
    }

    public function testGetDependenciesCount()
    {
        $this->moduleFirst->expects($this->once())->method('getDependenciesCount')->will($this->returnValue(0));
        $this->moduleSecond->expects($this->once())->method('getDependenciesCount')->will($this->returnValue(2));

        $this->assertEquals(2, $this->config->getDependenciesCount());
    }
}
