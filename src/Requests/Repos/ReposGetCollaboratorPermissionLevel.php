<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-collaborator-permission-level
 *
 * Checks the repository permission of a collaborator. The possible repository
 * permissions are `admin`,
 * `write`, `read`, and `none`.
 *
 * *Note*: The `permission` attribute provides the legacy base roles of
 * `admin`, `write`, `read`, and `none`, where the
 * `maintain` role is mapped to `write` and the
 * `triage` role is mapped to `read`. To determine the role assigned to the
 * collaborator, see the
 * `role_name` attribute, which will provide the full role name, including custom roles.
 * The
 * `permissions` hash can also be used to determine which base level of access the collaborator has
 * to the repository.
 */
class ReposGetCollaboratorPermissionLevel extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/collaborators/{$this->username}/permission";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $username,
	) {
	}
}
