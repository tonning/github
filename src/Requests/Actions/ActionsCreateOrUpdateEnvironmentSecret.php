<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/create-or-update-environment-secret
 *
 * Creates or updates an environment secret with an encrypted value. Encrypt your secret
 * using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must have
 * the `secrets` repository permission to use this endpoint.
 * Authenticated users must have collaborator
 * access to a repository to create, update, or read secrets.
 */
class ActionsCreateOrUpdateEnvironmentSecret extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/secrets/{$this->secretName}";
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected int $repositoryId,
		protected string $environmentName,
		protected string $secretName,
	) {
	}
}
