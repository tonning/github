<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-repositories-for-secret-for-authenticated-user
 *
 * List the repositories that have been granted the ability to use a user's development environment
 * secret.
 *
 * You must authenticate using an access token with the `codespace` or `codespace:secrets`
 * scope to use this endpoint. User must have Codespaces access to use this endpoint.
 *
 * GitHub Apps must
 * have read access to the `codespaces_user_secrets` user permission and write access to the
 * `codespaces_secrets` repository permission on all referenced repositories to use this endpoint.
 */
class CodespacesListRepositoriesForSecretForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/secrets/{$this->secretName}/repositories";
	}


	/**
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected string $secretName,
	) {
	}
}
