<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-discussion-comment-in-org
 *
 * Get a specific comment on a team discussion. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 *
 * **Note:**
 * You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}/comments/{comment_number}`.
 */
class TeamsGetDiscussionCommentInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/comments/{$this->commentNumber}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
        protected int $commentNumber,
    ) {
    }
}
