<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-allowed-actions-organization
 *
 * Sets the actions and reusable workflows that are allowed in an organization. To use this endpoint,
 * the organization permission policy for `allowed_actions` must be configured to `selected`. For more
 * information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 * You must authenticate using an
 * access token with the `admin:org` scope to use this endpoint. GitHub Apps must have the
 * `administration` organization permission to use this API.
 */
class ActionsSetAllowedActionsOrganization extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/permissions/selected-actions";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
