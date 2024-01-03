<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-members-in-org
 *
 * Team members will include the members of child teams.
 *
 * To list members in a team, the team must be
 * visible to the authenticated user.
 */
class TeamsListMembersInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/members";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  null|string  $role Filters members returned by their role in the team.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected ?string $role = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['role' => $this->role, 'page' => $this->page]);
    }
}
