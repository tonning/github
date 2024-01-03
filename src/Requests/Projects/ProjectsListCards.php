<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-cards
 *
 * Lists the project cards in a project.
 */
class ProjectsListCards extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/projects/columns/{$this->columnId}/cards";
	}


	/**
	 * @param int $columnId The unique identifier of the column.
	 * @param null|string $archivedState Filters the project cards that are returned by the card's state.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $columnId,
		protected ?string $archivedState = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['archived_state' => $this->archivedState, 'page' => $this->page]);
	}
}
