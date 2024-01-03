<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-by-slug
 *
 * **Note**: The `:app_slug` is just the URL-friendly name of your GitHub App. You can find this on the
 * settings page for your GitHub App (e.g., `https://github.com/settings/apps/:app_slug`).
 *
 * If the
 * GitHub App you specify is public, you can access this endpoint without authenticating. If the GitHub
 * App you specify is private, you must authenticate with a [personal access
 * token](https://docs.github.com/articles/creating-a-personal-access-token-for-the-command-line/) or
 * an [installation access
 * token](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-an-installation)
 * to access this endpoint.
 */
class AppsGetBySlug extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/apps/{$this->appSlug}";
	}


	/**
	 * @param string $appSlug
	 */
	public function __construct(
		protected string $appSlug,
	) {
	}
}
