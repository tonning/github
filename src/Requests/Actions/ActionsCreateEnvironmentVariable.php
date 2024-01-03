<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-environment-variable
 *
 * Create an environment variable that you can reference in a GitHub Actions workflow.
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must have
 * the `environment:write` repository permission to use this endpoint.
 * Authenticated users must have
 * collaborator access to a repository to create, update, or read variables.
 */
class ActionsCreateEnvironmentVariable extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/variables";
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function __construct(
		protected int $repositoryId,
		protected string $environmentName,
	) {
	}
}
