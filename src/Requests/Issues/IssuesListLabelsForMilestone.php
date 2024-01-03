<?php

namespace Tonning\Github\Requests\Issues;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-labels-for-milestone
 *
 * Lists labels for issues in a milestone.
 */
class IssuesListLabelsForMilestone extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/milestones/{$this->milestoneNumber}/labels";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $milestoneNumber The number that identifies the milestone.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $milestoneNumber,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
