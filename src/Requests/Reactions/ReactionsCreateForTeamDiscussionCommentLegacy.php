<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-team-discussion-comment-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new "[Create reaction for a team discussion
 * comment](https://docs.github.com/rest/reactions/reactions#create-reaction-for-a-team-discussion-comment)"
 * endpoint.
 *
 * Create a reaction to a [team discussion
 * comment](https://docs.github.com/rest/teams/discussion-comments#get-a-discussion-comment). OAuth
 * access tokens require the `write:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/). A
 * response with an HTTP `200` status means that you already added the reaction type to this team
 * discussion comment.
 */
class ReactionsCreateForTeamDiscussionCommentLegacy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/comments/{$this->commentNumber}/reactions";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
        protected int $commentNumber,
    ) {
    }
}
