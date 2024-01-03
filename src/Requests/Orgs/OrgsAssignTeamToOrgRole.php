<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/assign-team-to-org-role
 *
 * Assigns an organization role to a team in an organization.
 * To use this endpoint, you must be an
 * administrator for the organization, and you must use an access token with the `admin:org`
 * scope.
 * GitHub Apps must have the `members` organization read-write permission to use this
 * endpoint.
 *
 * For more information on organization roles, see "[Managing people's access to your
 * organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsAssignTeamToOrgRole extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-roles/teams/{$this->teamSlug}/{$this->roleId}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $roleId The unique identifier of the role.
	 */
	public function __construct(
		protected string $org,
		protected string $teamSlug,
		protected int $roleId,
	) {
	}
}
