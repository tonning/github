<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-emails-for-authenticated-user
 *
 * Lists all of your email addresses, and specifies which one is visible to the public. This endpoint
 * is accessible with the `user:email` scope.
 */
class UsersListEmailsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/emails";
	}


	/**
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
