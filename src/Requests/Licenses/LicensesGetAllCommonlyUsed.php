<?php

namespace Tonning\Github\Requests\Licenses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * licenses/get-all-commonly-used
 *
 * Lists the most commonly used licenses on GitHub. For more information, see "[Licensing a repository
 * ](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/licensing-a-repository)."
 */
class LicensesGetAllCommonlyUsed extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/licenses';
    }

    /**
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected ?bool $featured = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['featured' => $this->featured, 'page' => $this->page]);
    }
}
