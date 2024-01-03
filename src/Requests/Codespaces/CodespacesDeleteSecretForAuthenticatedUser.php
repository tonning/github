<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-secret-for-authenticated-user
 *
 * Deletes a development environment secret from a user's codespaces using the secret name. Deleting
 * the secret will remove access from all codespaces that were allowed to access the secret.
 *
 * You must
 * authenticate using an access token with the `codespace` or `codespace:secrets` scope to use this
 * endpoint. User must have Codespaces access to use this endpoint.
 *
 * GitHub Apps must have write access
 * to the `codespaces_user_secrets` user permission to use this endpoint.
 */
class CodespacesDeleteSecretForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/secrets/{$this->secretName}";
	}


	/**
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected string $secretName,
	) {
	}
}
