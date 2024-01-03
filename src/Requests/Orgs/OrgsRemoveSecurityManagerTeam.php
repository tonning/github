<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/remove-security-manager-team
 *
 * Removes the security manager role from a team for an organization. For more information, see
 * "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)
 * team from an organization."
 *
 * To use this endpoint, you must be an administrator for the
 * organization, and you must use an access token with the `admin:org` scope.
 *
 * GitHub Apps must have
 * the `administration` organization read-write permission to use this endpoint.
 */
class OrgsRemoveSecurityManagerTeam extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/security-managers/teams/{$this->teamSlug}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
    ) {
    }
}
