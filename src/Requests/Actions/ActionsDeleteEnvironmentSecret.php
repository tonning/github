<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-environment-secret
 *
 * Deletes a secret in an environment using the secret name.
 *
 * You must authenticate using an access
 * token with the `repo` scope to use this endpoint.
 * GitHub Apps must have the `secrets` repository
 * permission to use this endpoint.
 * Authenticated users must have collaborator access to a repository
 * to create, update, or read secrets.
 */
class ActionsDeleteEnvironmentSecret extends Request
{
	protected Method $method = Method::DELETE;


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
