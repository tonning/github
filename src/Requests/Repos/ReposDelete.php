<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete
 *
 * Deleting a repository requires admin access. If OAuth is used, the `delete_repo` scope is
 * required.
 *
 * If an organization owner has configured the organization to prevent members from deleting
 * organization-owned
 * repositories, you will get a `403 Forbidden` response.
 */
class ReposDelete extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
	) {
	}
}
