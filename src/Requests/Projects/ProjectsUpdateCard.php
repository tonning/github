<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/update-card
 */
class ProjectsUpdateCard extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/projects/columns/cards/{$this->cardId}";
	}


	/**
	 * @param int $cardId The unique identifier of the card.
	 */
	public function __construct(
		protected int $cardId,
	) {
	}
}
