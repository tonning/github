<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Orgs\OrgsAddSecurityManagerTeam;
use Tonning\Github\Requests\Orgs\OrgsAssignTeamToOrgRole;
use Tonning\Github\Requests\Orgs\OrgsAssignUserToOrgRole;
use Tonning\Github\Requests\Orgs\OrgsBlockUser;
use Tonning\Github\Requests\Orgs\OrgsCancelInvitation;
use Tonning\Github\Requests\Orgs\OrgsCheckBlockedUser;
use Tonning\Github\Requests\Orgs\OrgsCheckMembershipForUser;
use Tonning\Github\Requests\Orgs\OrgsCheckPublicMembershipForUser;
use Tonning\Github\Requests\Orgs\OrgsConvertMemberToOutsideCollaborator;
use Tonning\Github\Requests\Orgs\OrgsCreateCustomOrganizationRole;
use Tonning\Github\Requests\Orgs\OrgsCreateInvitation;
use Tonning\Github\Requests\Orgs\OrgsCreateOrUpdateCustomProperties;
use Tonning\Github\Requests\Orgs\OrgsCreateOrUpdateCustomPropertiesValuesForRepos;
use Tonning\Github\Requests\Orgs\OrgsCreateOrUpdateCustomProperty;
use Tonning\Github\Requests\Orgs\OrgsCreateWebhook;
use Tonning\Github\Requests\Orgs\OrgsDelete;
use Tonning\Github\Requests\Orgs\OrgsDeleteCustomOrganizationRole;
use Tonning\Github\Requests\Orgs\OrgsDeleteWebhook;
use Tonning\Github\Requests\Orgs\OrgsEnableOrDisableSecurityProductOnAllOrgRepos;
use Tonning\Github\Requests\Orgs\OrgsGet;
use Tonning\Github\Requests\Orgs\OrgsGetAllCustomProperties;
use Tonning\Github\Requests\Orgs\OrgsGetCustomProperty;
use Tonning\Github\Requests\Orgs\OrgsGetMembershipForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsGetMembershipForUser;
use Tonning\Github\Requests\Orgs\OrgsGetOrgRole;
use Tonning\Github\Requests\Orgs\OrgsGetWebhook;
use Tonning\Github\Requests\Orgs\OrgsGetWebhookConfigForOrg;
use Tonning\Github\Requests\Orgs\OrgsGetWebhookDelivery;
use Tonning\Github\Requests\Orgs\OrgsList;
use Tonning\Github\Requests\Orgs\OrgsListAppInstallations;
use Tonning\Github\Requests\Orgs\OrgsListBlockedUsers;
use Tonning\Github\Requests\Orgs\OrgsListCustomPropertiesValuesForRepos;
use Tonning\Github\Requests\Orgs\OrgsListFailedInvitations;
use Tonning\Github\Requests\Orgs\OrgsListForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsListForUser;
use Tonning\Github\Requests\Orgs\OrgsListInvitationTeams;
use Tonning\Github\Requests\Orgs\OrgsListMembers;
use Tonning\Github\Requests\Orgs\OrgsListMembershipsForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsListOrganizationFineGrainedPermissions;
use Tonning\Github\Requests\Orgs\OrgsListOrgRoles;
use Tonning\Github\Requests\Orgs\OrgsListOrgRoleTeams;
use Tonning\Github\Requests\Orgs\OrgsListOrgRoleUsers;
use Tonning\Github\Requests\Orgs\OrgsListOutsideCollaborators;
use Tonning\Github\Requests\Orgs\OrgsListPatGrantRepositories;
use Tonning\Github\Requests\Orgs\OrgsListPatGrantRequestRepositories;
use Tonning\Github\Requests\Orgs\OrgsListPatGrantRequests;
use Tonning\Github\Requests\Orgs\OrgsListPatGrants;
use Tonning\Github\Requests\Orgs\OrgsListPendingInvitations;
use Tonning\Github\Requests\Orgs\OrgsListPublicMembers;
use Tonning\Github\Requests\Orgs\OrgsListSecurityManagerTeams;
use Tonning\Github\Requests\Orgs\OrgsListWebhookDeliveries;
use Tonning\Github\Requests\Orgs\OrgsListWebhooks;
use Tonning\Github\Requests\Orgs\OrgsPatchCustomOrganizationRole;
use Tonning\Github\Requests\Orgs\OrgsPingWebhook;
use Tonning\Github\Requests\Orgs\OrgsRedeliverWebhookDelivery;
use Tonning\Github\Requests\Orgs\OrgsRemoveCustomProperty;
use Tonning\Github\Requests\Orgs\OrgsRemoveMember;
use Tonning\Github\Requests\Orgs\OrgsRemoveMembershipForUser;
use Tonning\Github\Requests\Orgs\OrgsRemoveOutsideCollaborator;
use Tonning\Github\Requests\Orgs\OrgsRemovePublicMembershipForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsRemoveSecurityManagerTeam;
use Tonning\Github\Requests\Orgs\OrgsReviewPatGrantRequest;
use Tonning\Github\Requests\Orgs\OrgsReviewPatGrantRequestsInBulk;
use Tonning\Github\Requests\Orgs\OrgsRevokeAllOrgRolesTeam;
use Tonning\Github\Requests\Orgs\OrgsRevokeAllOrgRolesUser;
use Tonning\Github\Requests\Orgs\OrgsRevokeOrgRoleTeam;
use Tonning\Github\Requests\Orgs\OrgsRevokeOrgRoleUser;
use Tonning\Github\Requests\Orgs\OrgsSetMembershipForUser;
use Tonning\Github\Requests\Orgs\OrgsSetPublicMembershipForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsUnblockUser;
use Tonning\Github\Requests\Orgs\OrgsUpdate;
use Tonning\Github\Requests\Orgs\OrgsUpdateMembershipForAuthenticatedUser;
use Tonning\Github\Requests\Orgs\OrgsUpdatePatAccess;
use Tonning\Github\Requests\Orgs\OrgsUpdatePatAccesses;
use Tonning\Github\Requests\Orgs\OrgsUpdateWebhook;
use Tonning\Github\Requests\Orgs\OrgsUpdateWebhookConfigForOrg;
use Tonning\Github\Resource;

class Orgs extends Resource
{
    /**
     * @param  int  $since An organization ID. Only return organizations with an ID greater than this ID.
     */
    public function orgsList(?int $since): Response
    {
        return $this->connector->send(new OrgsList($since));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsGet(string $org): Response
    {
        return $this->connector->send(new OrgsGet($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsDelete(string $org): Response
    {
        return $this->connector->send(new OrgsDelete($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsUpdate(string $org): Response
    {
        return $this->connector->send(new OrgsUpdate($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListBlockedUsers(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListBlockedUsers($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsCheckBlockedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckBlockedUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsBlockUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsBlockUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsUnblockUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsUnblockUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListFailedInvitations(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListFailedInvitations($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListWebhooks(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListWebhooks($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsCreateWebhook(string $org): Response
    {
        return $this->connector->send(new OrgsCreateWebhook($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsGetWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsGetWebhook($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsDeleteWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsDeleteWebhook($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsUpdateWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsUpdateWebhook($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsGetWebhookConfigForOrg(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsGetWebhookConfigForOrg($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsUpdateWebhookConfigForOrg(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsUpdateWebhookConfigForOrg($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  string  $cursor Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function orgsListWebhookDeliveries(string $org, int $hookId, ?string $cursor, ?bool $redelivery): Response
    {
        return $this->connector->send(new OrgsListWebhookDeliveries($org, $hookId, $cursor, $redelivery));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsGetWebhookDelivery(string $org, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new OrgsGetWebhookDelivery($org, $hookId, $deliveryId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsRedeliverWebhookDelivery(string $org, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new OrgsRedeliverWebhookDelivery($org, $hookId, $deliveryId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function orgsPingWebhook(string $org, int $hookId): Response
    {
        return $this->connector->send(new OrgsPingWebhook($org, $hookId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListAppInstallations(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListAppInstallations($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $role Filter invitations by their member role.
     * @param  string  $invitationSource Filter invitations by their invitation source.
     */
    public function orgsListPendingInvitations(
        string $org,
        ?int $page,
        ?string $role,
        ?string $invitationSource,
    ): Response {
        return $this->connector->send(new OrgsListPendingInvitations($org, $page, $role, $invitationSource));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsCreateInvitation(string $org): Response
    {
        return $this->connector->send(new OrgsCreateInvitation($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $invitationId The unique identifier of the invitation.
     */
    public function orgsCancelInvitation(string $org, int $invitationId): Response
    {
        return $this->connector->send(new OrgsCancelInvitation($org, $invitationId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $invitationId The unique identifier of the invitation.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListInvitationTeams(string $org, int $invitationId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListInvitationTeams($org, $invitationId, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $filter Filter members returned in the list. `2fa_disabled` means that only members without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned. This options is only available for organization owners.
     * @param  string  $role Filter members returned by their role.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListMembers(string $org, ?string $filter, ?string $role, ?int $page): Response
    {
        return $this->connector->send(new OrgsListMembers($org, $filter, $role, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsCheckMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsRemoveMember(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveMember($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsGetMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsGetMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsSetMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsSetMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsRemoveMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsListOrganizationFineGrainedPermissions(string $org): Response
    {
        return $this->connector->send(new OrgsListOrganizationFineGrainedPermissions($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsListOrgRoles(string $org): Response
    {
        return $this->connector->send(new OrgsListOrgRoles($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsCreateCustomOrganizationRole(string $org): Response
    {
        return $this->connector->send(new OrgsCreateCustomOrganizationRole($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     */
    public function orgsRevokeAllOrgRolesTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsRevokeAllOrgRolesTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsAssignTeamToOrgRole(string $org, string $teamSlug, int $roleId): Response
    {
        return $this->connector->send(new OrgsAssignTeamToOrgRole($org, $teamSlug, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsRevokeOrgRoleTeam(string $org, string $teamSlug, int $roleId): Response
    {
        return $this->connector->send(new OrgsRevokeOrgRoleTeam($org, $teamSlug, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsRevokeAllOrgRolesUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRevokeAllOrgRolesUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsAssignUserToOrgRole(string $org, string $username, int $roleId): Response
    {
        return $this->connector->send(new OrgsAssignUserToOrgRole($org, $username, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsRevokeOrgRoleUser(string $org, string $username, int $roleId): Response
    {
        return $this->connector->send(new OrgsRevokeOrgRoleUser($org, $username, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsGetOrgRole(string $org, int $roleId): Response
    {
        return $this->connector->send(new OrgsGetOrgRole($org, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsDeleteCustomOrganizationRole(string $org, int $roleId): Response
    {
        return $this->connector->send(new OrgsDeleteCustomOrganizationRole($org, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $roleId The unique identifier of the role.
     */
    public function orgsPatchCustomOrganizationRole(string $org, int $roleId): Response
    {
        return $this->connector->send(new OrgsPatchCustomOrganizationRole($org, $roleId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $roleId The unique identifier of the role.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListOrgRoleTeams(string $org, int $roleId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOrgRoleTeams($org, $roleId, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $roleId The unique identifier of the role.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListOrgRoleUsers(string $org, int $roleId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOrgRoleUsers($org, $roleId, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $filter Filter the list of outside collaborators. `2fa_disabled` means that only outside collaborators without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListOutsideCollaborators(string $org, ?string $filter, ?int $page): Response
    {
        return $this->connector->send(new OrgsListOutsideCollaborators($org, $filter, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsConvertMemberToOutsideCollaborator(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsConvertMemberToOutsideCollaborator($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsRemoveOutsideCollaborator(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemoveOutsideCollaborator($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $sort The property by which to sort the results.
     * @param  string  $direction The direction to sort the results by.
     * @param  array  $owner A list of owner usernames to use to filter the results.
     * @param  string  $repository The name of the repository to use to filter the results.
     * @param  string  $permission The permission to use to filter the results.
     * @param  string  $lastUsedBefore Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $lastUsedAfter Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function orgsListPatGrantRequests(
        string $org,
        ?int $page,
        ?string $sort,
        ?string $direction,
        ?array $owner,
        ?string $repository,
        ?string $permission,
        ?string $lastUsedBefore,
        ?string $lastUsedAfter,
    ): Response {
        return $this->connector->send(new OrgsListPatGrantRequests($org, $page, $sort, $direction, $owner, $repository, $permission, $lastUsedBefore, $lastUsedAfter));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsReviewPatGrantRequestsInBulk(string $org): Response
    {
        return $this->connector->send(new OrgsReviewPatGrantRequestsInBulk($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patRequestId Unique identifier of the request for access via fine-grained personal access token.
     */
    public function orgsReviewPatGrantRequest(string $org, int $patRequestId): Response
    {
        return $this->connector->send(new OrgsReviewPatGrantRequest($org, $patRequestId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patRequestId Unique identifier of the request for access via fine-grained personal access token.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListPatGrantRequestRepositories(string $org, int $patRequestId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPatGrantRequestRepositories($org, $patRequestId, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $sort The property by which to sort the results.
     * @param  string  $direction The direction to sort the results by.
     * @param  array  $owner A list of owner usernames to use to filter the results.
     * @param  string  $repository The name of the repository to use to filter the results.
     * @param  string  $permission The permission to use to filter the results.
     * @param  string  $lastUsedBefore Only show fine-grained personal access tokens used before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $lastUsedAfter Only show fine-grained personal access tokens used after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function orgsListPatGrants(
        string $org,
        ?int $page,
        ?string $sort,
        ?string $direction,
        ?array $owner,
        ?string $repository,
        ?string $permission,
        ?string $lastUsedBefore,
        ?string $lastUsedAfter,
    ): Response {
        return $this->connector->send(new OrgsListPatGrants($org, $page, $sort, $direction, $owner, $repository, $permission, $lastUsedBefore, $lastUsedAfter));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsUpdatePatAccesses(string $org): Response
    {
        return $this->connector->send(new OrgsUpdatePatAccesses($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patId The unique identifier of the fine-grained personal access token.
     */
    public function orgsUpdatePatAccess(string $org, int $patId): Response
    {
        return $this->connector->send(new OrgsUpdatePatAccess($org, $patId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patId Unique identifier of the fine-grained personal access token.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListPatGrantRepositories(string $org, int $patId, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPatGrantRepositories($org, $patId, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsGetAllCustomProperties(string $org): Response
    {
        return $this->connector->send(new OrgsGetAllCustomProperties($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsCreateOrUpdateCustomProperties(string $org): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomProperties($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $customPropertyName The custom property name. The name is case-sensitive.
     */
    public function orgsGetCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsGetCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $customPropertyName The custom property name. The name is case-sensitive.
     */
    public function orgsCreateOrUpdateCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $customPropertyName The custom property name. The name is case-sensitive.
     */
    public function orgsRemoveCustomProperty(string $org, string $customPropertyName): Response
    {
        return $this->connector->send(new OrgsRemoveCustomProperty($org, $customPropertyName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $repositoryQuery Finds repositories in the organization with a query containing one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching for repositories](https://docs.github.com/articles/searching-for-repositories/)" for a detailed list of qualifiers.
     */
    public function orgsListCustomPropertiesValuesForRepos(string $org, ?int $page, ?string $repositoryQuery): Response
    {
        return $this->connector->send(new OrgsListCustomPropertiesValuesForRepos($org, $page, $repositoryQuery));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsCreateOrUpdateCustomPropertiesValuesForRepos(string $org): Response
    {
        return $this->connector->send(new OrgsCreateOrUpdateCustomPropertiesValuesForRepos($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListPublicMembers(string $org, ?int $page): Response
    {
        return $this->connector->send(new OrgsListPublicMembers($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsCheckPublicMembershipForUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsCheckPublicMembershipForUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsSetPublicMembershipForAuthenticatedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsSetPublicMembershipForAuthenticatedUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function orgsRemovePublicMembershipForAuthenticatedUser(string $org, string $username): Response
    {
        return $this->connector->send(new OrgsRemovePublicMembershipForAuthenticatedUser($org, $username));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsListSecurityManagerTeams(string $org): Response
    {
        return $this->connector->send(new OrgsListSecurityManagerTeams($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     */
    public function orgsAddSecurityManagerTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsAddSecurityManagerTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     */
    public function orgsRemoveSecurityManagerTeam(string $org, string $teamSlug): Response
    {
        return $this->connector->send(new OrgsRemoveSecurityManagerTeam($org, $teamSlug));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $securityProduct The security feature to enable or disable.
     * @param  string  $enablement The action to take.
     *
     * `enable_all` means to enable the specified security feature for all repositories in the organization.
     * `disable_all` means to disable the specified security feature for all repositories in the organization.
     */
    public function orgsEnableOrDisableSecurityProductOnAllOrgRepos(
        string $org,
        string $securityProduct,
        string $enablement,
    ): Response {
        return $this->connector->send(new OrgsEnableOrDisableSecurityProductOnAllOrgRepos($org, $securityProduct, $enablement));
    }

    /**
     * @param  string  $state Indicates the state of the memberships to return. If not specified, the API returns both active and pending memberships.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListMembershipsForAuthenticatedUser(?string $state, ?int $page): Response
    {
        return $this->connector->send(new OrgsListMembershipsForAuthenticatedUser($state, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsGetMembershipForAuthenticatedUser(string $org): Response
    {
        return $this->connector->send(new OrgsGetMembershipForAuthenticatedUser($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function orgsUpdateMembershipForAuthenticatedUser(string $org): Response
    {
        return $this->connector->send(new OrgsUpdateMembershipForAuthenticatedUser($org));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new OrgsListForAuthenticatedUser($page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function orgsListForUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new OrgsListForUser($username, $page));
    }
}
