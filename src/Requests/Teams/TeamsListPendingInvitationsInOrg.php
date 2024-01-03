<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-pending-invitations-in-org
 *
 * The return hash contains a `role` field which refers to the Organization Invitation role and will be
 * one of the following values: `direct_member`, `admin`, `billing_manager`, `hiring_manager`, or
 * `reinstate`. If the invitee is not a GitHub member, the `login` field in the return hash will be
 * `null`.
 *
 * **Note:** You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/invitations`.
 */
class TeamsListPendingInvitationsInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/invitations";
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
