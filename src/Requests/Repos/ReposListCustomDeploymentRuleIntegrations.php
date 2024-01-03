<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-custom-deployment-rule-integrations
 *
 * Gets all custom deployment protection rule integrations that are available for an environment.
 * Anyone with read access to the repository can use this endpoint. If the repository is private and
 * you want to use a personal access token (classic), you must use an access token with the `repo`
 * scope. GitHub Apps and fine-grained personal access tokens must have the `actions:read` permission
 * to use this endpoint.
 *
 * For more information about environments, see "[Using environments for
 * deployment](https://docs.github.com/en/actions/deployment/targeting-different-environments/using-environments-for-deployment)."
 *
 * For
 * more information about the app that is providing this custom deployment rule, see "[GET an
 * app](https://docs.github.com/rest/apps/apps#get-an-app)".
 */
class ReposListCustomDeploymentRuleIntegrations extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules/apps";
	}


	/**
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $environmentName,
		protected string $repo,
		protected string $owner,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
