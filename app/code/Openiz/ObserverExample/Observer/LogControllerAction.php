<?php

namespace Openiz\ObserverExample\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Openiz\ObserverExample\Manager\Logger;

class LogControllerAction implements ObserverInterface
{
    /** @var Logger */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /** @var RequestInterface $requests */
        $request = $observer->getEvent()->getRequest();

        $this->logger->log(
            '[Module : ' . $request->getModuleName()
            . '] [Action : ' . $request->getActionName()
            . '] [Controller:  ' . $request->getControllerName()
            . '] [Path Info: ' . $request->getPathInfo()
        );
    }
}
