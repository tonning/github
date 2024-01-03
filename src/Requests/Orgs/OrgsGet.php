<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get
 *
 * To see many of the organization response values, you need to be an authenticated organization owner
 * with the `admin:org` scope. When the value of `two_factor_requirement_enabled` is `true`, the
 * organization requires all members, billing managers, and outside collaborators to enable [two-factor
 * authentication](https://docs.github.com/articles/securing-your-account-with-two-factor-authentication-2fa/).
 *
 * GitHub
 * Apps with the `Organization plan` permission can use this endpoint to retrieve information about an
 * organization's GitHub plan. See "[Authenticating with GitHub
 * Apps](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/)" for
 * details. For an example response, see 'Response with GitHub plan information' below."
 */
class OrgsGet extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
