<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-secret-for-authenticated-user
 *
 * Gets a development environment secret available to a user's codespaces without revealing its
 * encrypted value.
 *
 * You must authenticate using an access token with the `codespace` or
 * `codespace:secrets` scope to use this endpoint. User must have Codespaces access to use this
 * endpoint.
 *
 * GitHub Apps must have read access to the `codespaces_user_secrets` user permission to use
 * this endpoint.
 */
class CodespacesGetSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected string $secretName,
    ) {
    }
}
