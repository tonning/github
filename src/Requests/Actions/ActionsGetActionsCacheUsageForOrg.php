<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-usage-for-org
 *
 * Gets the total GitHub Actions cache usage for an organization.
 * The data fetched using this API is
 * refreshed approximately every 5 minutes, so values returned from this endpoint may take at least 5
 * minutes to get updated.
 * You must authenticate using an access token with the `read:org` scope to use
 * this endpoint. GitHub Apps must have the `organization_admistration:read` permission to use this
 * endpoint.
 */
class ActionsGetActionsCacheUsageForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/cache/usage";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
