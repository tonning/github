<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-for-authenticated-user
 *
 * Creates a new repository for the authenticated user.
 *
 * **OAuth scope requirements**
 *
 * When using
 * [OAuth](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/),
 * authorizations must include:
 *
 * *   `public_repo` scope or `repo` scope to create a public
 * repository
 * *   `repo` scope to create a private repository
 */
class ReposCreateForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/repos";
	}


	public function __construct()
	{
	}
}
