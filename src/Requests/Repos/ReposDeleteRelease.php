<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-release
 *
 * Users with push access to the repository can delete a release.
 */
class ReposDeleteRelease extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/releases/{$this->releaseId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $releaseId The unique identifier of the release.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $releaseId,
	) {
	}
}
