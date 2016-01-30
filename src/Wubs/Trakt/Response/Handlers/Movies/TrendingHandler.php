<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 18/03/15
 * Time: 14:43
 */

namespace Wubs\Trakt\Response\Handlers\Movies;


use GuzzleHttp5\Message\ResponseInterface;
use Wubs\Trakt\Contracts\ResponseHandler;
use Wubs\Trakt\Response\Handlers\AbstractResponseHandler;
use Wubs\Trakt\Response\Trending;

class TrendingHandler extends AbstractResponseHandler implements ResponseHandler
{

    /**
     * @param ResponseInterface $response
     * @param \GuzzleHttp5\ClientInterface|GuzzleHttp5\ClientInterface $client
     * @return array
     */
    public function handle(ResponseInterface $response, \GuzzleHttp5\ClientInterface $client)
    {
        $json = $this->getJson($response);

        return $this->makeTrendingObjects($json);
    }

    /**
     * @param $json
     * @return array
     */
    private function makeTrendingObjects($json)
    {
        $trending = [];
        foreach ($json as $trendingItem) {
            $trending[] = new Trending($trendingItem, $this->getClientId(), $this->getToken());
        }
        return $trending;
    }
}