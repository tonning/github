<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-environment-variable
 *
 * Gets a specific variable in an environment.
 *
 * You must authenticate using an access token with the
 * `repo` scope to use this endpoint.
 * GitHub Apps must have the `environments:read` repository
 * permission to use this endpoint.
 * Authenticated users must have collaborator access to a repository
 * to create, update, or read variables.
 */
class ActionsGetEnvironmentVariable extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/variables/{$this->name}";
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $name The name of the variable.
	 */
	public function __construct(
		protected int $repositoryId,
		protected string $environmentName,
		protected string $name,
	) {
	}
}
