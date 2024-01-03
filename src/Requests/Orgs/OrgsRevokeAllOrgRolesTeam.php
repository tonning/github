<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/revoke-all-org-roles-team
 *
 * Removes all assigned organization roles from a team.
 *
 * To use this endpoint, you must be an
 * administrator for the organization, and you must use an access token with the `admin:org`
 * scope.
 * GitHub Apps must have the `members:write` organization permission to use this endpoint.
 *
 * For
 * more information on organization roles, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsRevokeAllOrgRolesTeam extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-roles/teams/{$this->teamSlug}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 */
	public function __construct(
		protected string $org,
		protected string $teamSlug,
	) {
	}
}
