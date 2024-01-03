<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-membership-for-user-legacy
 *
 * **Deprecation Notice:** This endpoint route is deprecated and will be removed from the Teams API. We
 * recommend migrating your existing code to use the new [Add or update team membership for a
 * user](https://docs.github.com/rest/teams/members#add-or-update-team-membership-for-a-user)
 * endpoint.
 *
 * Team synchronization is available for organizations using GitHub Enterprise Cloud. For
 * more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * If the user is already a member of the team's organization, this endpoint will
 * add the user to the team. To add a membership between an organization member and a team, the
 * authenticated user must be an organization owner or a team maintainer.
 *
 * **Note:** When you have team
 * synchronization set up for a team with your organization's identity provider (IdP), you will see an
 * error if you attempt to use the API for making changes to the team's membership. If you have access
 * to manage group membership in your IdP, you can manage GitHub team membership through your identity
 * provider, which automatically adds and removes team members in an organization. For more
 * information, see "[Synchronizing teams between your identity provider and
 * GitHub](https://docs.github.com/articles/synchronizing-teams-between-your-identity-provider-and-github/)."
 *
 * If
 * the user is unaffiliated with the team's organization, this endpoint will send an invitation to the
 * user via email. This newly-created membership will be in the "pending" state until the user accepts
 * the invitation, at which point the membership will transition to the "active" state and the user
 * will be added as a member of the team. To add a membership between an unaffiliated user and a team,
 * the authenticated user must be an organization owner.
 *
 * If the user is already a member of the team,
 * this endpoint will update the role of the team member's role. To update the membership of a team
 * member, the authenticated user must be an organization owner or a team maintainer.
 */
class TeamsAddOrUpdateMembershipForUserLegacy extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/teams/{$this->teamId}/memberships/{$this->username}";
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected int $teamId,
		protected string $username,
	) {
	}
}
