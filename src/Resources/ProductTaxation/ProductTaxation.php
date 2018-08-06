<?php

namespace DomusErp\Sdk\Resources\ProductTaxation;

use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\ProductTaxation\Secondary\ProductsICMS;
use DomusErp\Sdk\Resources\ProductTaxation\Secondary\ProductsIPI;
use DomusErp\Sdk\Resources\ProductTaxation\Secondary\ProductsIR;
use DomusErp\Sdk\Resources\ProductTaxation\Secondary\ProductsISS;
use DomusErp\Sdk\Resources\ProductTaxation\Secondary\ProductsPisCofins;

class ProductTaxation extends AbstractResource
{
    /**
     * ISS
     *
     * @return ProductsISS
     */
    public function ISS()
    {
        return new ProductsISS($this->domusClient);
    }

    /**
     * IPI
     *
     * @return ProductsIPI
     */
    public function IPI()
    {
        return new ProductsIPI($this->domusClient);
    }

    /**
     * ICMS
     *
     * @return ProductsICMS
     */
    public function ICMS()
    {
        return new ProductsICMS($this->domusClient);
    }

    /**
     * PIS/COFINS
     *
     * @return ProductsPisCofins
     */
    public function pisCofins()
    {
        return new ProductsPisCofins($this->domusClient);
    }

    /**
     * IR
     *
     * @return ProductsIR
     */
    public function IR()
    {
        return new ProductsIR($this->domusClient);
    }
}
