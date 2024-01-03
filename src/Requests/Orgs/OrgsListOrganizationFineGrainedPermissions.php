<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-organization-fine-grained-permissions
 *
 * Lists the fine-grained permissions that can be used in custom organization roles for an
 * organization. For more information, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 *
 * To
 * list the fine-grained permissions that can be used in custom repository roles for an organization,
 * see "[List repository fine-grained permissions for an
 * organization](https://docs.github.com/rest/orgs/organization-roles#list-repository-fine-grained-permissions-for-an-organization)."
 *
 * To
 * use this endpoint, the authenticated user must be one of:
 *
 * - An administrator for the
 * organization.
 * - A user, or a user on a team, with the fine-grained permissions of
 * `read_organization_custom_org_role` in the organization.
 *
 * The authenticated user needs an access
 * token with `admin:org` scope or a fine-grained personal access token with the
 * `organization_custom_roles:read` permission to use this endpoint.
 * GitHub Apps must have the
 * `organization_custom_org_roles:read` organization permission to use this endpoint.
 */
class OrgsListOrganizationFineGrainedPermissions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/organization-fine-grained-permissions";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
