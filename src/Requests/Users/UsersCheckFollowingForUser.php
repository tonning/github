<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/check-following-for-user
 */
class UsersCheckFollowingForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/following/{$this->targetUser}";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param string $targetUser
	 */
	public function __construct(
		protected string $username,
		protected string $targetUser,
	) {
	}
}
