<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-list
 *
 * Lists the GitHub Actions caches for a repository.
 * You must authenticate using an access token with
 * the `repo` scope to use this endpoint.
 * GitHub Apps must have the `actions:read` permission to use
 * this endpoint.
 */
class ActionsGetActionsCacheList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/caches";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $ref The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  null|string  $key An explicit key or prefix for identifying the cache
     * @param  null|string  $sort The property to sort the results by. `created_at` means when the cache was created. `last_accessed_at` means when the cache was last accessed. `size_in_bytes` is the size of the cache in bytes.
     * @param  null|string  $direction The direction to sort the results by.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
        protected ?string $ref = null,
        protected ?string $key = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'ref' => $this->ref,
            'key' => $this->key,
            'sort' => $this->sort,
            'direction' => $this->direction,
        ]);
    }
}
