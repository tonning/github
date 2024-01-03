<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-discussion-comments-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [List discussion
 * comments](https://docs.github.com/rest/teams/discussion-comments#list-discussion-comments)
 * endpoint.
 *
 * List all comments on a team discussion. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class TeamsListDiscussionCommentsLegacy extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/comments";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $teamId,
		protected int $discussionNumber,
		protected ?string $direction = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['direction' => $this->direction, 'page' => $this->page]);
	}
}
