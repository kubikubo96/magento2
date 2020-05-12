<?php

namespace Openiz\PluginInjectVariable\Plugin;

use Magento\Customer\Model\Session;
use Magento\Theme\Block\Html\Footer;

class InjectVariablesIntoBlocks
{
    protected $customerSession;

    public function __construct(
        Session $customerSession
    )
    {
        $this->customerSession = $customerSession;
    }

    public function beforeToHtml(Footer $subject)
    {
        if ($subject->getNameInLayout() !== 'absolute_footer') {
            return;
        }
        $subject->setTemplate('Plugin_Inject_Variable::absolute_footer.phtml');
        $subject->assign('customer', $this->customerSession->getCustomer());
    }
}
