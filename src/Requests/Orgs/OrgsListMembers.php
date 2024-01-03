<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-members
 *
 * List all users who are members of an organization. If the authenticated user is also a member of
 * this organization then both concealed and public members will be returned.
 */
class OrgsListMembers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/members";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|string  $filter Filter members returned in the list. `2fa_disabled` means that only members without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned. This options is only available for organization owners.
     * @param  null|string  $role Filter members returned by their role.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?string $filter = null,
        protected ?string $role = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filter' => $this->filter, 'role' => $this->role, 'page' => $this->page]);
    }
}
