<?php

namespace Tonning\Github\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-comments-for-repo
 *
 * You can use the REST API to list comments on issues and pull requests for a repository. Every pull
 * request is an issue, but not every issue is a pull request.
 *
 * By default, issue comments are ordered
 * by ascending ID.
 */
class IssuesListCommentsForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/comments";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $sort The property to sort the results by.
     * @param  null|string  $direction Either `asc` or `desc`. Ignored without the `sort` parameter.
     * @param  null|string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $since = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['sort' => $this->sort, 'direction' => $this->direction, 'since' => $this->since, 'page' => $this->page]);
    }
}
