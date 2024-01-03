<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-webhook-delivery
 *
 * Returns a delivery for the webhook configured for a GitHub App.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsGetWebhookDelivery extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/app/hook/deliveries/{$this->deliveryId}";
	}


	/**
	 * @param int $deliveryId
	 */
	public function __construct(
		protected int $deliveryId,
	) {
	}
}
