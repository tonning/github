<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-installation-repos-for-authenticated-user
 *
 * List repositories that the authenticated user has explicit permission (`:read`, `:write`, or
 * `:admin`) to access for an installation.
 *
 * The authenticated user has explicit permission to access
 * repositories they own, repositories where they are a collaborator, and repositories that they can
 * access through an organization membership.
 *
 * You must use a [user access
 * token](https://docs.github.com/apps/creating-github-apps/authenticating-with-a-github-app/generating-a-user-access-token-for-a-github-app),
 * created for a user who has authorized your GitHub App, to access this endpoint.
 *
 * The access the user
 * has to each repository is included in the hash under the `permissions` key.
 */
class AppsListInstallationReposForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/installations/{$this->installationId}/repositories";
	}


	/**
	 * @param int $installationId The unique identifier of the installation.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $installationId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
