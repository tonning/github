<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-public-emails-for-authenticated-user
 *
 * Lists your publicly visible email address, which you can set with the [Set primary email visibility
 * for the authenticated
 * user](https://docs.github.com/rest/users/emails#set-primary-email-visibility-for-the-authenticated-user)
 * endpoint. This endpoint is accessible with the `user:email` scope.
 */
class UsersListPublicEmailsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/public_emails";
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
