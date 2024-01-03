<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-collaborators
 *
 * For organization-owned repositories, the list of collaborators includes outside collaborators,
 * organization members that are direct collaborators, organization members with access through team
 * memberships, organization members with access through default organization permissions, and
 * organization owners.
 * Organization members with write, maintain, or admin privileges on the
 * organization-owned repository can use this endpoint.
 *
 * Team members will include the members of child
 * teams.
 *
 * You must authenticate using an access token with the `read:org` and `repo` scopes with push
 * access to use this
 * endpoint. GitHub Apps must have the `members` organization permission and
 * `metadata` repository permission to use this
 * endpoint.
 */
class ReposListCollaborators extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/collaborators";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $affiliation Filter collaborators returned by their affiliation. `outside` means all outside collaborators of an organization-owned repository. `direct` means all collaborators with permissions to an organization-owned repository, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
	 * @param null|string $permission Filter collaborators by the permissions they have on the repository. If not specified, all collaborators will be returned.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $affiliation = null,
		protected ?string $permission = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['affiliation' => $this->affiliation, 'permission' => $this->permission, 'page' => $this->page]);
	}
}
