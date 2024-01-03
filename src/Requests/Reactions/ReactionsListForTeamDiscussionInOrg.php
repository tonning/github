<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/list-for-team-discussion-in-org
 *
 * List the reactions to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion). OAuth access tokens
 * require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 *
 * **Note:**
 * You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/:org_id/team/:team_id/discussions/:discussion_number/reactions`.
 */
class ReactionsListForTeamDiscussionInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/reactions";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  null|string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
        protected ?string $content = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['content' => $this->content, 'page' => $this->page]);
    }
}
