<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/update-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Update a
 * team](https://docs.github.com/rest/teams/teams#update-a-team) endpoint.
 *
 * To edit a team, the
 * authenticated user must either be an organization owner or a team maintainer.
 *
 * **Note:** With nested
 * teams, the `privacy` for parent teams cannot be `secret`.
 */
class TeamsUpdateLegacy extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 */
	public function __construct(
		protected int $teamId,
	) {
	}
}
