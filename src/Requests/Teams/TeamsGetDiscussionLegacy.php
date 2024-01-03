<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-discussion-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Get a
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion) endpoint.
 *
 * Get a
 * specific discussion on a team's page. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class TeamsGetDiscussionLegacy extends Request
{
    protected Method $method = Method::GET;

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
