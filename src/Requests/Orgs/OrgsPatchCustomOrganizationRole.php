<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/patch-custom-organization-role
 *
 * Updates an existing custom organization role. Permission changes will apply to all assignees.
 *
 * To
 * use this endpoint, the authenticated user must be one of:
 *
 * - An administrator for the
 * organization.
 * - A user, or a user on a team, with the fine-grained permissions of
 * `write_organization_custom_org_role` in the organization.
 *
 * The authenticated user needs an access
 * token with `admin:org` scope or a fine-grained personal access token with the
 * `organization_custom_roles:write` permission to use this endpoint.
 * GitHub Apps must have the
 * `organization_custom_org_roles:write` organization permission to use this endpoint.
 *
 * For more
 * information on custom organization roles, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsPatchCustomOrganizationRole extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-roles/{$this->roleId}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $roleId The unique identifier of the role.
	 */
	public function __construct(
		protected string $org,
		protected int $roleId,
	) {
	}
}
