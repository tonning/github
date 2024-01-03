<?php

namespace Tonning\Github\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-stargazers-for-repo
 *
 * Lists the people that have starred the repository.
 *
 * You can also find out _when_ stars were created
 * by passing the following custom [media type](https://docs.github.com/rest/overview/media-types/) via
 * the `Accept` header: `application/vnd.github.star+json`.
 */
class ActivityListStargazersForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/stargazers";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
