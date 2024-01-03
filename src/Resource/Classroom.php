<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Classroom\ClassroomGetAClassroom;
use Tonning\Github\Requests\Classroom\ClassroomGetAnAssignment;
use Tonning\Github\Requests\Classroom\ClassroomGetAssignmentGrades;
use Tonning\Github\Requests\Classroom\ClassroomListAcceptedAssigmentsForAnAssignment;
use Tonning\Github\Requests\Classroom\ClassroomListAssignmentsForAClassroom;
use Tonning\Github\Requests\Classroom\ClassroomListClassrooms;
use Tonning\Github\Resource;

class Classroom extends Resource
{
	/**
	 * @param int $assignmentId The unique identifier of the classroom assignment.
	 */
	public function classroomGetAnAssignment(int $assignmentId): Response
	{
		return $this->connector->send(new ClassroomGetAnAssignment($assignmentId));
	}


	/**
	 * @param int $assignmentId The unique identifier of the classroom assignment.
	 * @param int $page Page number of the results to fetch.
	 */
	public function classroomListAcceptedAssigmentsForAnAssignment(int $assignmentId, ?int $page): Response
	{
		return $this->connector->send(new ClassroomListAcceptedAssigmentsForAnAssignment($assignmentId, $page));
	}


	/**
	 * @param int $assignmentId The unique identifier of the classroom assignment.
	 */
	public function classroomGetAssignmentGrades(int $assignmentId): Response
	{
		return $this->connector->send(new ClassroomGetAssignmentGrades($assignmentId));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function classroomListClassrooms(?int $page): Response
	{
		return $this->connector->send(new ClassroomListClassrooms($page));
	}


	/**
	 * @param int $classroomId The unique identifier of the classroom.
	 */
	public function classroomGetAclassroom(int $classroomId): Response
	{
		return $this->connector->send(new ClassroomGetAClassroom($classroomId));
	}


	/**
	 * @param int $classroomId The unique identifier of the classroom.
	 * @param int $page Page number of the results to fetch.
	 */
	public function classroomListAssignmentsForAclassroom(int $classroomId, ?int $page): Response
	{
		return $this->connector->send(new ClassroomListAssignmentsForAClassroom($classroomId, $page));
	}
}
