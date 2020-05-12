<?php

namespace Openiz\ProductRepositoryInterface\Block;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\View\Element\Template;

class Product extends Template
{
    protected $_productRepository;

    public function __construct(Template\Context $context, ProductRepository $productRepository, array $data = [])
    {
        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }

    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }
}
