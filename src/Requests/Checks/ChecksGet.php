<?php

namespace Tonning\Github\Requests\Checks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/get
 *
 * Gets a single check run using its `id`.
 *
 * GitHub Apps must have the `checks:read` permission on a
 * private repository or pull access to a public repository to get check runs. OAuth apps and
 * authenticated users must have the `repo` scope to get check runs in a private repository.
 *
 * **Note:**
 * The Checks API only looks for pushes in the repository where the check suite or check run were
 * created. Pushes to a branch in a forked repository are not detected and return an empty
 * `pull_requests` array.
 */
class ChecksGet extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/check-runs/{$this->checkRunId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $checkRunId The unique identifier of the check run.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $checkRunId,
	) {
	}
}
