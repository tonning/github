<?php

namespace Tonning\Github\Requests\Copilot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/get-copilot-seat-details-for-user
 *
 * **Note**: This endpoint is in beta and is subject to change.
 *
 * Gets the GitHub Copilot Business seat
 * assignment details for a member of an organization who currently has access to GitHub
 * Copilot.
 *
 * Organization owners can view GitHub Copilot seat assignment details for members in their
 * organization. You must authenticate using an access token with the `manage_billing:copilot` scope to
 * use this endpoint.
 */
class CopilotGetCopilotSeatDetailsForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/members/{$this->username}/copilot";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $org,
		protected string $username,
	) {
	}
}
