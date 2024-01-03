<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-registration-token-for-org
 *
 * Returns a token that you can pass to the `config` script. The token expires after one hour.
 *
 * You
 * must authenticate using an access token with the `admin:org` scope to use this endpoint.
 * If the
 * repository is private, you must use an access token with the `repo` scope.
 * GitHub Apps must have the
 * `administration` permission for repositories and the `organization_self_hosted_runners` permission
 * for organizations.
 * Authenticated users must have admin access to repositories or organizations, or
 * the `manage_runners:enterprise` scope for enterprises, to use these endpoints.
 *
 * Example using
 * registration token:
 *
 * Configure your self-hosted runner, replacing `TOKEN` with the registration
 * token provided by this endpoint.
 *
 * ```
 * ./config.sh --url https://github.com/octo-org --token
 * TOKEN
 * ```
 */
class ActionsCreateRegistrationTokenForOrg extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/runners/registration-token";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
