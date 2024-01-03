<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-security-manager-teams
 *
 * Lists teams that are security managers for an organization. For more information, see "[Managing
 * security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 *
 * To
 * use this endpoint, you must be an administrator or security manager for the organization, and you
 * must use an access token with the `read:org` scope.
 *
 * GitHub Apps must have the `administration`
 * organization read permission to use this endpoint.
 */
class OrgsListSecurityManagerTeams extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/security-managers";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
