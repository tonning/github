<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-environment-public-key
 *
 * Get the public key for an environment, which you need to encrypt environment
 * secrets. You need to
 * encrypt a secret before you can create or update secrets.
 *
 * Anyone with read access to the repository
 * can use this endpoint.
 * If the repository is private you must use an access token with the `repo`
 * scope.
 * GitHub Apps must have the `secrets` repository permission to use this endpoint.
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read secrets.
 */
class ActionsGetEnvironmentPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/secrets/public-key";
    }

    /**
     * @param  int  $repositoryId The unique identifier of the repository.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected int $repositoryId,
        protected string $environmentName,
    ) {
    }
}
