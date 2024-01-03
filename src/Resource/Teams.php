<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Teams\TeamsAddMemberLegacy;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateMembershipForUserInOrg;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateMembershipForUserLegacy;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateProjectPermissionsInOrg;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateProjectPermissionsLegacy;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateRepoPermissionsInOrg;
use Tonning\Github\Requests\Teams\TeamsAddOrUpdateRepoPermissionsLegacy;
use Tonning\Github\Requests\Teams\TeamsCheckPermissionsForProjectInOrg;
use Tonning\Github\Requests\Teams\TeamsCheckPermissionsForProjectLegacy;
use Tonning\Github\Requests\Teams\TeamsCheckPermissionsForRepoInOrg;
use Tonning\Github\Requests\Teams\TeamsCheckPermissionsForRepoLegacy;
use Tonning\Github\Requests\Teams\TeamsCreate;
use Tonning\Github\Requests\Teams\TeamsCreateDiscussionCommentInOrg;
use Tonning\Github\Requests\Teams\TeamsCreateDiscussionCommentLegacy;
use Tonning\Github\Requests\Teams\TeamsCreateDiscussionInOrg;
use Tonning\Github\Requests\Teams\TeamsCreateDiscussionLegacy;
use Tonning\Github\Requests\Teams\TeamsDeleteDiscussionCommentInOrg;
use Tonning\Github\Requests\Teams\TeamsDeleteDiscussionCommentLegacy;
use Tonning\Github\Requests\Teams\TeamsDeleteDiscussionInOrg;
use Tonning\Github\Requests\Teams\TeamsDeleteDiscussionLegacy;
use Tonning\Github\Requests\Teams\TeamsDeleteInOrg;
use Tonning\Github\Requests\Teams\TeamsDeleteLegacy;
use Tonning\Github\Requests\Teams\TeamsGetByName;
use Tonning\Github\Requests\Teams\TeamsGetDiscussionCommentInOrg;
use Tonning\Github\Requests\Teams\TeamsGetDiscussionCommentLegacy;
use Tonning\Github\Requests\Teams\TeamsGetDiscussionInOrg;
use Tonning\Github\Requests\Teams\TeamsGetDiscussionLegacy;
use Tonning\Github\Requests\Teams\TeamsGetLegacy;
use Tonning\Github\Requests\Teams\TeamsGetMemberLegacy;
use Tonning\Github\Requests\Teams\TeamsGetMembershipForUserInOrg;
use Tonning\Github\Requests\Teams\TeamsGetMembershipForUserLegacy;
use Tonning\Github\Requests\Teams\TeamsList;
use Tonning\Github\Requests\Teams\TeamsListChildInOrg;
use Tonning\Github\Requests\Teams\TeamsListChildLegacy;
use Tonning\Github\Requests\Teams\TeamsListDiscussionCommentsInOrg;
use Tonning\Github\Requests\Teams\TeamsListDiscussionCommentsLegacy;
use Tonning\Github\Requests\Teams\TeamsListDiscussionsInOrg;
use Tonning\Github\Requests\Teams\TeamsListDiscussionsLegacy;
use Tonning\Github\Requests\Teams\TeamsListForAuthenticatedUser;
use Tonning\Github\Requests\Teams\TeamsListMembersInOrg;
use Tonning\Github\Requests\Teams\TeamsListMembersLegacy;
use Tonning\Github\Requests\Teams\TeamsListPendingInvitationsInOrg;
use Tonning\Github\Requests\Teams\TeamsListPendingInvitationsLegacy;
use Tonning\Github\Requests\Teams\TeamsListProjectsInOrg;
use Tonning\Github\Requests\Teams\TeamsListProjectsLegacy;
use Tonning\Github\Requests\Teams\TeamsListReposInOrg;
use Tonning\Github\Requests\Teams\TeamsListReposLegacy;
use Tonning\Github\Requests\Teams\TeamsRemoveMemberLegacy;
use Tonning\Github\Requests\Teams\TeamsRemoveMembershipForUserInOrg;
use Tonning\Github\Requests\Teams\TeamsRemoveMembershipForUserLegacy;
use Tonning\Github\Requests\Teams\TeamsRemoveProjectInOrg;
use Tonning\Github\Requests\Teams\TeamsRemoveProjectLegacy;
use Tonning\Github\Requests\Teams\TeamsRemoveRepoInOrg;
use Tonning\Github\Requests\Teams\TeamsRemoveRepoLegacy;
use Tonning\Github\Requests\Teams\TeamsUpdateDiscussionCommentInOrg;
use Tonning\Github\Requests\Teams\TeamsUpdateDiscussionCommentLegacy;
use Tonning\Github\Requests\Teams\TeamsUpdateDiscussionInOrg;
use Tonning\Github\Requests\Teams\TeamsUpdateDiscussionLegacy;
use Tonning\Github\Requests\Teams\TeamsUpdateInOrg;
use Tonning\Github\Requests\Teams\TeamsUpdateLegacy;
use Tonning\Github\Resource;

class Teams extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsList(string $org, ?int $page): Response
	{
		return $this->connector->send(new TeamsList($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function teamsCreate(string $org): Response
	{
		return $this->connector->send(new TeamsCreate($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 */
	public function teamsGetByName(string $org, string $teamSlug): Response
	{
		return $this->connector->send(new TeamsGetByName($org, $teamSlug));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 */
	public function teamsDeleteInOrg(string $org, string $teamSlug): Response
	{
		return $this->connector->send(new TeamsDeleteInOrg($org, $teamSlug));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 */
	public function teamsUpdateInOrg(string $org, string $teamSlug): Response
	{
		return $this->connector->send(new TeamsUpdateInOrg($org, $teamSlug));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $direction The direction to sort the results by.
	 * @param int $page Page number of the results to fetch.
	 * @param string $pinned Pinned discussions only filter
	 */
	public function teamsListDiscussionsInOrg(
		string $org,
		string $teamSlug,
		?string $direction,
		?int $page,
		?string $pinned,
	): Response
	{
		return $this->connector->send(new TeamsListDiscussionsInOrg($org, $teamSlug, $direction, $page, $pinned));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 */
	public function teamsCreateDiscussionInOrg(string $org, string $teamSlug): Response
	{
		return $this->connector->send(new TeamsCreateDiscussionInOrg($org, $teamSlug));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsGetDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsGetDiscussionInOrg($org, $teamSlug, $discussionNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsDeleteDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsDeleteDiscussionInOrg($org, $teamSlug, $discussionNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsUpdateDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsUpdateDiscussionInOrg($org, $teamSlug, $discussionNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param string $direction The direction to sort the results by.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListDiscussionCommentsInOrg(
		string $org,
		string $teamSlug,
		int $discussionNumber,
		?string $direction,
		?int $page,
	): Response
	{
		return $this->connector->send(new TeamsListDiscussionCommentsInOrg($org, $teamSlug, $discussionNumber, $direction, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsCreateDiscussionCommentInOrg(string $org, string $teamSlug, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsCreateDiscussionCommentInOrg($org, $teamSlug, $discussionNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsGetDiscussionCommentInOrg(
		string $org,
		string $teamSlug,
		int $discussionNumber,
		int $commentNumber,
	): Response
	{
		return $this->connector->send(new TeamsGetDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsDeleteDiscussionCommentInOrg(
		string $org,
		string $teamSlug,
		int $discussionNumber,
		int $commentNumber,
	): Response
	{
		return $this->connector->send(new TeamsDeleteDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsUpdateDiscussionCommentInOrg(
		string $org,
		string $teamSlug,
		int $discussionNumber,
		int $commentNumber,
	): Response
	{
		return $this->connector->send(new TeamsUpdateDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListPendingInvitationsInOrg(string $org, string $teamSlug, ?int $page): Response
	{
		return $this->connector->send(new TeamsListPendingInvitationsInOrg($org, $teamSlug, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $role Filters members returned by their role in the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListMembersInOrg(string $org, string $teamSlug, ?string $role, ?int $page): Response
	{
		return $this->connector->send(new TeamsListMembersInOrg($org, $teamSlug, $role, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsGetMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response
	{
		return $this->connector->send(new TeamsGetMembershipForUserInOrg($org, $teamSlug, $username));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsAddOrUpdateMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateMembershipForUserInOrg($org, $teamSlug, $username));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsRemoveMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response
	{
		return $this->connector->send(new TeamsRemoveMembershipForUserInOrg($org, $teamSlug, $username));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListProjectsInOrg(string $org, string $teamSlug, ?int $page): Response
	{
		return $this->connector->send(new TeamsListProjectsInOrg($org, $teamSlug, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsCheckPermissionsForProjectInOrg(string $org, string $teamSlug, int $projectId): Response
	{
		return $this->connector->send(new TeamsCheckPermissionsForProjectInOrg($org, $teamSlug, $projectId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsAddOrUpdateProjectPermissionsInOrg(string $org, string $teamSlug, int $projectId): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateProjectPermissionsInOrg($org, $teamSlug, $projectId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsRemoveProjectInOrg(string $org, string $teamSlug, int $projectId): Response
	{
		return $this->connector->send(new TeamsRemoveProjectInOrg($org, $teamSlug, $projectId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListReposInOrg(string $org, string $teamSlug, ?int $page): Response
	{
		return $this->connector->send(new TeamsListReposInOrg($org, $teamSlug, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsCheckPermissionsForRepoInOrg(
		string $org,
		string $teamSlug,
		string $owner,
		string $repo,
	): Response
	{
		return $this->connector->send(new TeamsCheckPermissionsForRepoInOrg($org, $teamSlug, $owner, $repo));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsAddOrUpdateRepoPermissionsInOrg(
		string $org,
		string $teamSlug,
		string $owner,
		string $repo,
	): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateRepoPermissionsInOrg($org, $teamSlug, $owner, $repo));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsRemoveRepoInOrg(string $org, string $teamSlug, string $owner, string $repo): Response
	{
		return $this->connector->send(new TeamsRemoveRepoInOrg($org, $teamSlug, $owner, $repo));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListChildInOrg(string $org, string $teamSlug, ?int $page): Response
	{
		return $this->connector->send(new TeamsListChildInOrg($org, $teamSlug, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 */
	public function teamsGetLegacy(int $teamId): Response
	{
		return $this->connector->send(new TeamsGetLegacy($teamId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 */
	public function teamsDeleteLegacy(int $teamId): Response
	{
		return $this->connector->send(new TeamsDeleteLegacy($teamId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 */
	public function teamsUpdateLegacy(int $teamId): Response
	{
		return $this->connector->send(new TeamsUpdateLegacy($teamId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $direction The direction to sort the results by.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListDiscussionsLegacy(int $teamId, ?string $direction, ?int $page): Response
	{
		return $this->connector->send(new TeamsListDiscussionsLegacy($teamId, $direction, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 */
	public function teamsCreateDiscussionLegacy(int $teamId): Response
	{
		return $this->connector->send(new TeamsCreateDiscussionLegacy($teamId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsGetDiscussionLegacy(int $teamId, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsGetDiscussionLegacy($teamId, $discussionNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsDeleteDiscussionLegacy(int $teamId, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsDeleteDiscussionLegacy($teamId, $discussionNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsUpdateDiscussionLegacy(int $teamId, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsUpdateDiscussionLegacy($teamId, $discussionNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param string $direction The direction to sort the results by.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListDiscussionCommentsLegacy(
		int $teamId,
		int $discussionNumber,
		?string $direction,
		?int $page,
	): Response
	{
		return $this->connector->send(new TeamsListDiscussionCommentsLegacy($teamId, $discussionNumber, $direction, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function teamsCreateDiscussionCommentLegacy(int $teamId, int $discussionNumber): Response
	{
		return $this->connector->send(new TeamsCreateDiscussionCommentLegacy($teamId, $discussionNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsGetDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response
	{
		return $this->connector->send(new TeamsGetDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsDeleteDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response
	{
		return $this->connector->send(new TeamsDeleteDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $discussionNumber The number that identifies the discussion.
	 * @param int $commentNumber The number that identifies the comment.
	 */
	public function teamsUpdateDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response
	{
		return $this->connector->send(new TeamsUpdateDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListPendingInvitationsLegacy(int $teamId, ?int $page): Response
	{
		return $this->connector->send(new TeamsListPendingInvitationsLegacy($teamId, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $role Filters members returned by their role in the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListMembersLegacy(int $teamId, ?string $role, ?int $page): Response
	{
		return $this->connector->send(new TeamsListMembersLegacy($teamId, $role, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsGetMemberLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsGetMemberLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsAddMemberLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsAddMemberLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsRemoveMemberLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsRemoveMemberLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsGetMembershipForUserLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsGetMembershipForUserLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsAddOrUpdateMembershipForUserLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateMembershipForUserLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function teamsRemoveMembershipForUserLegacy(int $teamId, string $username): Response
	{
		return $this->connector->send(new TeamsRemoveMembershipForUserLegacy($teamId, $username));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListProjectsLegacy(int $teamId, ?int $page): Response
	{
		return $this->connector->send(new TeamsListProjectsLegacy($teamId, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsCheckPermissionsForProjectLegacy(int $teamId, int $projectId): Response
	{
		return $this->connector->send(new TeamsCheckPermissionsForProjectLegacy($teamId, $projectId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsAddOrUpdateProjectPermissionsLegacy(int $teamId, int $projectId): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateProjectPermissionsLegacy($teamId, $projectId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $projectId The unique identifier of the project.
	 */
	public function teamsRemoveProjectLegacy(int $teamId, int $projectId): Response
	{
		return $this->connector->send(new TeamsRemoveProjectLegacy($teamId, $projectId));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListReposLegacy(int $teamId, ?int $page): Response
	{
		return $this->connector->send(new TeamsListReposLegacy($teamId, $page));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsCheckPermissionsForRepoLegacy(int $teamId, string $owner, string $repo): Response
	{
		return $this->connector->send(new TeamsCheckPermissionsForRepoLegacy($teamId, $owner, $repo));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsAddOrUpdateRepoPermissionsLegacy(int $teamId, string $owner, string $repo): Response
	{
		return $this->connector->send(new TeamsAddOrUpdateRepoPermissionsLegacy($teamId, $owner, $repo));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function teamsRemoveRepoLegacy(int $teamId, string $owner, string $repo): Response
	{
		return $this->connector->send(new TeamsRemoveRepoLegacy($teamId, $owner, $repo));
	}


	/**
	 * @param int $teamId The unique identifier of the team.
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListChildLegacy(int $teamId, ?int $page): Response
	{
		return $this->connector->send(new TeamsListChildLegacy($teamId, $page));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function teamsListForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new TeamsListForAuthenticatedUser($page));
	}
}
