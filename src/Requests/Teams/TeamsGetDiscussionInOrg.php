<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-discussion-in-org
 *
 * Get a specific discussion on a team's page. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 *
 * **Note:**
 * You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}`.
 */
class TeamsGetDiscussionInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
    ) {
    }
}
