<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-project-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Remove a project from a
 * team](https://docs.github.com/rest/teams/teams#remove-a-project-from-a-team) endpoint.
 *
 * Removes an
 * organization project from a team. An organization owner or a team maintainer can remove any project
 * from the team. To remove a project from a team as an organization member, the authenticated user
 * must have `read` access to both the team and project, or `admin` access to the team or project.
 * **Note:** This endpoint removes the project from the team, but does not delete it.
 */
class TeamsRemoveProjectLegacy extends Request
{
    protected Method $method = Method::DELETE;

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
