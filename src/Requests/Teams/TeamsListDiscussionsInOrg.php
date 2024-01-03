<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-discussions-in-org
 *
 * List all discussions on a team's page. OAuth access tokens require the `read:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 *
 * **Note:**
 * You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/discussions`.
 */
class TeamsListDiscussionsInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $pinned Pinned discussions only filter
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?string $pinned = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['direction' => $this->direction, 'page' => $this->page, 'pinned' => $this->pinned]);
    }
}
