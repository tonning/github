<?php

namespace Tonning\Github\Requests\Interactions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/get-restrictions-for-authenticated-user
 *
 * Shows which type of GitHub user can interact with your public repositories and when the restriction
 * expires.
 */
class InteractionsGetRestrictionsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/interaction-limits";
	}


	public function __construct()
	{
	}
}
