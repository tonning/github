<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * security-advisories/create-repository-advisory
 *
 * Creates a new repository security advisory.
 * You must authenticate using an access token with the
 * `repo` scope or `repository_advisories:write` permission to use this endpoint.
 *
 * In order to create a
 * draft repository security advisory, you must be a security manager or administrator of that
 * repository.
 */
class SecurityAdvisoriesCreateRepositoryAdvisory extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/security-advisories";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
	) {
	}
}
