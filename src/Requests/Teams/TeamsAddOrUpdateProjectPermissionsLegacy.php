<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-project-permissions-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Add or update team project
 * permissions](https://docs.github.com/rest/teams/teams#add-or-update-team-project-permissions)
 * endpoint.
 *
 * Adds an organization project to a team. To add a project to a team or update the team's
 * permission on a project, the authenticated user must have `admin` permissions for the project. The
 * project and team must be part of the same organization.
 */
class TeamsAddOrUpdateProjectPermissionsLegacy extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}/projects/{$this->projectId}";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function __construct(
		protected int $teamId,
		protected int $projectId,
	) {
	}
}
