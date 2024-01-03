<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/create-or-update-secret-for-authenticated-user
 *
 * Creates or updates a development environment secret for a user's codespace with an encrypted value.
 * Encrypt your secret
 * using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * You must
 * authenticate using an access token with the `codespace` or `codespace:secrets` scope to use this
 * endpoint. User must also have Codespaces access to use this endpoint.
 *
 * GitHub Apps must have write
 * access to the `codespaces_user_secrets` user permission and `codespaces_secrets` repository
 * permission on all referenced repositories to use this endpoint.
 */
class CodespacesCreateOrUpdateSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

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
