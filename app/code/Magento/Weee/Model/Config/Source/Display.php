<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Weee\Model\Config\Source;

class Display implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve list of available options to display FPT
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => \Magento\Weee\Model\Tax::DISPLAY_INCL, 'label' => __('Including FPT only')],
            [
                'value' => \Magento\Weee\Model\Tax::DISPLAY_INCL_DESCR,
                'label' => __('Including FPT and FPT description')
            ],
            [
                'value' => \Magento\Weee\Model\Tax::DISPLAY_EXCL_DESCR_INCL,
                'label' => __('Excluding FPT, FPT description, final price')
            ],
            ['value' => \Magento\Weee\Model\Tax::DISPLAY_EXCL, 'label' => __('Excluding FPT')]
        ];
    }
}
