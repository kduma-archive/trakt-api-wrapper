<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 18/03/15
 * Time: 14:48
 */

namespace Wubs\Trakt\Response\Handlers\Movies;


use GuzzleHttp5\Message\ResponseInterface;
use Wubs\Trakt\Contracts\ResponseHandler;
use Wubs\Trakt\Response\Handlers\AbstractResponseHandler;
use Wubs\Trakt\Response\Updated;

class UpdatedHandler extends AbstractResponseHandler implements ResponseHandler
{

    public function handle(ResponseInterface $response, \GuzzleHttp5\ClientInterface $client)
    {
        return $this->transformToObjects($response, Updated::class, $client);
    }
}