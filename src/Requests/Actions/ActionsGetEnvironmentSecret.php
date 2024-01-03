<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-environment-secret
 *
 * Gets a single environment secret without revealing its encrypted value.
 *
 * You must authenticate using
 * an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must have the `secrets`
 * repository permission to use this endpoint.
 * Authenticated users must have collaborator access to a
 * repository to create, update, or read secrets.
 */
class ActionsGetEnvironmentSecret extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/secrets/{$this->secretName}";
    }

    /**
     * @param  int  $repositoryId The unique identifier of the repository.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected int $repositoryId,
        protected string $environmentName,
        protected string $secretName,
    ) {
    }
}
