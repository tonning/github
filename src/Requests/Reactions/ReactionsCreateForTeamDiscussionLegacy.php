<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-team-discussion-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [`Create reaction for a team
 * discussion`](https://docs.github.com/rest/reactions/reactions#create-reaction-for-a-team-discussion)
 * endpoint.
 *
 * Create a reaction to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion). OAuth access tokens
 * require the `write:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/). A
 * response with an HTTP `200` status means that you already added the reaction type to this team
 * discussion.
 */
class ReactionsCreateForTeamDiscussionLegacy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/reactions";
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
