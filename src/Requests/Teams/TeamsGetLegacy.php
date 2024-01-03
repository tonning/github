<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the [Get a team by
 * name](https://docs.github.com/rest/teams/teams#get-a-team-by-name) endpoint.
 */
class TeamsGetLegacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     */
    public function __construct(
        protected int $teamId,
    ) {
    }
}
