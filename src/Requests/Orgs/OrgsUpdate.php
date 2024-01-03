<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update
 *
 * **Parameter Deprecation Notice:** GitHub will replace and discontinue
 * `members_allowed_repository_creation_type` in favor of more granular permissions. The new input
 * parameters are `members_can_create_public_repositories`, `members_can_create_private_repositories`
 * for all organizations and `members_can_create_internal_repositories` for organizations associated
 * with an enterprise account using GitHub Enterprise Cloud or GitHub Enterprise Server 2.20+. For more
 * information, see the [blog
 * post](https://developer.github.com/changes/2019-12-03-internal-visibility-changes).
 *
 * Enables an
 * authenticated organization owner with the `admin:org` scope or the `repo` scope to update the
 * organization's profile and member privileges.
 */
class OrgsUpdate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


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
