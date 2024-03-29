<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-project-in-org
 *
 * Removes an organization project from a team. An organization owner or a team maintainer can remove
 * any project from the team. To remove a project from a team as an organization member, the
 * authenticated user must have `read` access to both the team and project, or `admin` access to the
 * team or project. This endpoint removes the project from the team, but does not delete the
 * project.
 *
 * **Note:** You can also specify a team by `org_id` and `team_id` using the route `DELETE
 * /organizations/{org_id}/team/{team_id}/projects/{project_id}`.
 */
class TeamsRemoveProjectInOrg extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/projects/{$this->projectId}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $projectId The unique identifier of the project.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $projectId,
    ) {
    }
}
