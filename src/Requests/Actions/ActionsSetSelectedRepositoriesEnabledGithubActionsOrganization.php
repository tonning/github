<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-selected-repositories-enabled-github-actions-organization
 *
 * Replaces the list of selected repositories that are enabled for GitHub Actions in an organization.
 * To use this endpoint, the organization permission policy for `enabled_repositories` must be
 * configured to `selected`. For more information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 * You must authenticate using an
 * access token with the `admin:org` scope to use this endpoint. GitHub Apps must have the
 * `administration` organization permission to use this API.
 */
class ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/permissions/repositories";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
