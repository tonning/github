<?php

namespace Tonning\Github\Requests\Dependabot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/add-selected-repo-to-org-secret
 *
 * Adds a repository to an organization secret when the `visibility` for repository access is set to
 * `selected`. The visibility is set when you [Create or update an organization
 * secret](https://docs.github.com/rest/dependabot/secrets#create-or-update-an-organization-secret).
 * You must authenticate using an access token with the `admin:org` scope to use this endpoint. GitHub
 * Apps must have the `dependabot_secrets` organization permission to use this endpoint.
 */
class DependabotAddSelectedRepoToOrgSecret extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/dependabot/secrets/{$this->secretName}/repositories/{$this->repositoryId}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 * @param int $repositoryId
	 */
	public function __construct(
		protected string $org,
		protected string $secretName,
		protected int $repositoryId,
	) {
	}
}
