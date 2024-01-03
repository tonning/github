<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/update-column
 */
class ProjectsUpdateColumn extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/projects/columns/{$this->columnId}";
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function __construct(
        protected int $columnId,
    ) {
    }
}
