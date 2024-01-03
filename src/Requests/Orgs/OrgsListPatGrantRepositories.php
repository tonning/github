<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-pat-grant-repositories
 *
 * Lists the repositories a fine-grained personal access token has access to. Only GitHub Apps can call
 * this API,
 * using the `organization_personal_access_tokens: read` permission.
 *
 * **Note**: Fine-grained
 * PATs are in public beta. Related APIs, events, and functionality are subject to change.
 */
class OrgsListPatGrantRepositories extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/personal-access-tokens/{$this->patId}/repositories";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patId Unique identifier of the fine-grained personal access token.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected int $patId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
