<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/add-security-manager-team
 *
 * Adds a team as a security manager for an organization. For more information, see "[Managing security
 * for an
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)
 * for an organization."
 *
 * To use this endpoint, you must be an administrator for the organization, and
 * you must use an access token with the `write:org` scope.
 *
 * GitHub Apps must have the `administration`
 * organization read-write permission to use this endpoint.
 */
class OrgsAddSecurityManagerTeam extends Request
{
    protected Method $method = Method::PUT;

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
