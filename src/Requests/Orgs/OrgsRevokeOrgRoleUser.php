<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/revoke-org-role-user
 *
 * Remove an organization role from a user.
 *
 * To use this endpoint, you must be an administrator for the
 * organization, and you must use an access token with the `admin:org` scope.
 * GitHub Apps must have the
 * `members:write` organization permission to use this endpoint.
 *
 * For more information on organization
 * roles, see "[Managing people's access to your organization with
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/about-custom-organization-roles)."
 */
class OrgsRevokeOrgRoleUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/organization-roles/users/{$this->username}/{$this->roleId}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function __construct(
        protected string $org,
        protected string $username,
        protected int $roleId,
    ) {
    }
}
