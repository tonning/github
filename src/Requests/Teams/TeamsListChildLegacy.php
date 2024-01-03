<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-child-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [`List child
 * teams`](https://docs.github.com/rest/teams/teams#list-child-teams) endpoint.
 */
class TeamsListChildLegacy extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}/teams";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $teamId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
