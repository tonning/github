<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-selected-repositories-enabled-github-actions-organization
 *
 * Lists the selected repositories that are enabled for GitHub Actions in an organization. To use this
 * endpoint, the organization permission policy for `enabled_repositories` must be configured to
 * `selected`. For more information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 * You must authenticate using an
 * access token with the `admin:org` scope to use this endpoint. GitHub Apps must have the
 * `administration` organization permission to use this API.
 */
class ActionsListSelectedRepositoriesEnabledGithubActionsOrganization extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/permissions/repositories";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
