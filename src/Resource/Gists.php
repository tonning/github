<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Gists\GistsCheckIsStarred;
use Tonning\Github\Requests\Gists\GistsCreate;
use Tonning\Github\Requests\Gists\GistsCreateComment;
use Tonning\Github\Requests\Gists\GistsDelete;
use Tonning\Github\Requests\Gists\GistsDeleteComment;
use Tonning\Github\Requests\Gists\GistsFork;
use Tonning\Github\Requests\Gists\GistsGet;
use Tonning\Github\Requests\Gists\GistsGetComment;
use Tonning\Github\Requests\Gists\GistsGetRevision;
use Tonning\Github\Requests\Gists\GistsList;
use Tonning\Github\Requests\Gists\GistsListComments;
use Tonning\Github\Requests\Gists\GistsListCommits;
use Tonning\Github\Requests\Gists\GistsListForks;
use Tonning\Github\Requests\Gists\GistsListForUser;
use Tonning\Github\Requests\Gists\GistsListPublic;
use Tonning\Github\Requests\Gists\GistsListStarred;
use Tonning\Github\Requests\Gists\GistsStar;
use Tonning\Github\Requests\Gists\GistsUnstar;
use Tonning\Github\Requests\Gists\GistsUpdate;
use Tonning\Github\Requests\Gists\GistsUpdateComment;
use Tonning\Github\Resource;

class Gists extends Resource
{
    /**
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsList(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsList($since, $page));
    }

    public function gistsCreate(): Response
    {
        return $this->connector->send(new GistsCreate());
    }

    /**
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListPublic(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListPublic($since, $page));
    }

    /**
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListStarred(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListStarred($since, $page));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsGet(string $gistId): Response
    {
        return $this->connector->send(new GistsGet($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsDelete(string $gistId): Response
    {
        return $this->connector->send(new GistsDelete($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsUpdate(string $gistId): Response
    {
        return $this->connector->send(new GistsUpdate($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListComments(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListComments($gistId, $page));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsCreateComment(string $gistId): Response
    {
        return $this->connector->send(new GistsCreateComment($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function gistsGetComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsGetComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function gistsDeleteComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsDeleteComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function gistsUpdateComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsUpdateComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListCommits(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListCommits($gistId, $page));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListForks(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListForks($gistId, $page));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsFork(string $gistId): Response
    {
        return $this->connector->send(new GistsFork($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsCheckIsStarred(string $gistId): Response
    {
        return $this->connector->send(new GistsCheckIsStarred($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsStar(string $gistId): Response
    {
        return $this->connector->send(new GistsStar($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsUnstar(string $gistId): Response
    {
        return $this->connector->send(new GistsUnstar($gistId));
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function gistsGetRevision(string $gistId, string $sha): Response
    {
        return $this->connector->send(new GistsGetRevision($gistId, $sha));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function gistsListForUser(string $username, ?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListForUser($username, $since, $page));
    }
}
