<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/enable-or-disable-security-product-on-all-org-repos
 *
 * Enables or disables the specified security feature for all eligible repositories in an
 * organization.
 *
 * To use this endpoint, you must be an organization owner or be member of a team with
 * the security manager role.
 * A token with the 'write:org' scope is also required.
 *
 * GitHub Apps must
 * have the `organization_administration:write` permission to use this endpoint.
 *
 * For more information,
 * see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 */
class OrgsEnableOrDisableSecurityProductOnAllOrgRepos extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/{$this->securityProduct}/{$this->enablement}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $securityProduct The security feature to enable or disable.
	 * @param string $enablement The action to take.
	 *
	 * `enable_all` means to enable the specified security feature for all repositories in the organization.
	 * `disable_all` means to disable the specified security feature for all repositories in the organization.
	 */
	public function __construct(
		protected string $org,
		protected string $securityProduct,
		protected string $enablement,
	) {
	}
}
