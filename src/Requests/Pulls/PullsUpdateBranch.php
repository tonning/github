<?php

namespace Tonning\Github\Requests\Pulls;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/update-branch
 *
 * Updates the pull request branch with the latest upstream changes by merging HEAD from the base
 * branch into the pull request branch.
 */
class PullsUpdateBranch extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/update-branch";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $pullNumber The number that identifies the pull request.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $pullNumber,
	) {
	}
}
