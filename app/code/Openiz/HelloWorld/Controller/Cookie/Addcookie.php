<?php

namespace Openiz\HelloWorld\Controller\Cookie;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;

/**
 * Class SetCookie
 * @package Magenest\CookieDemo\Controller\Cookie
 */
class Addcookie extends Action
{
    const COOKIE_NAME = 'Cookie_Name';
    const COOKIE_DURATION = 86400; // One day (86400 seconds)

    /**
     * @var CookieManagerInterface
     */
    protected $cookieManager;

    /**
     * @var CookieMetadataFactory
     */
    protected $cookieMetadataFactory;

    /**
     * @param Context $context
     * @param CookieManagerInterface $cookieManager
     * @param CookieMetadataFactory $cookieMetadataFactory
     */
    public function __construct(
        Context $context,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory
    )
    {
        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $metadata = $this->cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration(self::COOKIE_DURATION);
        $this->cookieManager
            ->setPublicCookie(self::COOKIE_NAME, 'Value which you want to save in cookie', $metadata);
        echo "Your value was saved in Cookie!";
    }
}
