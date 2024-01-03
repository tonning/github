<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * security-advisories/update-repository-advisory
 *
 * Update a repository security advisory using its GitHub Security Advisory (GHSA) identifier.
 * You must
 * authenticate using an access token with the `repo` scope or `repository_advisories:write` permission
 * to use this endpoint.
 *
 * In order to update any security advisory, you must be a security manager or
 * administrator of that repository,
 * or a collaborator on the repository security advisory.
 */
class SecurityAdvisoriesUpdateRepositoryAdvisory extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/security-advisories/{$this->ghsaId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $ghsaId,
	) {
	}
}
