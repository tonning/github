<?php

namespace Tonning\Github\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-ssh-signing-key-for-authenticated-user
 *
 * Gets extended details for an SSH signing key. You must authenticate with Basic Authentication, or
 * you must authenticate with OAuth with at least `read:ssh_signing_key` scope. For more information,
 * see "[Understanding scopes for OAuth
 * apps](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/)."
 */
class UsersGetSshSigningKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/ssh_signing_keys/{$this->sshSigningKeyId}";
    }

    /**
     * @param  int  $sshSigningKeyId The unique identifier of the SSH signing key.
     */
    public function __construct(
        protected int $sshSigningKeyId,
    ) {
    }
}
