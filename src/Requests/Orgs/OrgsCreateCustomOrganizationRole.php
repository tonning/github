<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-custom-organization-role
 *
 * Creates a custom organization role that can be assigned to users and teams, granting them specific
 * permissions over the organization.
 *
 * To use this endpoint, the authenticated user must be one of:
 *
 * -
 * An administrator for the organization.
 * - A user, or a user on a team, with the fine-grained
 * permissions of `write_organization_custom_org_role` in the organization.
 *
 * The authenticated user
 * needs an access token with `admin:org` scope or a fine-grained personal access token with the
 * `organization_custom_roles:write` permission to use this endpoint.
 * GitHub Apps must have the
 * `organization_custom_org_roles:write` organization permission to use this endpoint.
 *
 * For more
 * information on custom organization roles, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsCreateCustomOrganizationRole extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-roles";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
