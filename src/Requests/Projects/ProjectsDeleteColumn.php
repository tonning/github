<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/delete-column
 *
 * Deletes a project column.
 */
class ProjectsDeleteColumn extends Request
{
    protected Method $method = Method::DELETE;

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
