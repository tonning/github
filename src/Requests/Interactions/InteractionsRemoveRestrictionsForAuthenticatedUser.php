<?php

namespace Tonning\Github\Requests\Interactions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/remove-restrictions-for-authenticated-user
 *
 * Removes any interaction restrictions from your public repositories.
 */
class InteractionsRemoveRestrictionsForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/interaction-limits";
	}


	public function __construct()
	{
	}
}
