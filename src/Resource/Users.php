<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Users\UsersAddEmailForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersAddSocialAccountForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersBlock;
use Tonning\Github\Requests\Users\UsersCheckBlocked;
use Tonning\Github\Requests\Users\UsersCheckFollowingForUser;
use Tonning\Github\Requests\Users\UsersCheckPersonIsFollowedByAuthenticated;
use Tonning\Github\Requests\Users\UsersCreateGpgKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersCreatePublicSshKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersCreateSshSigningKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersDeleteEmailForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersDeleteGpgKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersDeletePublicSshKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersDeleteSocialAccountForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersDeleteSshSigningKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersFollow;
use Tonning\Github\Requests\Users\UsersGetAuthenticated;
use Tonning\Github\Requests\Users\UsersGetByUsername;
use Tonning\Github\Requests\Users\UsersGetContextForUser;
use Tonning\Github\Requests\Users\UsersGetGpgKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersGetPublicSshKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersGetSshSigningKeyForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersList;
use Tonning\Github\Requests\Users\UsersListBlockedByAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListEmailsForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListFollowedByAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListFollowersForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListFollowersForUser;
use Tonning\Github\Requests\Users\UsersListFollowingForUser;
use Tonning\Github\Requests\Users\UsersListGpgKeysForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListGpgKeysForUser;
use Tonning\Github\Requests\Users\UsersListPublicEmailsForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListPublicKeysForUser;
use Tonning\Github\Requests\Users\UsersListPublicSshKeysForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListSocialAccountsForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListSocialAccountsForUser;
use Tonning\Github\Requests\Users\UsersListSshSigningKeysForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersListSshSigningKeysForUser;
use Tonning\Github\Requests\Users\UsersSetPrimaryEmailVisibilityForAuthenticatedUser;
use Tonning\Github\Requests\Users\UsersUnblock;
use Tonning\Github\Requests\Users\UsersUnfollow;
use Tonning\Github\Requests\Users\UsersUpdateAuthenticated;
use Tonning\Github\Resource;

class Users extends Resource
{
	public function usersGetAuthenticated(): Response
	{
		return $this->connector->send(new UsersGetAuthenticated());
	}


	public function usersUpdateAuthenticated(): Response
	{
		return $this->connector->send(new UsersUpdateAuthenticated());
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListBlockedByAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListBlockedByAuthenticatedUser($page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersCheckBlocked(string $username): Response
	{
		return $this->connector->send(new UsersCheckBlocked($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersBlock(string $username): Response
	{
		return $this->connector->send(new UsersBlock($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersUnblock(string $username): Response
	{
		return $this->connector->send(new UsersUnblock($username));
	}


	public function usersSetPrimaryEmailVisibilityForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersSetPrimaryEmailVisibilityForAuthenticatedUser());
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListEmailsForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListEmailsForAuthenticatedUser($page));
	}


	public function usersAddEmailForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersAddEmailForAuthenticatedUser());
	}


	public function usersDeleteEmailForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersDeleteEmailForAuthenticatedUser());
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListFollowersForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListFollowersForAuthenticatedUser($page));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListFollowedByAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListFollowedByAuthenticatedUser($page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersCheckPersonIsFollowedByAuthenticated(string $username): Response
	{
		return $this->connector->send(new UsersCheckPersonIsFollowedByAuthenticated($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersFollow(string $username): Response
	{
		return $this->connector->send(new UsersFollow($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersUnfollow(string $username): Response
	{
		return $this->connector->send(new UsersUnfollow($username));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListGpgKeysForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListGpgKeysForAuthenticatedUser($page));
	}


	public function usersCreateGpgKeyForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersCreateGpgKeyForAuthenticatedUser());
	}


	/**
	 * @param int $gpgKeyId The unique identifier of the GPG key.
	 */
	public function usersGetGpgKeyForAuthenticatedUser(int $gpgKeyId): Response
	{
		return $this->connector->send(new UsersGetGpgKeyForAuthenticatedUser($gpgKeyId));
	}


	/**
	 * @param int $gpgKeyId The unique identifier of the GPG key.
	 */
	public function usersDeleteGpgKeyForAuthenticatedUser(int $gpgKeyId): Response
	{
		return $this->connector->send(new UsersDeleteGpgKeyForAuthenticatedUser($gpgKeyId));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListPublicSshKeysForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListPublicSshKeysForAuthenticatedUser($page));
	}


	public function usersCreatePublicSshKeyForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersCreatePublicSshKeyForAuthenticatedUser());
	}


	/**
	 * @param int $keyId The unique identifier of the key.
	 */
	public function usersGetPublicSshKeyForAuthenticatedUser(int $keyId): Response
	{
		return $this->connector->send(new UsersGetPublicSshKeyForAuthenticatedUser($keyId));
	}


	/**
	 * @param int $keyId The unique identifier of the key.
	 */
	public function usersDeletePublicSshKeyForAuthenticatedUser(int $keyId): Response
	{
		return $this->connector->send(new UsersDeletePublicSshKeyForAuthenticatedUser($keyId));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListPublicEmailsForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListPublicEmailsForAuthenticatedUser($page));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListSocialAccountsForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListSocialAccountsForAuthenticatedUser($page));
	}


	public function usersAddSocialAccountForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersAddSocialAccountForAuthenticatedUser());
	}


	public function usersDeleteSocialAccountForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersDeleteSocialAccountForAuthenticatedUser());
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListSshSigningKeysForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new UsersListSshSigningKeysForAuthenticatedUser($page));
	}


	public function usersCreateSshSigningKeyForAuthenticatedUser(): Response
	{
		return $this->connector->send(new UsersCreateSshSigningKeyForAuthenticatedUser());
	}


	/**
	 * @param int $sshSigningKeyId The unique identifier of the SSH signing key.
	 */
	public function usersGetSshSigningKeyForAuthenticatedUser(int $sshSigningKeyId): Response
	{
		return $this->connector->send(new UsersGetSshSigningKeyForAuthenticatedUser($sshSigningKeyId));
	}


	/**
	 * @param int $sshSigningKeyId The unique identifier of the SSH signing key.
	 */
	public function usersDeleteSshSigningKeyForAuthenticatedUser(int $sshSigningKeyId): Response
	{
		return $this->connector->send(new UsersDeleteSshSigningKeyForAuthenticatedUser($sshSigningKeyId));
	}


	/**
	 * @param int $since A user ID. Only return users with an ID greater than this ID.
	 */
	public function usersList(?int $since): Response
	{
		return $this->connector->send(new UsersList($since));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function usersGetByUsername(string $username): Response
	{
		return $this->connector->send(new UsersGetByUsername($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListFollowersForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListFollowersForUser($username, $page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListFollowingForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListFollowingForUser($username, $page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param string $targetUser
	 */
	public function usersCheckFollowingForUser(string $username, string $targetUser): Response
	{
		return $this->connector->send(new UsersCheckFollowingForUser($username, $targetUser));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListGpgKeysForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListGpgKeysForUser($username, $page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param string $subjectType Identifies which additional information you'd like to receive about the person's hovercard. Can be `organization`, `repository`, `issue`, `pull_request`. **Required** when using `subject_id`.
	 * @param string $subjectId Uses the ID for the `subject_type` you specified. **Required** when using `subject_type`.
	 */
	public function usersGetContextForUser(string $username, ?string $subjectType, ?string $subjectId): Response
	{
		return $this->connector->send(new UsersGetContextForUser($username, $subjectType, $subjectId));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListPublicKeysForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListPublicKeysForUser($username, $page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListSocialAccountsForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListSocialAccountsForUser($username, $page));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param int $page Page number of the results to fetch.
	 */
	public function usersListSshSigningKeysForUser(string $username, ?int $page): Response
	{
		return $this->connector->send(new UsersListSshSigningKeysForUser($username, $page));
	}
}
