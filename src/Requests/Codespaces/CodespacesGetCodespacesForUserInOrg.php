<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-codespaces-for-user-in-org
 *
 * Lists the codespaces that a member of an organization has for repositories in that
 * organization.
 *
 * You must authenticate using an access token with the `admin:org` scope or the
 * `Organization codespaces` read permission to use this endpoint.
 */
class CodespacesGetCodespacesForUserInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/members/{$this->username}/codespaces";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $username,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
