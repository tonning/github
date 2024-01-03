<?php

namespace Tonning\Github\Requests\Pulls;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/list-review-comments
 *
 * Lists all review comments for a pull request. By default, review comments are in ascending order by
 * ID.
 */
class PullsListReviewComments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/comments";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $pullNumber The number that identifies the pull request.
	 * @param null|string $sort The property to sort the results by.
	 * @param null|string $direction The direction to sort results. Ignored without `sort` parameter.
	 * @param null|string $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $pullNumber,
		protected ?string $sort = null,
		protected ?string $direction = null,
		protected ?string $since = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['sort' => $this->sort, 'direction' => $this->direction, 'since' => $this->since, 'page' => $this->page]);
	}
}
