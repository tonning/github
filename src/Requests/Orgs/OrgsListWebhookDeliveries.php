<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-webhook-deliveries
 *
 * Returns a list of webhook deliveries for a webhook configured in an organization.
 */
class OrgsListWebhookDeliveries extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/hooks/{$this->hookId}/deliveries";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
	 * @param null|string $cursor Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
	 * @param null|bool $redelivery
	 */
	public function __construct(
		protected string $org,
		protected int $hookId,
		protected ?string $cursor = null,
		protected ?bool $redelivery = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['cursor' => $this->cursor, 'redelivery' => $this->redelivery]);
	}
}
