<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-projects-in-org
 *
 * Lists the organization projects for a team.
 *
 * **Note:** You can also specify a team by `org_id` and
 * `team_id` using the route `GET /organizations/{org_id}/team/{team_id}/projects`.
 */
class TeamsListProjectsInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/projects";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
