<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/add-repository-for-secret-for-authenticated-user
 *
 * Adds a repository to the selected repositories for a user's development environment secret.
 * You must
 * authenticate using an access token with the `codespace` or `codespace:secrets` scope to use this
 * endpoint. User must have Codespaces access to use this endpoint.
 * GitHub Apps must have write access
 * to the `codespaces_user_secrets` user permission and write access to the `codespaces_secrets`
 * repository permission on the referenced repository to use this endpoint.
 */
class CodespacesAddRepositoryForSecretForAuthenticatedUser extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/secrets/{$this->secretName}/repositories/{$this->repositoryId}";
	}


	/**
	 * @param string $secretName The name of the secret.
	 * @param int $repositoryId
	 */
	public function __construct(
		protected string $secretName,
		protected int $repositoryId,
	) {
	}
}
