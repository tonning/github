<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/delete-discussion-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [`Delete a
 * discussion`](https://docs.github.com/rest/teams/discussions#delete-a-discussion) endpoint.
 *
 * Delete a
 * discussion from a team's page. OAuth access tokens require the `write:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class TeamsDeleteDiscussionLegacy extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
    ) {
    }
}
