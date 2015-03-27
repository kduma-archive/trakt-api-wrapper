<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 27/03/15
 * Time: 12:00
 */

namespace Wubs\Trakt\Request\Episodes;


use Wubs\Trakt\Request\AbstractRequest;
use Wubs\Trakt\Request\Episodes\EpisodeTrait;
use Wubs\Trakt\Request\Parameters\MediaId;
use Wubs\Trakt\Request\Parameters\MediaIdTrait;
use Wubs\Trakt\Request\RequestType;

class Watching extends AbstractRequest
{
    use MediaIdTrait, EpisodeTrait;
    /**
     * @var Season
     */
    private $season;

    /**
     * @param MediaId $id
     * @param int $season
     * @param int $episode
     */
    public function __construct(MediaId $id, $season, $episode)
    {
        parent::__construct();
        $this->id = $id;
        $this->season = $season;
        $this->episode = $episode;
    }

    public function getRequestType()
    {
        return RequestType::GET;
    }

    public function getUri()
    {
        return "shows/:id/seasons/:season/episode/:episode/watching";
    }
}