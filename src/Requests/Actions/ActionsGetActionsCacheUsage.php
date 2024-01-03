<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-usage
 *
 * Gets GitHub Actions cache usage for a repository.
 * The data fetched using this API is refreshed
 * approximately every 5 minutes, so values returned from this endpoint may take at least 5 minutes to
 * get updated.
 * Anyone with read access to the repository can use this endpoint. If the repository is
 * private, you must use an access token with the `repo` scope. GitHub Apps must have the
 * `actions:read` permission to use this endpoint.
 */
class ActionsGetActionsCacheUsage extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/cache/usage";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
	) {
	}
}
