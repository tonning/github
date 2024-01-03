<?php

namespace Tonning\Github\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-assignments-for-a-classroom
 *
 * Lists GitHub Classroom assignments for a classroom. Assignments will only be returned if the current
 * user is an administrator of the GitHub Classroom.
 */
class ClassroomListAssignmentsForAClassroom extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/classrooms/{$this->classroomId}/assignments";
    }

    /**
     * @param  int  $classroomId The unique identifier of the classroom.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected int $classroomId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
