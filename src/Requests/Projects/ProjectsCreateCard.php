<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/create-card
 */
class ProjectsCreateCard extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/projects/columns/{$this->columnId}/cards";
	}


	/**
	 * @param int $columnId The unique identifier of the column.
	 */
	public function __construct(
		protected int $columnId,
	) {
	}
}
