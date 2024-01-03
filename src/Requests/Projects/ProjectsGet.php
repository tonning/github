<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get
 *
 * Gets a project by its `id`. Returns a `404 Not Found` status if projects are disabled. If you do not
 * have sufficient privileges to perform this action, a `401 Unauthorized` or `410 Gone` status is
 * returned.
 */
class ProjectsGet extends Request
{
	protected Method $method = Method::GET;


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
