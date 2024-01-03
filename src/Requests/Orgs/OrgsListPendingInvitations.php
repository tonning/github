<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-pending-invitations
 *
 * The return hash contains a `role` field which refers to the Organization Invitation role and will be
 * one of the following values: `direct_member`, `admin`, `billing_manager`, or `hiring_manager`. If
 * the invitee is not a GitHub member, the `login` field in the return hash will be `null`.
 */
class OrgsListPendingInvitations extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/invitations";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|string $role Filter invitations by their member role.
	 * @param null|string $invitationSource Filter invitations by their invitation source.
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
		protected ?string $role = null,
		protected ?string $invitationSource = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'role' => $this->role, 'invitation_source' => $this->invitationSource]);
	}
}
