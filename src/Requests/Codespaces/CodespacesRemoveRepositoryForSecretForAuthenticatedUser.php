<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/remove-repository-for-secret-for-authenticated-user
 *
 * Removes a repository from the selected repositories for a user's development environment secret.
 * You
 * must authenticate using an access token with the `codespace` or `codespace:secrets` scope to use
 * this endpoint. User must have Codespaces access to use this endpoint.
 * GitHub Apps must have write
 * access to the `codespaces_user_secrets` user permission to use this endpoint.
 */
class CodespacesRemoveRepositoryForSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/secrets/{$this->secretName}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected string $secretName,
        protected int $repositoryId,
    ) {
    }
}
