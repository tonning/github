<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/add-email-for-authenticated-user
 *
 * This endpoint is accessible with the `user` scope.
 */
class UsersAddEmailForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/emails";
	}


	public function __construct()
	{
	}
}
