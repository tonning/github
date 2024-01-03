<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-contributors-stats
 *
 *
 * Returns the `total` number of commits authored by the contributor. In addition, the response
 * includes a Weekly Hash (`weeks` array) with the following information:
 *
 * *   `w` - Start of the week,
 * given as a [Unix timestamp](http://en.wikipedia.org/wiki/Unix_time).
 * *   `a` - Number of additions
 * *
 * `d` - Number of deletions
 * *   `c` - Number of commits
 */
class ReposGetContributorsStats extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/stats/contributors";
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
