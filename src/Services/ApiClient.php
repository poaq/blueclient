<?php
/**
 * Created by PhpStorm.
 * User: maksymiliankowalewski
 * Date: 02/01/2019
 * Time: 22:30
 */

namespace App\Services;

use App\Interfaces\ApiData;
use GuzzleHttp\Client as Guzzle ;
use Symfony\Component\Serializer\Encoder\JsonDecode;


class ApiClient extends Guzzle implements ApiData
{
    

    public function request($method, $uri = '', array $options = [])
    {
        $uri = self::Uri.$uri;

        $options['headers']['Authorization'] = 'Bearer '.self::ApiKey;

       return  json_decode(
               (string)parent::request($method, $uri, $options)->getBody(), true
       );
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllProducts()
    {
        $result = $this->request('GET',1);

        return $result;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProductsWithZeroAmount()
    {
        $result = $this->request('GET',0);

        return $result;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProductsWithOverFiveAmount()
    {
        $result = $this->request('GET',2);

        return $result;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProduct($name, $amount)
    {
        $result = $this->request('POST',$name.'/'.$amount);

        return $result;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function editProduct($id, $name, $amount)
    {
        $result = $this->request('PUT',$id.'/'.$name.'/'.$amount);

        return $result;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removeProduct($id)
    {
        $result = $this->request('DELETE',$id);

        return $result;
    }


}