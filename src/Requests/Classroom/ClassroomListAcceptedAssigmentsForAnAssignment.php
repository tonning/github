<?php

namespace Tonning\Github\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-accepted-assigments-for-an-assignment
 *
 * Lists any assignment repositories that have been created by students accepting a GitHub Classroom
 * assignment. Accepted assignments will only be returned if the current user is an administrator of
 * the GitHub Classroom for the assignment.
 */
class ClassroomListAcceptedAssigmentsForAnAssignment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/assignments/{$this->assignmentId}/accepted_assignments";
    }

    /**
     * @param  int  $assignmentId The unique identifier of the classroom assignment.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected int $assignmentId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
