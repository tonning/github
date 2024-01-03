<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-in-org
 *
 * Creates a new repository in the specified organization. The authenticated user must be a member of
 * the organization.
 *
 * **OAuth scope requirements**
 *
 * When using
 * [OAuth](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/),
 * authorizations must include:
 *
 * *   `public_repo` scope or `repo` scope to create a public
 * repository
 * *   `repo` scope to create a private repository
 */
class ReposCreateInOrg extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/repos";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
