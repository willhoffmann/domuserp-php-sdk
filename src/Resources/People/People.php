<?php

namespace DomusErp\Sdk\Resources\People;

use DomusErp\Sdk\Contracts\CreateContract;
use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\People\Data\PersonData;

class People extends AbstractResource implements GetContract, CreateContract
{
    /**
     * List of people
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_PEDIDOVENDA . '/pessoas', $query);

        return $list;
    }

    /**
     * Gets the person data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/pessoas/' . $id);

        return $data;
    }

    /**
     * Gets the delivery address of the person according to the id passed as parameter
     *
     * @param $personId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deliveryAddresses($personId)
    {
        $deliveryAddresses = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/pessoas/' . $personId . '/enderecosentrega'
        );

        return $deliveryAddresses;
    }

    /**
     * Gets the order default  values of a person according to the person id passed as parameter
     *
     * @param $personId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orderDefaultValues($personId)
    {
        $orderDefaultValues = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/pessoas/' . $personId . '/valoresPadraoPedido'
        );

        return $orderDefaultValues;
    }

    /**
     * Make sure the person - document (CNPJ/CPF) already exists
     *
     * @param $documentNumber
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function document($documentNumber)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/pessoas/documento',
            ['query' => ['num' => $documentNumber]]
        );

        return $data;
    }

    /**
     * Document Validation (CNPJ/CPF)
     *
     * @param $documentNumber
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validateDocument($documentNumber)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/pessoas/validarDocumento',
            ['query' => ['num' => $documentNumber]]
        );

        return $data;
    }

    /**
     * Creates a person
     *
     * @return array|PersonData
     */
    public function create()
    {
        return new PersonData($this);
    }

    /**
     * Update the Person data
     *
     * @param int $id
     * @return PersonData
     */
    public function update($id)
    {
        return new PersonData($this, $id);
    }

    /**
     * Send the save request
     *
     * @param PersonData $personData
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save(PersonData $personData)
    {
        $id = (int) ($personData->getId() > 0 ? '/' . $personData->getId() : '');

        return $this->execute(
            is_null($id) ? self::HTTP_POST : self::HTTP_PUT,
            self::DOMUSERP_API_PEDIDOVENDA . '/pessoas' . $id,
            ['json' => $personData->toArray()]
        );
    }
}
