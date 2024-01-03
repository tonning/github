<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-usage-by-repo-for-org
 *
 * Lists repositories and their GitHub Actions cache usage for an organization.
 * The data fetched using
 * this API is refreshed approximately every 5 minutes, so values returned from this endpoint may take
 * at least 5 minutes to get updated.
 * You must authenticate using an access token with the `read:org`
 * scope to use this endpoint. GitHub Apps must have the `organization_admistration:read` permission to
 * use this endpoint.
 */
class ActionsGetActionsCacheUsageByRepoForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/cache/usage-by-repository";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
