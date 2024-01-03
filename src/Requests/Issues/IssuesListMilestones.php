<?php

namespace Tonning\Github\Requests\Issues;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-milestones
 *
 * Lists milestones for a repository.
 */
class IssuesListMilestones extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/milestones";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $state The state of the milestone. Either `open`, `closed`, or `all`.
	 * @param null|string $sort What to sort results by. Either `due_on` or `completeness`.
	 * @param null|string $direction The direction of the sort. Either `asc` or `desc`.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $state = null,
		protected ?string $sort = null,
		protected ?string $direction = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['state' => $this->state, 'sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page]);
	}
}
