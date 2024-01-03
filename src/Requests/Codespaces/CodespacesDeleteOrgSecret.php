<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-org-secret
 *
 * Deletes an organization development environment secret using the secret name. You must authenticate
 * using an access token with the `admin:org` scope to use this endpoint.
 */
class CodespacesDeleteOrgSecret extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/codespaces/secrets/{$this->secretName}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected string $org,
		protected string $secretName,
	) {
	}
}
