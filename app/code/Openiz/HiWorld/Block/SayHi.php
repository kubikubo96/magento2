<?php

namespace Openiz\HiWorld\Block;

use Magento\Framework\View\Element\Template;

class SayHi extends Template
{
    public function getText()
    {
        return "Say Hi World";
    }
}
