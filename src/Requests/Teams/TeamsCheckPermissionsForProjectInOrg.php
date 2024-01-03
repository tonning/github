<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/check-permissions-for-project-in-org
 *
 * Checks whether a team has `read`, `write`, or `admin` permissions for an organization project. The
 * response includes projects inherited from a parent team.
 *
 * **Note:** You can also specify a team by
 * `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/projects/{project_id}`.
 */
class TeamsCheckPermissionsForProjectInOrg extends Request
{
    protected Method $method = Method::GET;

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
