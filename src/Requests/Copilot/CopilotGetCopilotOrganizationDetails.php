<?php

namespace Tonning\Github\Requests\Copilot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/get-copilot-organization-details
 *
 * **Note**: This endpoint is in beta and is subject to change.
 *
 * Gets information about an
 * organization's Copilot Business subscription, including seat breakdown
 * and code matching policies.
 * To configure these settings, go to your organization's settings on GitHub.com.
 * For more information,
 * see "[Managing policies for Copilot Business in your
 * organization](https://docs.github.com/copilot/managing-copilot-business/managing-policies-for-copilot-business-in-your-organization)".
 *
 * Only
 * organization owners can configure and view details about the organization's Copilot Business
 * subscription. You must
 * authenticate using an access token with the `manage_billing:copilot` scope to
 * use this endpoint.
 */
class CopilotGetCopilotOrganizationDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/copilot/billing";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
