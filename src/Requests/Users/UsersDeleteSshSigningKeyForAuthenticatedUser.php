<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-ssh-signing-key-for-authenticated-user
 *
 * Deletes an SSH signing key from the authenticated user's GitHub account. You must authenticate with
 * Basic Authentication, or you must authenticate with OAuth with at least `admin:ssh_signing_key`
 * scope. For more information, see "[Understanding scopes for OAuth
 * apps](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/)."
 */
class UsersDeleteSshSigningKeyForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/ssh_signing_keys/{$this->sshSigningKeyId}";
	}


	/**
	 * @param int $sshSigningKeyId The unique identifier of the SSH signing key.
	 */
	public function __construct(
		protected int $sshSigningKeyId,
	) {
	}
}
