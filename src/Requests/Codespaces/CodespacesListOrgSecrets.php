<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-org-secrets
 *
 * Lists all Codespaces development environment secrets available at the organization-level without
 * revealing their encrypted values.
 * You must authenticate using an access token with the `admin:org`
 * scope to use this endpoint.
 */
class CodespacesListOrgSecrets extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/secrets";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
