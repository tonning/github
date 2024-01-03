<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-invitation-teams
 *
 * List all teams associated with an invitation. In order to see invitations in an organization, the
 * authenticated user must be an organization owner.
 */
class OrgsListInvitationTeams extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/invitations/{$this->invitationId}/teams";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $invitationId The unique identifier of the invitation.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected int $invitationId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
