<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-repos-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [List team
 * repositories](https://docs.github.com/rest/teams/teams#list-team-repositories) endpoint.
 */
class TeamsListReposLegacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/repos";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected int $teamId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
