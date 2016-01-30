<?php namespace Wubs\Trakt\Contracts;

use GuzzleHttp5\Message\ResponseInterface;
use League\OAuth2\Client\Token\AccessToken;


/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 25/02/15
 * Time: 17:24
 */
interface ResponseHandler
{
    public function handle(ResponseInterface $response, \GuzzleHttp5\ClientInterface $client);

    public function setClientId($id);

    public function setToken(AccessToken $token);
}