<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-autolinks
 *
 * This returns a list of autolinks configured for the given repository.
 *
 * Information about autolinks
 * are only available to repository administrators.
 */
class ReposListAutolinks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/autolinks";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
