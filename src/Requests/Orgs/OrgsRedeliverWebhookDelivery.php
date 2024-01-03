<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/redeliver-webhook-delivery
 *
 * Redeliver a delivery for a webhook configured in an organization.
 */
class OrgsRedeliverWebhookDelivery extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/hooks/{$this->hookId}/deliveries/{$this->deliveryId}/attempts";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
	 * @param int $deliveryId
	 */
	public function __construct(
		protected string $org,
		protected int $hookId,
		protected int $deliveryId,
	) {
	}
}
