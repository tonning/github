<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-pending-invitations-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [`List pending team
 * invitations`](https://docs.github.com/rest/teams/members#list-pending-team-invitations)
 * endpoint.
 *
 * The return hash contains a `role` field which refers to the Organization Invitation role
 * and will be one of the following values: `direct_member`, `admin`, `billing_manager`,
 * `hiring_manager`, or `reinstate`. If the invitee is not a GitHub member, the `login` field in the
 * return hash will be `null`.
 */
class TeamsListPendingInvitationsLegacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/invitations";
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected int $teamId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
