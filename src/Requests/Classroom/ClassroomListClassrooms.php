<?php

namespace Tonning\Github\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-classrooms
 *
 * Lists GitHub Classroom classrooms for the current user. Classrooms will only be returned if the
 * current user is an administrator of one or more GitHub Classrooms.
 */
class ClassroomListClassrooms extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/classrooms';
    }

    /**
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
