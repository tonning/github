<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-pat-grants
 *
 * Lists approved fine-grained personal access tokens owned by organization members that can access
 * organization resources. Only GitHub Apps can call this API,
 * using the
 * `organization_personal_access_tokens: read` permission.
 *
 * **Note**: Fine-grained PATs are in public
 * beta. Related APIs, events, and functionality are subject to change.
 */
class OrgsListPatGrants extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/personal-access-tokens";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $sort The property by which to sort the results.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|array  $owner A list of owner usernames to use to filter the results.
     * @param  null|string  $repository The name of the repository to use to filter the results.
     * @param  null|string  $permission The permission to use to filter the results.
     * @param  null|string  $lastUsedBefore Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $lastUsedAfter Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?array $owner = null,
        protected ?string $repository = null,
        protected ?string $permission = null,
        protected ?string $lastUsedBefore = null,
        protected ?string $lastUsedAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'owner' => $this->owner,
            'repository' => $this->repository,
            'permission' => $this->permission,
            'last_used_before' => $this->lastUsedBefore,
            'last_used_after' => $this->lastUsedAfter,
        ]);
    }
}
