<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-webhook-delivery
 *
 * Returns a delivery for a webhook configured in a repository.
 */
class ReposGetWebhookDelivery extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}/deliveries/{$this->deliveryId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
	 * @param int $deliveryId
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $hookId,
		protected int $deliveryId,
	) {
	}
}
