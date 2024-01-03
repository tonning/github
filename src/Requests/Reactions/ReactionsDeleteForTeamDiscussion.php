<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/delete-for-team-discussion
 *
 * **Note:** You can also specify a team or organization with `team_id` and `org_id` using the route
 * `DELETE
 * /organizations/:org_id/team/:team_id/discussions/:discussion_number/reactions/:reaction_id`.
 *
 * Delete
 * a reaction to a [team discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion).
 * OAuth access tokens require the `write:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class ReactionsDeleteForTeamDiscussion extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/reactions/{$this->reactionId}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
        protected int $reactionId,
    ) {
    }
}
