<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/create-installation-access-token
 *
 * Creates an installation access token that enables a GitHub App to make authenticated API requests
 * for the app's installation on an organization or individual account. Installation tokens expire one
 * hour from the time you create them. Using an expired token produces a status code of `401 -
 * Unauthorized`, and requires creating a new installation token. By default the installation token has
 * access to all repositories that the installation can access. To restrict the access to specific
 * repositories, you can provide the `repository_ids` when creating the token. When you omit
 * `repository_ids`, the response does not contain the `repositories` key.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsCreateInstallationAccessToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/app/installations/{$this->installationId}/access_tokens";
	}


	/**
	 * @param int $installationId The unique identifier of the installation.
	 */
	public function __construct(
		protected int $installationId,
	) {
	}
}
