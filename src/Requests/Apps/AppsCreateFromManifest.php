<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/create-from-manifest
 *
 * Use this endpoint to complete the handshake necessary when implementing the [GitHub App Manifest
 * flow](https://docs.github.com/apps/building-github-apps/creating-github-apps-from-a-manifest/). When
 * you create a GitHub App with the manifest flow, you receive a temporary `code` used to retrieve the
 * GitHub App's `id`, `pem` (private key), and `webhook_secret`.
 */
class AppsCreateFromManifest extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/app-manifests/{$this->code}/conversions";
	}


	/**
	 * @param string $code
	 */
	public function __construct(
		protected string $code,
	) {
	}
}
