<?php

namespace Openiz\ObserverBackground\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session as CustomerSession;

class AddHandl implements ObserverInterface
{
    /**
     * @var $customerSession
     */
    protected $customerSession;

    /**
     * AddHandl constructor.
     * @param CustomerSession $customerSession
     */
    public function __construct(CustomerSession $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();

        if (!$this->customerSession->isLoggedIn()) {
            $layout->getUpdate()->addHandle('customer_logged_out');
        }
    }
}
