<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/merge
 */
class ReposMerge extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/merges";
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
