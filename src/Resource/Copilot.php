<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Copilot\CopilotAddCopilotForBusinessSeatsForTeams;
use Tonning\Github\Requests\Copilot\CopilotAddCopilotForBusinessSeatsForUsers;
use Tonning\Github\Requests\Copilot\CopilotCancelCopilotSeatAssignmentForTeams;
use Tonning\Github\Requests\Copilot\CopilotCancelCopilotSeatAssignmentForUsers;
use Tonning\Github\Requests\Copilot\CopilotGetCopilotOrganizationDetails;
use Tonning\Github\Requests\Copilot\CopilotGetCopilotSeatDetailsForUser;
use Tonning\Github\Requests\Copilot\CopilotListCopilotSeats;
use Tonning\Github\Resource;

class Copilot extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function copilotGetCopilotOrganizationDetails(string $org): Response
	{
		return $this->connector->send(new CopilotGetCopilotOrganizationDetails($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function copilotListCopilotSeats(string $org, ?int $page): Response
	{
		return $this->connector->send(new CopilotListCopilotSeats($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function copilotAddCopilotForBusinessSeatsForTeams(string $org): Response
	{
		return $this->connector->send(new CopilotAddCopilotForBusinessSeatsForTeams($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function copilotCancelCopilotSeatAssignmentForTeams(string $org): Response
	{
		return $this->connector->send(new CopilotCancelCopilotSeatAssignmentForTeams($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function copilotAddCopilotForBusinessSeatsForUsers(string $org): Response
	{
		return $this->connector->send(new CopilotAddCopilotForBusinessSeatsForUsers($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function copilotCancelCopilotSeatAssignmentForUsers(string $org): Response
	{
		return $this->connector->send(new CopilotCancelCopilotSeatAssignmentForUsers($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function copilotGetCopilotSeatDetailsForUser(string $org, string $username): Response
	{
		return $this->connector->send(new CopilotGetCopilotSeatDetailsForUser($org, $username));
	}
}
