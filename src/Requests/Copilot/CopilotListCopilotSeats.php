<?php

namespace Tonning\Github\Requests\Copilot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/list-copilot-seats
 *
 * **Note**: This endpoint is in beta and is subject to change.
 *
 * Lists all Copilot Business seat
 * assignments for an organization that are currently being billed (either active or pending
 * cancellation at the start of the next billing cycle).
 *
 * Only organization owners can configure and
 * view details about the organization's Copilot Business subscription. You must
 * authenticate using an
 * access token with the `manage_billing:copilot` scope to use this endpoint.
 */
class CopilotListCopilotSeats extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/copilot/billing/seats";
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
