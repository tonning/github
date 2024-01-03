<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/delete
 *
 * Deletes a project board. Returns a `404 Not Found` status if projects are disabled.
 */
class ProjectsDelete extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/projects/{$this->projectId}";
	}


	/**
	 * @param int $projectId The unique identifier of the project.
	 */
	public function __construct(
		protected int $projectId,
	) {
	}
}
