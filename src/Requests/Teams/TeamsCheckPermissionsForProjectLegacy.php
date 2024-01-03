<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/check-permissions-for-project-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Check team permissions for a
 * project](https://docs.github.com/rest/teams/teams#check-team-permissions-for-a-project)
 * endpoint.
 *
 * Checks whether a team has `read`, `write`, or `admin` permissions for an organization
 * project. The response includes projects inherited from a parent team.
 */
class TeamsCheckPermissionsForProjectLegacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/projects/{$this->projectId}";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $projectId The unique identifier of the project.
     */
    public function __construct(
        protected int $teamId,
        protected int $projectId,
    ) {
    }
}
