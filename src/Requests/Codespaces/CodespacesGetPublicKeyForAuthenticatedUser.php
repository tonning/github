<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-public-key-for-authenticated-user
 *
 * Gets your public key, which you need to encrypt secrets. You need to encrypt a secret before you can
 * create or update secrets.
 *
 * You must authenticate using an access token with the `codespace` or
 * `codespace:secrets` scope to use this endpoint. User must have Codespaces access to use this
 * endpoint.
 *
 * GitHub Apps must have read access to the `codespaces_user_secrets` user permission to use
 * this endpoint.
 */
class CodespacesGetPublicKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/codespaces/secrets/public-key';
    }

    public function __construct()
    {
    }
}
