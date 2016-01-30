<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 15/03/15
 * Time: 17:03
 */

namespace Wubs\Trakt\Response\Handlers;

use GuzzleHttp5\ClientInterface;
use GuzzleHttp5\Message\ResponseInterface;
use Wubs\Trakt\Contracts\ResponseHandler;
use Wubs\Trakt\Request\Parameters\AbstractParameter;

class DefaultDeleteHandler extends AbstractResponseHandler implements ResponseHandler
{

    /**
     * @param ResponseInterface $response
     * @param ClientInterface|GuzzleHttp5\ClientInterface $client
     * @return bool
     * @internal param ClientInterface $client
     */
    public function handle(ResponseInterface $response, \GuzzleHttp5\ClientInterface $client)
    {
        return ($response->getStatusCode() === 204);
    }
}