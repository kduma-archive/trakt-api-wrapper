<?php
use GuzzleHttp5\ClientInterface;
use GuzzleHttp5\Message\RequestInterface;
use GuzzleHttp5\Message\ResponseInterface;
use Wubs\Trakt\Request\Comments\Delete;
use Wubs\Trakt\Request\Comments\Get;
use Wubs\Trakt\Request\Comments\Create;
use Wubs\Trakt\Request\Parameters\Comment;
use Wubs\Trakt\Request\Parameters\CommentId;
use Wubs\Trakt\Request\Parameters\Spoiler;
use Wubs\Trakt\Request\RequestType;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 15/03/15
 * Time: 18:50
 */
class CommentsTest extends PHPUnit_Framework_TestCase
{

    protected function tearDown()
    {
        Mockery::close();
    }

    public function testCanPostCommentFromMovieObject()
    {
        $client = Mockery::mock(ClientInterface::class);

        $request = new Create(
            movie($client),
            "This was an awesome movie! I really liked it",
            false
        );

        $type = $request->getRequestType();

        $url = $request->getUrl();

        $this->assertEquals(RequestType::POST, $type);
        $this->assertEquals("comments", $url);

    }

    public function testCanDeleteCommentById()
    {
        $request = new Delete(get_token(), 1223);

        $type = $request->getRequestType();

        $url = $request->getUrl();

        $this->assertEquals(RequestType::DELETE, $type);
        $this->assertEquals("comments/1223", $url);

    }

    /**
     * @@expectedException Wubs\Trakt\Request\Exception\CommentTooShortException
     */
    public function testThrowsExceptionWithShoutLessThan5Words()
    {
        $client = Mockery::mock(stdClass::class . ", " . ClientInterface::class);

        $movie = movie($client);

        new Create($movie, "too short", false);
    }
}
