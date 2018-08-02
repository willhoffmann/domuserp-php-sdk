<?php

namespace DomusErp\Sdk;

interface RequestMethods
{
    /**
     * HTTP GET
     */
    const HTTP_GET = 'GET';

    /**
     * HTTP POST
     */
    const HTTP_POST = 'POST';

    /**
     * HTTP PUT
     */
    const HTTP_PUT = 'PUT';

    /**
     * HTTP DELETE
     */
    const HTTP_DELETE = 'DELETE';

    /**
     * API URL pedido operacional
     *
     * @var string
     */
    const DOMUSERP_API_OPERACIONAL = 'operacional';

    /**
     * API URL pedido venda rest
     *
     * @var string
     */
    const DOMUSERP_API_PEDIDOVENDA = 'pedidovenda-rest';
}
