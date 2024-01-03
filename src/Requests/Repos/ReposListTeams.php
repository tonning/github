<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-teams
 *
 * Lists the teams that have access to the specified repository and that are also visible to the
 * authenticated user.
 *
 * For a public repository, a team is listed only if that team added the public
 * repository explicitly.
 *
 * Personal access tokens require the following scopes:
 * * `public_repo` to call
 * this endpoint on a public repository
 * * `repo` to call this endpoint on a private repository (this
 * scope also includes public repositories)
 *
 * This endpoint is not compatible with fine-grained personal
 * access tokens.
 */
class ReposListTeams extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/teams";
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
