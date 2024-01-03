<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-discussions-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [`List
 * discussions`](https://docs.github.com/rest/teams/discussions#list-discussions) endpoint.
 *
 * List all
 * discussions on a team's page. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class TeamsListDiscussionsLegacy extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}/discussions";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $teamId,
		protected ?string $direction = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['direction' => $this->direction, 'page' => $this->page]);
	}
}
