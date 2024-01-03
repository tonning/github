<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-installations-for-authenticated-user
 *
 * Lists installations of your GitHub App that the authenticated user has explicit permission (`:read`,
 * `:write`, or `:admin`) to access.
 *
 * You must use a [user access
 * token](https://docs.github.com/apps/creating-github-apps/authenticating-with-a-github-app/generating-a-user-access-token-for-a-github-app),
 * created for a user who has authorized your GitHub App, to access this endpoint.
 *
 * The authenticated
 * user has explicit permission to access repositories they own, repositories where they are a
 * collaborator, and repositories that they can access through an organization membership.
 *
 * You can
 * find the permissions for the installation under the `permissions` key.
 */
class AppsListInstallationsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/installations";
	}


	/**
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
