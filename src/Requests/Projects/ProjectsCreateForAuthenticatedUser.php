<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/create-for-authenticated-user
 *
 * Creates a user project board. Returns a `410 Gone` status if the user does not have existing classic
 * projects. If you do not have sufficient privileges to perform this action, a `401 Unauthorized` or
 * `410 Gone` status is returned.
 */
class ProjectsCreateForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/projects";
	}


	public function __construct()
	{
	}
}
