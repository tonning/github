<?php

namespace Tonning\Github\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Tonning\Github\Enums\CommitStatus;
use Tonning\Github\Requests\Repos\ReposGetCommitSha;
use Tonning\Github\Requests\Repos\ReposAcceptInvitationForAuthenticatedUser;
use Tonning\Github\Requests\Repos\ReposAddAppAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposAddCollaborator;
use Tonning\Github\Requests\Repos\ReposAddStatusCheckContexts;
use Tonning\Github\Requests\Repos\ReposAddTeamAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposAddUserAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposCheckAutomatedSecurityFixes;
use Tonning\Github\Requests\Repos\ReposCheckCollaborator;
use Tonning\Github\Requests\Repos\ReposCheckVulnerabilityAlerts;
use Tonning\Github\Requests\Repos\ReposCodeownersErrors;
use Tonning\Github\Requests\Repos\ReposCompareCommits;
use Tonning\Github\Requests\Repos\ReposCreateAutolink;
use Tonning\Github\Requests\Repos\ReposCreateCommitComment;
use Tonning\Github\Requests\Repos\ReposCreateCommitSignatureProtection;
use Tonning\Github\Requests\Repos\ReposCreateCommitStatus;
use Tonning\Github\Requests\Repos\ReposCreateDeployKey;
use Tonning\Github\Requests\Repos\ReposCreateDeployment;
use Tonning\Github\Requests\Repos\ReposCreateDeploymentBranchPolicy;
use Tonning\Github\Requests\Repos\ReposCreateDeploymentProtectionRule;
use Tonning\Github\Requests\Repos\ReposCreateDeploymentStatus;
use Tonning\Github\Requests\Repos\ReposCreateDispatchEvent;
use Tonning\Github\Requests\Repos\ReposCreateForAuthenticatedUser;
use Tonning\Github\Requests\Repos\ReposCreateFork;
use Tonning\Github\Requests\Repos\ReposCreateInOrg;
use Tonning\Github\Requests\Repos\ReposCreateOrgRuleset;
use Tonning\Github\Requests\Repos\ReposCreateOrUpdateEnvironment;
use Tonning\Github\Requests\Repos\ReposCreateOrUpdateFileContents;
use Tonning\Github\Requests\Repos\ReposCreatePagesDeployment;
use Tonning\Github\Requests\Repos\ReposCreatePagesSite;
use Tonning\Github\Requests\Repos\ReposCreateRelease;
use Tonning\Github\Requests\Repos\ReposCreateRepoRuleset;
use Tonning\Github\Requests\Repos\ReposCreateTagProtection;
use Tonning\Github\Requests\Repos\ReposCreateUsingTemplate;
use Tonning\Github\Requests\Repos\ReposCreateWebhook;
use Tonning\Github\Requests\Repos\ReposDeclineInvitationForAuthenticatedUser;
use Tonning\Github\Requests\Repos\ReposDelete;
use Tonning\Github\Requests\Repos\ReposDeleteAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposDeleteAdminBranchProtection;
use Tonning\Github\Requests\Repos\ReposDeleteAnEnvironment;
use Tonning\Github\Requests\Repos\ReposDeleteAutolink;
use Tonning\Github\Requests\Repos\ReposDeleteBranchProtection;
use Tonning\Github\Requests\Repos\ReposDeleteCommitComment;
use Tonning\Github\Requests\Repos\ReposDeleteCommitSignatureProtection;
use Tonning\Github\Requests\Repos\ReposDeleteDeployKey;
use Tonning\Github\Requests\Repos\ReposDeleteDeployment;
use Tonning\Github\Requests\Repos\ReposDeleteDeploymentBranchPolicy;
use Tonning\Github\Requests\Repos\ReposDeleteFile;
use Tonning\Github\Requests\Repos\ReposDeleteInvitation;
use Tonning\Github\Requests\Repos\ReposDeleteOrgRuleset;
use Tonning\Github\Requests\Repos\ReposDeletePagesSite;
use Tonning\Github\Requests\Repos\ReposDeletePullRequestReviewProtection;
use Tonning\Github\Requests\Repos\ReposDeleteRelease;
use Tonning\Github\Requests\Repos\ReposDeleteReleaseAsset;
use Tonning\Github\Requests\Repos\ReposDeleteRepoRuleset;
use Tonning\Github\Requests\Repos\ReposDeleteTagProtection;
use Tonning\Github\Requests\Repos\ReposDeleteWebhook;
use Tonning\Github\Requests\Repos\ReposDisableAutomatedSecurityFixes;
use Tonning\Github\Requests\Repos\ReposDisableDeploymentProtectionRule;
use Tonning\Github\Requests\Repos\ReposDisablePrivateVulnerabilityReporting;
use Tonning\Github\Requests\Repos\ReposDisableVulnerabilityAlerts;
use Tonning\Github\Requests\Repos\ReposDownloadTarballArchive;
use Tonning\Github\Requests\Repos\ReposDownloadZipballArchive;
use Tonning\Github\Requests\Repos\ReposEnableAutomatedSecurityFixes;
use Tonning\Github\Requests\Repos\ReposEnablePrivateVulnerabilityReporting;
use Tonning\Github\Requests\Repos\ReposEnableVulnerabilityAlerts;
use Tonning\Github\Requests\Repos\ReposGenerateReleaseNotes;
use Tonning\Github\Requests\Repos\ReposGet;
use Tonning\Github\Requests\Repos\ReposGetAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposGetAdminBranchProtection;
use Tonning\Github\Requests\Repos\ReposGetAllDeploymentProtectionRules;
use Tonning\Github\Requests\Repos\ReposGetAllEnvironments;
use Tonning\Github\Requests\Repos\ReposGetAllStatusCheckContexts;
use Tonning\Github\Requests\Repos\ReposGetAllTopics;
use Tonning\Github\Requests\Repos\ReposGetAppsWithAccessToProtectedBranch;
use Tonning\Github\Requests\Repos\ReposGetAutolink;
use Tonning\Github\Requests\Repos\ReposGetBranch;
use Tonning\Github\Requests\Repos\ReposGetBranchProtection;
use Tonning\Github\Requests\Repos\ReposGetBranchRules;
use Tonning\Github\Requests\Repos\ReposGetClones;
use Tonning\Github\Requests\Repos\ReposGetCodeFrequencyStats;
use Tonning\Github\Requests\Repos\ReposGetCollaboratorPermissionLevel;
use Tonning\Github\Requests\Repos\ReposGetCombinedStatusForRef;
use Tonning\Github\Requests\Repos\ReposGetCommit;
use Tonning\Github\Requests\Repos\ReposGetCommitActivityStats;
use Tonning\Github\Requests\Repos\ReposGetCommitComment;
use Tonning\Github\Requests\Repos\ReposGetCommitSignatureProtection;
use Tonning\Github\Requests\Repos\ReposGetCommunityProfileMetrics;
use Tonning\Github\Requests\Repos\ReposGetContent;
use Tonning\Github\Requests\Repos\ReposGetContributorsStats;
use Tonning\Github\Requests\Repos\ReposGetCustomDeploymentProtectionRule;
use Tonning\Github\Requests\Repos\ReposGetCustomPropertiesValues;
use Tonning\Github\Requests\Repos\ReposGetDeployKey;
use Tonning\Github\Requests\Repos\ReposGetDeployment;
use Tonning\Github\Requests\Repos\ReposGetDeploymentBranchPolicy;
use Tonning\Github\Requests\Repos\ReposGetDeploymentStatus;
use Tonning\Github\Requests\Repos\ReposGetEnvironment;
use Tonning\Github\Requests\Repos\ReposGetLatestPagesBuild;
use Tonning\Github\Requests\Repos\ReposGetLatestRelease;
use Tonning\Github\Requests\Repos\ReposGetOrgRuleset;
use Tonning\Github\Requests\Repos\ReposGetOrgRulesets;
use Tonning\Github\Requests\Repos\ReposGetOrgRuleSuite;
use Tonning\Github\Requests\Repos\ReposGetOrgRuleSuites;
use Tonning\Github\Requests\Repos\ReposGetPages;
use Tonning\Github\Requests\Repos\ReposGetPagesBuild;
use Tonning\Github\Requests\Repos\ReposGetPagesHealthCheck;
use Tonning\Github\Requests\Repos\ReposGetParticipationStats;
use Tonning\Github\Requests\Repos\ReposGetPullRequestReviewProtection;
use Tonning\Github\Requests\Repos\ReposGetPunchCardStats;
use Tonning\Github\Requests\Repos\ReposGetReadme;
use Tonning\Github\Requests\Repos\ReposGetReadmeInDirectory;
use Tonning\Github\Requests\Repos\ReposGetRelease;
use Tonning\Github\Requests\Repos\ReposGetReleaseAsset;
use Tonning\Github\Requests\Repos\ReposGetReleaseByTag;
use Tonning\Github\Requests\Repos\ReposGetRepoRuleset;
use Tonning\Github\Requests\Repos\ReposGetRepoRulesets;
use Tonning\Github\Requests\Repos\ReposGetRepoRuleSuite;
use Tonning\Github\Requests\Repos\ReposGetRepoRuleSuites;
use Tonning\Github\Requests\Repos\ReposGetStatusChecksProtection;
use Tonning\Github\Requests\Repos\ReposGetTeamsWithAccessToProtectedBranch;
use Tonning\Github\Requests\Repos\ReposGetTopPaths;
use Tonning\Github\Requests\Repos\ReposGetTopReferrers;
use Tonning\Github\Requests\Repos\ReposGetUsersWithAccessToProtectedBranch;
use Tonning\Github\Requests\Repos\ReposGetViews;
use Tonning\Github\Requests\Repos\ReposGetWebhook;
use Tonning\Github\Requests\Repos\ReposGetWebhookConfigForRepo;
use Tonning\Github\Requests\Repos\ReposGetWebhookDelivery;
use Tonning\Github\Requests\Repos\ReposListActivities;
use Tonning\Github\Requests\Repos\ReposListAutolinks;
use Tonning\Github\Requests\Repos\ReposListBranches;
use Tonning\Github\Requests\Repos\ReposListBranchesForHeadCommit;
use Tonning\Github\Requests\Repos\ReposListCollaborators;
use Tonning\Github\Requests\Repos\ReposListCommentsForCommit;
use Tonning\Github\Requests\Repos\ReposListCommitCommentsForRepo;
use Tonning\Github\Requests\Repos\ReposListCommits;
use Tonning\Github\Requests\Repos\ReposListCommitStatusesForRef;
use Tonning\Github\Requests\Repos\ReposListContributors;
use Tonning\Github\Requests\Repos\ReposListCustomDeploymentRuleIntegrations;
use Tonning\Github\Requests\Repos\ReposListDeployKeys;
use Tonning\Github\Requests\Repos\ReposListDeploymentBranchPolicies;
use Tonning\Github\Requests\Repos\ReposListDeployments;
use Tonning\Github\Requests\Repos\ReposListDeploymentStatuses;
use Tonning\Github\Requests\Repos\ReposListForAuthenticatedUser;
use Tonning\Github\Requests\Repos\ReposListForks;
use Tonning\Github\Requests\Repos\ReposListForOrg;
use Tonning\Github\Requests\Repos\ReposListForUser;
use Tonning\Github\Requests\Repos\ReposListInvitations;
use Tonning\Github\Requests\Repos\ReposListInvitationsForAuthenticatedUser;
use Tonning\Github\Requests\Repos\ReposListLanguages;
use Tonning\Github\Requests\Repos\ReposListPagesBuilds;
use Tonning\Github\Requests\Repos\ReposListPublic;
use Tonning\Github\Requests\Repos\ReposListPullRequestsAssociatedWithCommit;
use Tonning\Github\Requests\Repos\ReposListReleaseAssets;
use Tonning\Github\Requests\Repos\ReposListReleases;
use Tonning\Github\Requests\Repos\ReposListTagProtection;
use Tonning\Github\Requests\Repos\ReposListTags;
use Tonning\Github\Requests\Repos\ReposListTeams;
use Tonning\Github\Requests\Repos\ReposListWebhookDeliveries;
use Tonning\Github\Requests\Repos\ReposListWebhooks;
use Tonning\Github\Requests\Repos\ReposMerge;
use Tonning\Github\Requests\Repos\ReposMergeUpstream;
use Tonning\Github\Requests\Repos\ReposPingWebhook;
use Tonning\Github\Requests\Repos\ReposRedeliverWebhookDelivery;
use Tonning\Github\Requests\Repos\ReposRemoveAppAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposRemoveCollaborator;
use Tonning\Github\Requests\Repos\ReposRemoveStatusCheckContexts;
use Tonning\Github\Requests\Repos\ReposRemoveStatusCheckProtection;
use Tonning\Github\Requests\Repos\ReposRemoveTeamAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposRemoveUserAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposRenameBranch;
use Tonning\Github\Requests\Repos\ReposReplaceAllTopics;
use Tonning\Github\Requests\Repos\ReposRequestPagesBuild;
use Tonning\Github\Requests\Repos\ReposSetAdminBranchProtection;
use Tonning\Github\Requests\Repos\ReposSetAppAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposSetStatusCheckContexts;
use Tonning\Github\Requests\Repos\ReposSetTeamAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposSetUserAccessRestrictions;
use Tonning\Github\Requests\Repos\ReposTestPushWebhook;
use Tonning\Github\Requests\Repos\ReposTransfer;
use Tonning\Github\Requests\Repos\ReposUpdate;
use Tonning\Github\Requests\Repos\ReposUpdateBranchProtection;
use Tonning\Github\Requests\Repos\ReposUpdateCommitComment;
use Tonning\Github\Requests\Repos\ReposUpdateDeploymentBranchPolicy;
use Tonning\Github\Requests\Repos\ReposUpdateInformationAboutPagesSite;
use Tonning\Github\Requests\Repos\ReposUpdateInvitation;
use Tonning\Github\Requests\Repos\ReposUpdateOrgRuleset;
use Tonning\Github\Requests\Repos\ReposUpdatePullRequestReviewProtection;
use Tonning\Github\Requests\Repos\ReposUpdateRelease;
use Tonning\Github\Requests\Repos\ReposUpdateReleaseAsset;
use Tonning\Github\Requests\Repos\ReposUpdateRepoRuleset;
use Tonning\Github\Requests\Repos\ReposUpdateStatusCheckProtection;
use Tonning\Github\Requests\Repos\ReposUpdateWebhook;
use Tonning\Github\Requests\Repos\ReposUpdateWebhookConfigForRepo;
use Tonning\Github\Requests\Repos\ReposUploadReleaseAsset;
use Tonning\Github\Resource;

class Repos extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $type Specifies the types of repositories you want returned.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $direction The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListForOrg(string $org, ?string $type, ?string $sort, ?string $direction, ?int $page): Response
    {
        return $this->connector->send(new ReposListForOrg($org, $type, $sort, $direction, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function reposCreateInOrg(string $org): Response
    {
        return $this->connector->send(new ReposCreateInOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetOrgRulesets(string $org, ?int $page): Response
    {
        return $this->connector->send(new ReposGetOrgRulesets($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function reposCreateOrgRuleset(string $org): Response
    {
        return $this->connector->send(new ReposCreateOrgRuleset($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $repositoryName The name of the repository to filter on. When specified, only rule evaluations from this repository will be returned.
     * @param  string  $timePeriod The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  string  $actorName The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  string  $ruleSuiteResult The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetOrgRuleSuites(
        string $org,
        ?int $repositoryName,
        ?string $timePeriod,
        ?string $actorName,
        ?string $ruleSuiteResult,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposGetOrgRuleSuites($org, $repositoryName, $timePeriod, $actorName, $ruleSuiteResult, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $ruleSuiteId The unique identifier of the rule suite result.
     * To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     * for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     * for organizations.
     */
    public function reposGetOrgRuleSuite(string $org, int $ruleSuiteId): Response
    {
        return $this->connector->send(new ReposGetOrgRuleSuite($org, $ruleSuiteId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     */
    public function reposGetOrgRuleset(string $org, int $rulesetId): Response
    {
        return $this->connector->send(new ReposGetOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     */
    public function reposUpdateOrgRuleset(string $org, int $rulesetId): Response
    {
        return $this->connector->send(new ReposUpdateOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     */
    public function reposDeleteOrgRuleset(string $org, int $rulesetId): Response
    {
        return $this->connector->send(new ReposDeleteOrgRuleset($org, $rulesetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGet(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGet($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDelete(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposDelete($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposUpdate(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposUpdate($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  string  $ref The Git reference for the activities you want to list.
     *
     * The `ref` for a branch can be formatted either as `refs/heads/BRANCH_NAME` or `BRANCH_NAME`, where `BRANCH_NAME` is the name of your branch.
     * @param  string  $actor The GitHub username to use to filter by the actor who performed the activity.
     * @param  string  $timePeriod The time period to filter by.
     *
     * For example, `day` will filter for activity that occurred in the past 24 hours, and `week` will filter for activity that occurred in the past 7 days (168 hours).
     * @param  string  $activityType The activity type to filter by.
     *
     * For example, you can choose to filter by "force_push", to see all force pushes to the repository.
     */
    public function reposListActivities(
        string $owner,
        string $repo,
        ?string $direction,
        ?string $before,
        ?string $ref,
        ?string $actor,
        ?string $timePeriod,
        ?string $activityType,
    ): Response {
        return $this->connector->send(new ReposListActivities($owner, $repo, $direction, $before, $ref, $actor, $timePeriod, $activityType));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListAutolinks(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListAutolinks($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateAutolink(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateAutolink($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $autolinkId The unique identifier of the autolink.
     */
    public function reposGetAutolink(string $owner, string $repo, int $autolinkId): Response
    {
        return $this->connector->send(new ReposGetAutolink($owner, $repo, $autolinkId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $autolinkId The unique identifier of the autolink.
     */
    public function reposDeleteAutolink(string $owner, string $repo, int $autolinkId): Response
    {
        return $this->connector->send(new ReposDeleteAutolink($owner, $repo, $autolinkId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCheckAutomatedSecurityFixes(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCheckAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposEnableAutomatedSecurityFixes(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposEnableAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDisableAutomatedSecurityFixes(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposDisableAutomatedSecurityFixes($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  bool  $protected Setting to `true` returns only protected branches. When set to `false`, only unprotected branches are returned. Omitting this parameter returns all branches.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListBranches(string $owner, string $repo, ?bool $protected, ?int $page): Response
    {
        return $this->connector->send(new ReposListBranches($owner, $repo, $protected, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetBranch(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposUpdateBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposUpdateBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposDeleteBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposDeleteBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetAdminBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposSetAdminBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposSetAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposDeleteAdminBranchProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposDeleteAdminBranchProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetPullRequestReviewProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetPullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposDeletePullRequestReviewProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposDeletePullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposUpdatePullRequestReviewProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposUpdatePullRequestReviewProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetCommitSignatureProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposCreateCommitSignatureProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposCreateCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposDeleteCommitSignatureProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposDeleteCommitSignatureProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetStatusChecksProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetStatusChecksProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRemoveStatusCheckProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRemoveStatusCheckProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposUpdateStatusCheckProtection(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposUpdateStatusCheckProtection($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetAllStatusCheckContexts(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetAllStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposSetStatusCheckContexts(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposSetStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposAddStatusCheckContexts(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposAddStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRemoveStatusCheckContexts(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRemoveStatusCheckContexts($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposDeleteAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposDeleteAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetAppsWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetAppsWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposSetAppAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposSetAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposAddAppAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposAddAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRemoveAppAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRemoveAppAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetTeamsWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetTeamsWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposSetTeamAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposSetTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposAddTeamAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposAddTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRemoveTeamAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRemoveTeamAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposGetUsersWithAccessToProtectedBranch(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposGetUsersWithAccessToProtectedBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposSetUserAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposSetUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposAddUserAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposAddUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRemoveUserAccessRestrictions(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRemoveUserAccessRestrictions($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function reposRenameBranch(string $owner, string $repo, string $branch): Response
    {
        return $this->connector->send(new ReposRenameBranch($owner, $repo, $branch));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref A branch, tag or commit name used to determine which version of the CODEOWNERS file to use. Default: the repository's default branch (e.g. `main`)
     */
    public function reposCodeownersErrors(string $owner, string $repo, ?string $ref): Response
    {
        return $this->connector->send(new ReposCodeownersErrors($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $affiliation Filter collaborators returned by their affiliation. `outside` means all outside collaborators of an organization-owned repository. `direct` means all collaborators with permissions to an organization-owned repository, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  string  $permission Filter collaborators by the permissions they have on the repository. If not specified, all collaborators will be returned.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCollaborators(
        string $owner,
        string $repo,
        ?string $affiliation,
        ?string $permission,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCollaborators($owner, $repo, $affiliation, $permission, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function reposCheckCollaborator(string $owner, string $repo, string $username): Response
    {
        return $this->connector->send(new ReposCheckCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function reposAddCollaborator(string $owner, string $repo, string $username): Response
    {
        return $this->connector->send(new ReposAddCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function reposRemoveCollaborator(string $owner, string $repo, string $username): Response
    {
        return $this->connector->send(new ReposRemoveCollaborator($owner, $repo, $username));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function reposGetCollaboratorPermissionLevel(string $owner, string $repo, string $username): Response
    {
        return $this->connector->send(new ReposGetCollaboratorPermissionLevel($owner, $repo, $username));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCommitCommentsForRepo(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListCommitCommentsForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reposGetCommitComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReposGetCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reposDeleteCommitComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReposDeleteCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reposUpdateCommitComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReposUpdateCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $sha SHA or branch to start listing commits from. Default: the repository’s default branch (usually `main`).
     * @param  string  $path Only commits containing this file path will be returned.
     * @param  string  $author GitHub username or email address to use to filter by commit author.
     * @param  string  $committer GitHub username or email address to use to filter by commit committer.
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $until Only commits before this date will be returned. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCommits(
        string $owner,
        string $repo,
        ?string $sha,
        ?string $path,
        ?string $author,
        ?string $committer,
        ?string $since,
        ?string $until,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCommits($owner, $repo, $sha, $path, $author, $committer, $since, $until, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     */
    public function reposListBranchesForHeadCommit(string $owner, string $repo, string $commitSha): Response
    {
        return $this->connector->send(new ReposListBranchesForHeadCommit($owner, $repo, $commitSha));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCommentsForCommit(string $owner, string $repo, string $commitSha, ?int $page): Response
    {
        return $this->connector->send(new ReposListCommentsForCommit($owner, $repo, $commitSha, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     */
    public function reposCreateCommitComment(string $owner, string $repo, string $commitSha): Response
    {
        return $this->connector->send(new ReposCreateCommitComment($owner, $repo, $commitSha));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListPullRequestsAssociatedWithCommit(
        string $owner,
        string $repo,
        string $commitSha,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListPullRequestsAssociatedWithCommit($owner, $repo, $commitSha, $page));
    }

    /**
     * @param string $owner The account owner of the repository. The name is not case-sensitive.
     * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param int|null $page Page number of the results to fetch.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function reposGetCommit(string $owner, string $repo, string $ref, ?int $page): Response
    {
        return $this->connector->send(new ReposGetCommit($owner, $repo, $ref, $page));
    }

    /**
     * @param string $owner The account owner of the repository. The name is not case-sensitive.
     * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param int|null $page Page number of the results to fetch.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function reposGetCommitSha(string $owner, string $repo, string $ref, ?int $page): Response
    {
        return $this->connector->send(new ReposGetCommitSha($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetCombinedStatusForRef(string $owner, string $repo, string $ref, ?int $page): Response
    {
        return $this->connector->send(new ReposGetCombinedStatusForRef($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCommitStatusesForRef(string $owner, string $repo, string $ref, ?int $page): Response
    {
        return $this->connector->send(new ReposListCommitStatusesForRef($owner, $repo, $ref, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetCommunityProfileMetrics(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetCommunityProfileMetrics($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $basehead The base branch and head branch to compare. This parameter expects the format `BASE...HEAD`. Both must be branch names in `repo`. To compare with a branch that exists in a different repository in the same network as `repo`, the `basehead` parameter expects the format `USERNAME:BASE...USERNAME:HEAD`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposCompareCommits(string $owner, string $repo, string $basehead, ?int $page): Response
    {
        return $this->connector->send(new ReposCompareCommits($owner, $repo, $basehead, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $path path parameter
     * @param  string  $ref The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function reposGetContent(string $owner, string $repo, string $path, ?string $ref): Response
    {
        return $this->connector->send(new ReposGetContent($owner, $repo, $path, $ref));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $path path parameter
     */
    public function reposCreateOrUpdateFileContents(string $owner, string $repo, string $path): Response
    {
        return $this->connector->send(new ReposCreateOrUpdateFileContents($owner, $repo, $path));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $path path parameter
     */
    public function reposDeleteFile(string $owner, string $repo, string $path): Response
    {
        return $this->connector->send(new ReposDeleteFile($owner, $repo, $path));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $anon Set to `1` or `true` to include anonymous contributors in results.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListContributors(string $owner, string $repo, ?string $anon, ?int $page): Response
    {
        return $this->connector->send(new ReposListContributors($owner, $repo, $anon, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $sha The SHA recorded at creation time.
     * @param  string  $ref The name of the ref. This can be a branch, tag, or SHA.
     * @param  string  $task The name of the task for the deployment (e.g., `deploy` or `deploy:migrations`).
     * @param  string  $environment The name of the environment that was deployed to (e.g., `staging` or `production`).
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListDeployments(
        string $owner,
        string $repo,
        ?string $sha,
        ?string $ref,
        ?string $task,
        ?string $environment,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListDeployments($owner, $repo, $sha, $ref, $task, $environment, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateDeployment(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateDeployment($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $deploymentId deployment_id parameter
     */
    public function reposGetDeployment(string $owner, string $repo, int $deploymentId): Response
    {
        return $this->connector->send(new ReposGetDeployment($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $deploymentId deployment_id parameter
     */
    public function reposDeleteDeployment(string $owner, string $repo, int $deploymentId): Response
    {
        return $this->connector->send(new ReposDeleteDeployment($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $deploymentId deployment_id parameter
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListDeploymentStatuses(string $owner, string $repo, int $deploymentId, ?int $page): Response
    {
        return $this->connector->send(new ReposListDeploymentStatuses($owner, $repo, $deploymentId, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $deploymentId deployment_id parameter
     */
    public function reposCreateDeploymentStatus(string $owner, string $repo, int $deploymentId): Response
    {
        return $this->connector->send(new ReposCreateDeploymentStatus($owner, $repo, $deploymentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $deploymentId deployment_id parameter
     */
    public function reposGetDeploymentStatus(string $owner, string $repo, int $deploymentId, int $statusId): Response
    {
        return $this->connector->send(new ReposGetDeploymentStatus($owner, $repo, $deploymentId, $statusId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateDispatchEvent(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateDispatchEvent($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetAllEnvironments(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposGetAllEnvironments($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function reposGetEnvironment(string $owner, string $repo, string $environmentName): Response
    {
        return $this->connector->send(new ReposGetEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function reposCreateOrUpdateEnvironment(string $owner, string $repo, string $environmentName): Response
    {
        return $this->connector->send(new ReposCreateOrUpdateEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function reposDeleteAnEnvironment(string $owner, string $repo, string $environmentName): Response
    {
        return $this->connector->send(new ReposDeleteAnEnvironment($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListDeploymentBranchPolicies(
        string $owner,
        string $repo,
        string $environmentName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListDeploymentBranchPolicies($owner, $repo, $environmentName, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function reposCreateDeploymentBranchPolicy(string $owner, string $repo, string $environmentName): Response
    {
        return $this->connector->send(new ReposCreateDeploymentBranchPolicy($owner, $repo, $environmentName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId The unique identifier of the branch policy.
     */
    public function reposGetDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposGetDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId The unique identifier of the branch policy.
     */
    public function reposUpdateDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposUpdateDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId The unique identifier of the branch policy.
     */
    public function reposDeleteDeploymentBranchPolicy(
        string $owner,
        string $repo,
        string $environmentName,
        int $branchPolicyId,
    ): Response {
        return $this->connector->send(new ReposDeleteDeploymentBranchPolicy($owner, $repo, $environmentName, $branchPolicyId));
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     */
    public function reposGetAllDeploymentProtectionRules(string $environmentName, string $repo, string $owner): Response
    {
        return $this->connector->send(new ReposGetAllDeploymentProtectionRules($environmentName, $repo, $owner));
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     */
    public function reposCreateDeploymentProtectionRule(string $environmentName, string $repo, string $owner): Response
    {
        return $this->connector->send(new ReposCreateDeploymentProtectionRule($environmentName, $repo, $owner));
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListCustomDeploymentRuleIntegrations(
        string $environmentName,
        string $repo,
        string $owner,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListCustomDeploymentRuleIntegrations($environmentName, $repo, $owner, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $protectionRuleId The unique identifier of the protection rule.
     */
    public function reposGetCustomDeploymentProtectionRule(
        string $owner,
        string $repo,
        string $environmentName,
        int $protectionRuleId,
    ): Response {
        return $this->connector->send(new ReposGetCustomDeploymentProtectionRule($owner, $repo, $environmentName, $protectionRuleId));
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  int  $protectionRuleId The unique identifier of the protection rule.
     */
    public function reposDisableDeploymentProtectionRule(
        string $environmentName,
        string $repo,
        string $owner,
        int $protectionRuleId,
    ): Response {
        return $this->connector->send(new ReposDisableDeploymentProtectionRule($environmentName, $repo, $owner, $protectionRuleId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $sort The sort order. `stargazers` will sort by star count.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListForks(string $owner, string $repo, ?string $sort, ?int $page): Response
    {
        return $this->connector->send(new ReposListForks($owner, $repo, $sort, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateFork(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateFork($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListWebhooks(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListWebhooks($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateWebhook(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateWebhook($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposGetWebhook(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposGetWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposDeleteWebhook(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposDeleteWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposUpdateWebhook(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposUpdateWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposGetWebhookConfigForRepo(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposGetWebhookConfigForRepo($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposUpdateWebhookConfigForRepo(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposUpdateWebhookConfigForRepo($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  string  $cursor Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function reposListWebhookDeliveries(
        string $owner,
        string $repo,
        int $hookId,
        ?string $cursor,
        ?bool $redelivery,
    ): Response {
        return $this->connector->send(new ReposListWebhookDeliveries($owner, $repo, $hookId, $cursor, $redelivery));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposGetWebhookDelivery(string $owner, string $repo, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new ReposGetWebhookDelivery($owner, $repo, $hookId, $deliveryId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposRedeliverWebhookDelivery(string $owner, string $repo, int $hookId, int $deliveryId): Response
    {
        return $this->connector->send(new ReposRedeliverWebhookDelivery($owner, $repo, $hookId, $deliveryId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposPingWebhook(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposPingWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function reposTestPushWebhook(string $owner, string $repo, int $hookId): Response
    {
        return $this->connector->send(new ReposTestPushWebhook($owner, $repo, $hookId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListInvitations(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListInvitations($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $invitationId The unique identifier of the invitation.
     */
    public function reposDeleteInvitation(string $owner, string $repo, int $invitationId): Response
    {
        return $this->connector->send(new ReposDeleteInvitation($owner, $repo, $invitationId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $invitationId The unique identifier of the invitation.
     */
    public function reposUpdateInvitation(string $owner, string $repo, int $invitationId): Response
    {
        return $this->connector->send(new ReposUpdateInvitation($owner, $repo, $invitationId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListDeployKeys(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListDeployKeys($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateDeployKey(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateDeployKey($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $keyId The unique identifier of the key.
     */
    public function reposGetDeployKey(string $owner, string $repo, int $keyId): Response
    {
        return $this->connector->send(new ReposGetDeployKey($owner, $repo, $keyId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $keyId The unique identifier of the key.
     */
    public function reposDeleteDeployKey(string $owner, string $repo, int $keyId): Response
    {
        return $this->connector->send(new ReposDeleteDeployKey($owner, $repo, $keyId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposListLanguages(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposListLanguages($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposMergeUpstream(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposMergeUpstream($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposMerge(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposMerge($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetPages(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetPages($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposUpdateInformationAboutPagesSite(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposUpdateInformationAboutPagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreatePagesSite(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreatePagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDeletePagesSite(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposDeletePagesSite($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListPagesBuilds(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListPagesBuilds($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposRequestPagesBuild(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposRequestPagesBuild($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetLatestPagesBuild(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetLatestPagesBuild($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetPagesBuild(string $owner, string $repo, int $buildId): Response
    {
        return $this->connector->send(new ReposGetPagesBuild($owner, $repo, $buildId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreatePagesDeployment(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreatePagesDeployment($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetPagesHealthCheck(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetPagesHealthCheck($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposEnablePrivateVulnerabilityReporting(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposEnablePrivateVulnerabilityReporting($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDisablePrivateVulnerabilityReporting(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposDisablePrivateVulnerabilityReporting($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetCustomPropertiesValues(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetCustomPropertiesValues($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function reposGetReadme(string $owner, string $repo, ?string $ref): Response
    {
        return $this->connector->send(new ReposGetReadme($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $dir The alternate path to look for a README file
     * @param  string  $ref The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function reposGetReadmeInDirectory(string $owner, string $repo, string $dir, ?string $ref): Response
    {
        return $this->connector->send(new ReposGetReadmeInDirectory($owner, $repo, $dir, $ref));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListReleases(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListReleases($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateRelease(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateRelease($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $assetId The unique identifier of the asset.
     */
    public function reposGetReleaseAsset(string $owner, string $repo, int $assetId): Response
    {
        return $this->connector->send(new ReposGetReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $assetId The unique identifier of the asset.
     */
    public function reposDeleteReleaseAsset(string $owner, string $repo, int $assetId): Response
    {
        return $this->connector->send(new ReposDeleteReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $assetId The unique identifier of the asset.
     */
    public function reposUpdateReleaseAsset(string $owner, string $repo, int $assetId): Response
    {
        return $this->connector->send(new ReposUpdateReleaseAsset($owner, $repo, $assetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGenerateReleaseNotes(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGenerateReleaseNotes($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetLatestRelease(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetLatestRelease($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $tag tag parameter
     */
    public function reposGetReleaseByTag(string $owner, string $repo, string $tag): Response
    {
        return $this->connector->send(new ReposGetReleaseByTag($owner, $repo, $tag));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     */
    public function reposGetRelease(string $owner, string $repo, int $releaseId): Response
    {
        return $this->connector->send(new ReposGetRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     */
    public function reposDeleteRelease(string $owner, string $repo, int $releaseId): Response
    {
        return $this->connector->send(new ReposDeleteRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     */
    public function reposUpdateRelease(string $owner, string $repo, int $releaseId): Response
    {
        return $this->connector->send(new ReposUpdateRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListReleaseAssets(string $owner, string $repo, int $releaseId, ?int $page): Response
    {
        return $this->connector->send(new ReposListReleaseAssets($owner, $repo, $releaseId, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     */
    public function reposUploadReleaseAsset(
        string $owner,
        string $repo,
        int $releaseId,
        string $name,
        ?string $label,
    ): Response {
        return $this->connector->send(new ReposUploadReleaseAsset($owner, $repo, $releaseId, $name, $label));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetBranchRules(string $owner, string $repo, string $branch, ?int $page): Response
    {
        return $this->connector->send(new ReposGetBranchRules($owner, $repo, $branch, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     * @param  bool  $includesParents Include rulesets configured at higher levels that apply to this repository
     */
    public function reposGetRepoRulesets(string $owner, string $repo, ?int $page, ?bool $includesParents): Response
    {
        return $this->connector->send(new ReposGetRepoRulesets($owner, $repo, $page, $includesParents));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateRepoRuleset(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateRepoRuleset($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The name of the ref. Cannot contain wildcard characters. When specified, only rule evaluations triggered for this ref will be returned.
     * @param  string  $timePeriod The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  string  $actorName The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  string  $ruleSuiteResult The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetRepoRuleSuites(
        string $owner,
        string $repo,
        ?string $ref,
        ?string $timePeriod,
        ?string $actorName,
        ?string $ruleSuiteResult,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposGetRepoRuleSuites($owner, $repo, $ref, $timePeriod, $actorName, $ruleSuiteResult, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $ruleSuiteId The unique identifier of the rule suite result.
     * To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     * for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     * for organizations.
     */
    public function reposGetRepoRuleSuite(string $owner, string $repo, int $ruleSuiteId): Response
    {
        return $this->connector->send(new ReposGetRepoRuleSuite($owner, $repo, $ruleSuiteId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     * @param  bool  $includesParents Include rulesets configured at higher levels that apply to this repository
     */
    public function reposGetRepoRuleset(string $owner, string $repo, int $rulesetId, ?bool $includesParents): Response
    {
        return $this->connector->send(new ReposGetRepoRuleset($owner, $repo, $rulesetId, $includesParents));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     */
    public function reposUpdateRepoRuleset(string $owner, string $repo, int $rulesetId): Response
    {
        return $this->connector->send(new ReposUpdateRepoRuleset($owner, $repo, $rulesetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $rulesetId The ID of the ruleset.
     */
    public function reposDeleteRepoRuleset(string $owner, string $repo, int $rulesetId): Response
    {
        return $this->connector->send(new ReposDeleteRepoRuleset($owner, $repo, $rulesetId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetCodeFrequencyStats(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetCodeFrequencyStats($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetCommitActivityStats(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetCommitActivityStats($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetContributorsStats(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetContributorsStats($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetParticipationStats(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetParticipationStats($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetPunchCardStats(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetPunchCardStats($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function reposCreateCommitStatus(
        string $owner,
        string $repo,
        string $sha,
        CommitStatus $status,
        string $context = 'default',
        ?string $description = null,
        ?string $targetUrl = null,
    ): Response {
        return $this->connector->send(new ReposCreateCommitStatus($owner, $repo, $sha, $status, $context, $description, $targetUrl));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListTags(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListTags($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposListTagProtection(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposListTagProtection($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateTagProtection(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCreateTagProtection($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $tagProtectionId The unique identifier of the tag protection.
     */
    public function reposDeleteTagProtection(string $owner, string $repo, int $tagProtectionId): Response
    {
        return $this->connector->send(new ReposDeleteTagProtection($owner, $repo, $tagProtectionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDownloadTarballArchive(string $owner, string $repo, string $ref): Response
    {
        return $this->connector->send(new ReposDownloadTarballArchive($owner, $repo, $ref));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListTeams(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposListTeams($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposGetAllTopics(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ReposGetAllTopics($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposReplaceAllTopics(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposReplaceAllTopics($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $per The time frame to display results for.
     */
    public function reposGetClones(string $owner, string $repo, ?string $per): Response
    {
        return $this->connector->send(new ReposGetClones($owner, $repo, $per));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetTopPaths(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetTopPaths($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposGetTopReferrers(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposGetTopReferrers($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $per The time frame to display results for.
     */
    public function reposGetViews(string $owner, string $repo, ?string $per): Response
    {
        return $this->connector->send(new ReposGetViews($owner, $repo, $per));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposTransfer(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposTransfer($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCheckVulnerabilityAlerts(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposCheckVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposEnableVulnerabilityAlerts(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposEnableVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDisableVulnerabilityAlerts(string $owner, string $repo): Response
    {
        return $this->connector->send(new ReposDisableVulnerabilityAlerts($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposDownloadZipballArchive(string $owner, string $repo, string $ref): Response
    {
        return $this->connector->send(new ReposDownloadZipballArchive($owner, $repo, $ref));
    }

    /**
     * @param  string  $templateOwner The account owner of the template repository. The name is not case-sensitive.
     * @param  string  $templateRepo The name of the template repository without the `.git` extension. The name is not case-sensitive.
     */
    public function reposCreateUsingTemplate(string $templateOwner, string $templateRepo): Response
    {
        return $this->connector->send(new ReposCreateUsingTemplate($templateOwner, $templateRepo));
    }

    /**
     * @param  int  $since A repository ID. Only return repositories with an ID greater than this ID.
     */
    public function reposListPublic(?int $since): Response
    {
        return $this->connector->send(new ReposListPublic($since));
    }

    /**
     * @param  string  $visibility Limit results to repositories with the specified visibility.
     * @param  string  $affiliation Comma-separated list of values. Can include:
     *  * `owner`: Repositories that are owned by the authenticated user.
     *  * `collaborator`: Repositories that the user has been added to as a collaborator.
     *  * `organization_member`: Repositories that the user has access to through being a member of an organization. This includes every repository on every team that the user is on.
     * @param  string  $type Limit results to repositories of the specified type. Will cause a `422` error if used in the same request as **visibility** or **affiliation**.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $direction The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $since Only show repositories updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $before Only show repositories updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function reposListForAuthenticatedUser(
        ?string $visibility,
        ?string $affiliation,
        ?string $type,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $since,
        ?string $before,
    ): Response {
        return $this->connector->send(new ReposListForAuthenticatedUser($visibility, $affiliation, $type, $sort, $direction, $page, $since, $before));
    }

    public function reposCreateForAuthenticatedUser(): Response
    {
        return $this->connector->send(new ReposCreateForAuthenticatedUser());
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListInvitationsForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new ReposListInvitationsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $invitationId The unique identifier of the invitation.
     */
    public function reposDeclineInvitationForAuthenticatedUser(int $invitationId): Response
    {
        return $this->connector->send(new ReposDeclineInvitationForAuthenticatedUser($invitationId));
    }

    /**
     * @param  int  $invitationId The unique identifier of the invitation.
     */
    public function reposAcceptInvitationForAuthenticatedUser(int $invitationId): Response
    {
        return $this->connector->send(new ReposAcceptInvitationForAuthenticatedUser($invitationId));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $type Limit results to repositories of the specified type.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $direction The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reposListForUser(
        string $username,
        ?string $type,
        ?string $sort,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReposListForUser($username, $type, $sort, $direction, $page));
    }
}
