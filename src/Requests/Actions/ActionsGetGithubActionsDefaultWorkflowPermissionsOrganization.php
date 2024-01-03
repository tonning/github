<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-github-actions-default-workflow-permissions-organization
 *
 * Gets the default workflow permissions granted to the `GITHUB_TOKEN` when running workflows in an
 * organization,
 * as well as whether GitHub Actions can submit approving pull request reviews. For more
 * information, see
 * "[Setting the permissions of the GITHUB_TOKEN for your
 * organization](https://docs.github.com/organizations/managing-organization-settings/disabling-or-limiting-github-actions-for-your-organization#setting-the-permissions-of-the-github_token-for-your-organization)."
 *
 * You
 * must authenticate using an access token with the `admin:org` scope to use this endpoint. GitHub Apps
 * must have the `administration` organization permission to use this API.
 */
class ActionsGetGithubActionsDefaultWorkflowPermissionsOrganization extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/permissions/workflow";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
