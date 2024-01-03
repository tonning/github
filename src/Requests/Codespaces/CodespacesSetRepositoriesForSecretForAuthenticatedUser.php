<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/set-repositories-for-secret-for-authenticated-user
 *
 * Select the repositories that will use a user's development environment secret.
 *
 * You must
 * authenticate using an access token with the `codespace` or `codespace:secrets` scope to use this
 * endpoint. User must have Codespaces access to use this endpoint.
 *
 * GitHub Apps must have write access
 * to the `codespaces_user_secrets` user permission and write access to the `codespaces_secrets`
 * repository permission on all referenced repositories to use this endpoint.
 */
class CodespacesSetRepositoriesForSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/secrets/{$this->secretName}/repositories";
    }

    /**
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected string $secretName,
    ) {
    }
}
