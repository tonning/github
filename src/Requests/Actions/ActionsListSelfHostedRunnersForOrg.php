<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-self-hosted-runners-for-org
 *
 * Lists all self-hosted runners configured in an organization.
 *
 * You must authenticate using an access
 * token with the `admin:org` scope to use this endpoint.
 * If the repository is private, you must use an
 * access token with the `repo` scope.
 * GitHub Apps must have the `administration` permission for
 * repositories and the `organization_self_hosted_runners` permission for organizations.
 * Authenticated
 * users must have admin access to repositories or organizations, or the `manage_runners:enterprise`
 * scope for enterprises, to use these endpoints.
 */
class ActionsListSelfHostedRunnersForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/runners";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|string $name The name of a self-hosted runner.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected ?string $name = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['name' => $this->name, 'page' => $this->page]);
	}
}
