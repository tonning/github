<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/move-column
 */
class ProjectsMoveColumn extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/projects/columns/{$this->columnId}/moves";
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function __construct(
        protected int $columnId,
    ) {
    }
}
