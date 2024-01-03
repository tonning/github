<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-columns
 *
 * Lists the project columns in a project.
 */
class ProjectsListColumns extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/projects/{$this->projectId}/columns";
	}


	/**
	 * @param int $projectId The unique identifier of the project.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $projectId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
