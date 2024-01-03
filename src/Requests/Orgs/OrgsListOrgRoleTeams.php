<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-org-role-teams
 *
 * Lists the teams that are assigned to an organization role.
 *
 * To use this endpoint, you must be an
 * administrator for the organization, and you must use an access token with the `admin:org`
 * scope.
 * GitHub Apps must have the `members` organization read permission to use this endpoint.
 *
 * For
 * more information on organization roles, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsListOrgRoleTeams extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-roles/{$this->roleId}/teams";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $roleId The unique identifier of the role.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected int $roleId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
