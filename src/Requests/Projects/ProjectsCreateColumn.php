<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/create-column
 *
 * Creates a new project column.
 */
class ProjectsCreateColumn extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/projects/{$this->projectId}/columns";
	}


	/**
	 * @param int $projectId The unique identifier of the project.
	 */
	public function __construct(
		protected int $projectId,
	) {
	}
}
