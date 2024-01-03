<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-project-permissions-in-org
 *
 * Adds an organization project to a team. To add a project to a team or update the team's permission
 * on a project, the authenticated user must have `admin` permissions for the project. The project and
 * team must be part of the same organization.
 *
 * **Note:** You can also specify a team by `org_id` and
 * `team_id` using the route `PUT /organizations/{org_id}/team/{team_id}/projects/{project_id}`.
 */
class TeamsAddOrUpdateProjectPermissionsInOrg extends Request
{
    protected Method $method = Method::PUT;

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
