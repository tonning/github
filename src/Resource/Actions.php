<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Actions\ActionsAddCustomLabelsToSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsAddCustomLabelsToSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsAddSelectedRepoToOrgSecret;
use Tonning\Github\Requests\Actions\ActionsAddSelectedRepoToOrgVariable;
use Tonning\Github\Requests\Actions\ActionsApproveWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsCancelWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsCreateEnvironmentVariable;
use Tonning\Github\Requests\Actions\ActionsCreateOrUpdateEnvironmentSecret;
use Tonning\Github\Requests\Actions\ActionsCreateOrUpdateOrgSecret;
use Tonning\Github\Requests\Actions\ActionsCreateOrUpdateRepoSecret;
use Tonning\Github\Requests\Actions\ActionsCreateOrgVariable;
use Tonning\Github\Requests\Actions\ActionsCreateRegistrationTokenForOrg;
use Tonning\Github\Requests\Actions\ActionsCreateRegistrationTokenForRepo;
use Tonning\Github\Requests\Actions\ActionsCreateRemoveTokenForOrg;
use Tonning\Github\Requests\Actions\ActionsCreateRemoveTokenForRepo;
use Tonning\Github\Requests\Actions\ActionsCreateRepoVariable;
use Tonning\Github\Requests\Actions\ActionsCreateWorkflowDispatch;
use Tonning\Github\Requests\Actions\ActionsDeleteActionsCacheById;
use Tonning\Github\Requests\Actions\ActionsDeleteActionsCacheByKey;
use Tonning\Github\Requests\Actions\ActionsDeleteArtifact;
use Tonning\Github\Requests\Actions\ActionsDeleteEnvironmentSecret;
use Tonning\Github\Requests\Actions\ActionsDeleteEnvironmentVariable;
use Tonning\Github\Requests\Actions\ActionsDeleteOrgSecret;
use Tonning\Github\Requests\Actions\ActionsDeleteOrgVariable;
use Tonning\Github\Requests\Actions\ActionsDeleteRepoSecret;
use Tonning\Github\Requests\Actions\ActionsDeleteRepoVariable;
use Tonning\Github\Requests\Actions\ActionsDeleteSelfHostedRunnerFromOrg;
use Tonning\Github\Requests\Actions\ActionsDeleteSelfHostedRunnerFromRepo;
use Tonning\Github\Requests\Actions\ActionsDeleteWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsDeleteWorkflowRunLogs;
use Tonning\Github\Requests\Actions\ActionsDisableSelectedRepositoryGithubActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsDisableWorkflow;
use Tonning\Github\Requests\Actions\ActionsDownloadArtifact;
use Tonning\Github\Requests\Actions\ActionsDownloadJobLogsForWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsDownloadWorkflowRunAttemptLogs;
use Tonning\Github\Requests\Actions\ActionsDownloadWorkflowRunLogs;
use Tonning\Github\Requests\Actions\ActionsEnableSelectedRepositoryGithubActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsEnableWorkflow;
use Tonning\Github\Requests\Actions\ActionsForceCancelWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsGenerateRunnerJitconfigForOrg;
use Tonning\Github\Requests\Actions\ActionsGenerateRunnerJitconfigForRepo;
use Tonning\Github\Requests\Actions\ActionsGetActionsCacheList;
use Tonning\Github\Requests\Actions\ActionsGetActionsCacheUsage;
use Tonning\Github\Requests\Actions\ActionsGetActionsCacheUsageByRepoForOrg;
use Tonning\Github\Requests\Actions\ActionsGetActionsCacheUsageForOrg;
use Tonning\Github\Requests\Actions\ActionsGetAllowedActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsGetAllowedActionsRepository;
use Tonning\Github\Requests\Actions\ActionsGetArtifact;
use Tonning\Github\Requests\Actions\ActionsGetCustomOidcSubClaimForRepo;
use Tonning\Github\Requests\Actions\ActionsGetEnvironmentPublicKey;
use Tonning\Github\Requests\Actions\ActionsGetEnvironmentSecret;
use Tonning\Github\Requests\Actions\ActionsGetEnvironmentVariable;
use Tonning\Github\Requests\Actions\ActionsGetGithubActionsDefaultWorkflowPermissionsOrganization;
use Tonning\Github\Requests\Actions\ActionsGetGithubActionsDefaultWorkflowPermissionsRepository;
use Tonning\Github\Requests\Actions\ActionsGetGithubActionsPermissionsOrganization;
use Tonning\Github\Requests\Actions\ActionsGetGithubActionsPermissionsRepository;
use Tonning\Github\Requests\Actions\ActionsGetJobForWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsGetOrgPublicKey;
use Tonning\Github\Requests\Actions\ActionsGetOrgSecret;
use Tonning\Github\Requests\Actions\ActionsGetOrgVariable;
use Tonning\Github\Requests\Actions\ActionsGetPendingDeploymentsForRun;
use Tonning\Github\Requests\Actions\ActionsGetRepoPublicKey;
use Tonning\Github\Requests\Actions\ActionsGetRepoSecret;
use Tonning\Github\Requests\Actions\ActionsGetRepoVariable;
use Tonning\Github\Requests\Actions\ActionsGetReviewsForRun;
use Tonning\Github\Requests\Actions\ActionsGetSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsGetSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsGetWorkflow;
use Tonning\Github\Requests\Actions\ActionsGetWorkflowAccessToRepository;
use Tonning\Github\Requests\Actions\ActionsGetWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsGetWorkflowRunAttempt;
use Tonning\Github\Requests\Actions\ActionsGetWorkflowRunUsage;
use Tonning\Github\Requests\Actions\ActionsGetWorkflowUsage;
use Tonning\Github\Requests\Actions\ActionsListArtifactsForRepo;
use Tonning\Github\Requests\Actions\ActionsListEnvironmentSecrets;
use Tonning\Github\Requests\Actions\ActionsListEnvironmentVariables;
use Tonning\Github\Requests\Actions\ActionsListJobsForWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsListJobsForWorkflowRunAttempt;
use Tonning\Github\Requests\Actions\ActionsListLabelsForSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsListLabelsForSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsListOrgSecrets;
use Tonning\Github\Requests\Actions\ActionsListOrgVariables;
use Tonning\Github\Requests\Actions\ActionsListRepoOrganizationSecrets;
use Tonning\Github\Requests\Actions\ActionsListRepoOrganizationVariables;
use Tonning\Github\Requests\Actions\ActionsListRepoSecrets;
use Tonning\Github\Requests\Actions\ActionsListRepoVariables;
use Tonning\Github\Requests\Actions\ActionsListRepoWorkflows;
use Tonning\Github\Requests\Actions\ActionsListRunnerApplicationsForOrg;
use Tonning\Github\Requests\Actions\ActionsListRunnerApplicationsForRepo;
use Tonning\Github\Requests\Actions\ActionsListSelectedReposForOrgSecret;
use Tonning\Github\Requests\Actions\ActionsListSelectedReposForOrgVariable;
use Tonning\Github\Requests\Actions\ActionsListSelectedRepositoriesEnabledGithubActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsListSelfHostedRunnersForOrg;
use Tonning\Github\Requests\Actions\ActionsListSelfHostedRunnersForRepo;
use Tonning\Github\Requests\Actions\ActionsListWorkflowRunArtifacts;
use Tonning\Github\Requests\Actions\ActionsListWorkflowRuns;
use Tonning\Github\Requests\Actions\ActionsListWorkflowRunsForRepo;
use Tonning\Github\Requests\Actions\ActionsReRunJobForWorkflowRun;
use Tonning\Github\Requests\Actions\ActionsReRunWorkflow;
use Tonning\Github\Requests\Actions\ActionsReRunWorkflowFailedJobs;
use Tonning\Github\Requests\Actions\ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsRemoveCustomLabelFromSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsRemoveCustomLabelFromSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsRemoveSelectedRepoFromOrgSecret;
use Tonning\Github\Requests\Actions\ActionsRemoveSelectedRepoFromOrgVariable;
use Tonning\Github\Requests\Actions\ActionsReviewCustomGatesForRun;
use Tonning\Github\Requests\Actions\ActionsReviewPendingDeploymentsForRun;
use Tonning\Github\Requests\Actions\ActionsSetAllowedActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsSetAllowedActionsRepository;
use Tonning\Github\Requests\Actions\ActionsSetCustomLabelsForSelfHostedRunnerForOrg;
use Tonning\Github\Requests\Actions\ActionsSetCustomLabelsForSelfHostedRunnerForRepo;
use Tonning\Github\Requests\Actions\ActionsSetCustomOidcSubClaimForRepo;
use Tonning\Github\Requests\Actions\ActionsSetGithubActionsDefaultWorkflowPermissionsOrganization;
use Tonning\Github\Requests\Actions\ActionsSetGithubActionsDefaultWorkflowPermissionsRepository;
use Tonning\Github\Requests\Actions\ActionsSetGithubActionsPermissionsOrganization;
use Tonning\Github\Requests\Actions\ActionsSetGithubActionsPermissionsRepository;
use Tonning\Github\Requests\Actions\ActionsSetSelectedReposForOrgSecret;
use Tonning\Github\Requests\Actions\ActionsSetSelectedReposForOrgVariable;
use Tonning\Github\Requests\Actions\ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization;
use Tonning\Github\Requests\Actions\ActionsSetWorkflowAccessToRepository;
use Tonning\Github\Requests\Actions\ActionsUpdateEnvironmentVariable;
use Tonning\Github\Requests\Actions\ActionsUpdateOrgVariable;
use Tonning\Github\Requests\Actions\ActionsUpdateRepoVariable;
use Tonning\Github\Resource;

class Actions extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGetActionsCacheUsageForOrg(string $org): Response
	{
		return $this->connector->send(new ActionsGetActionsCacheUsageForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsGetActionsCacheUsageByRepoForOrg(string $org, ?int $page): Response
	{
		return $this->connector->send(new ActionsGetActionsCacheUsageByRepoForOrg($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGetGithubActionsPermissionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsGetGithubActionsPermissionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsSetGithubActionsPermissionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsSetGithubActionsPermissionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListSelectedRepositoriesEnabledGithubActionsOrganization(string $org, ?int $page): Response
	{
		return $this->connector->send(new ActionsListSelectedRepositoriesEnabledGithubActionsOrganization($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsSetSelectedRepositoriesEnabledGithubActionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $repositoryId The unique identifier of the repository.
	 */
	public function actionsEnableSelectedRepositoryGithubActionsOrganization(string $org, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsEnableSelectedRepositoryGithubActionsOrganization($org, $repositoryId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $repositoryId The unique identifier of the repository.
	 */
	public function actionsDisableSelectedRepositoryGithubActionsOrganization(string $org, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsDisableSelectedRepositoryGithubActionsOrganization($org, $repositoryId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGetAllowedActionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsGetAllowedActionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsSetAllowedActionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsSetAllowedActionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGetGithubActionsDefaultWorkflowPermissionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsGetGithubActionsDefaultWorkflowPermissionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsSetGithubActionsDefaultWorkflowPermissionsOrganization(string $org): Response
	{
		return $this->connector->send(new ActionsSetGithubActionsDefaultWorkflowPermissionsOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of a self-hosted runner.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListSelfHostedRunnersForOrg(string $org, ?string $name, ?int $page): Response
	{
		return $this->connector->send(new ActionsListSelfHostedRunnersForOrg($org, $name, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsListRunnerApplicationsForOrg(string $org): Response
	{
		return $this->connector->send(new ActionsListRunnerApplicationsForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGenerateRunnerJitconfigForOrg(string $org): Response
	{
		return $this->connector->send(new ActionsGenerateRunnerJitconfigForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsCreateRegistrationTokenForOrg(string $org): Response
	{
		return $this->connector->send(new ActionsCreateRegistrationTokenForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsCreateRemoveTokenForOrg(string $org): Response
	{
		return $this->connector->send(new ActionsCreateRemoveTokenForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsGetSelfHostedRunnerForOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsGetSelfHostedRunnerForOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsDeleteSelfHostedRunnerFromOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsDeleteSelfHostedRunnerFromOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsListLabelsForSelfHostedRunnerForOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsListLabelsForSelfHostedRunnerForOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsSetCustomLabelsForSelfHostedRunnerForOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsSetCustomLabelsForSelfHostedRunnerForOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsAddCustomLabelsToSelfHostedRunnerForOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsAddCustomLabelsToSelfHostedRunnerForOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg(string $org, int $runnerId): Response
	{
		return $this->connector->send(new ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg($org, $runnerId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 * @param string $name The name of a self-hosted runner's custom label.
	 */
	public function actionsRemoveCustomLabelFromSelfHostedRunnerForOrg(
		string $org,
		int $runnerId,
		string $name,
	): Response
	{
		return $this->connector->send(new ActionsRemoveCustomLabelFromSelfHostedRunnerForOrg($org, $runnerId, $name));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListOrgSecrets(string $org, ?int $page): Response
	{
		return $this->connector->send(new ActionsListOrgSecrets($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsGetOrgPublicKey(string $org): Response
	{
		return $this->connector->send(new ActionsGetOrgPublicKey($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsGetOrgSecret(string $org, string $secretName): Response
	{
		return $this->connector->send(new ActionsGetOrgSecret($org, $secretName));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsCreateOrUpdateOrgSecret(string $org, string $secretName): Response
	{
		return $this->connector->send(new ActionsCreateOrUpdateOrgSecret($org, $secretName));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsDeleteOrgSecret(string $org, string $secretName): Response
	{
		return $this->connector->send(new ActionsDeleteOrgSecret($org, $secretName));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListSelectedReposForOrgSecret(string $org, string $secretName, ?int $page): Response
	{
		return $this->connector->send(new ActionsListSelectedReposForOrgSecret($org, $secretName, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsSetSelectedReposForOrgSecret(string $org, string $secretName): Response
	{
		return $this->connector->send(new ActionsSetSelectedReposForOrgSecret($org, $secretName));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 * @param int $repositoryId
	 */
	public function actionsAddSelectedRepoToOrgSecret(string $org, string $secretName, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsAddSelectedRepoToOrgSecret($org, $secretName, $repositoryId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 * @param int $repositoryId
	 */
	public function actionsRemoveSelectedRepoFromOrgSecret(string $org, string $secretName, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsRemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListOrgVariables(string $org, ?int $page): Response
	{
		return $this->connector->send(new ActionsListOrgVariables($org, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function actionsCreateOrgVariable(string $org): Response
	{
		return $this->connector->send(new ActionsCreateOrgVariable($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsGetOrgVariable(string $org, string $name): Response
	{
		return $this->connector->send(new ActionsGetOrgVariable($org, $name));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsDeleteOrgVariable(string $org, string $name): Response
	{
		return $this->connector->send(new ActionsDeleteOrgVariable($org, $name));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsUpdateOrgVariable(string $org, string $name): Response
	{
		return $this->connector->send(new ActionsUpdateOrgVariable($org, $name));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListSelectedReposForOrgVariable(string $org, string $name, ?int $page): Response
	{
		return $this->connector->send(new ActionsListSelectedReposForOrgVariable($org, $name, $page));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsSetSelectedReposForOrgVariable(string $org, string $name): Response
	{
		return $this->connector->send(new ActionsSetSelectedReposForOrgVariable($org, $name));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 * @param int $repositoryId
	 */
	public function actionsAddSelectedRepoToOrgVariable(string $org, string $name, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsAddSelectedRepoToOrgVariable($org, $name, $repositoryId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 * @param int $repositoryId
	 */
	public function actionsRemoveSelectedRepoFromOrgVariable(string $org, string $name, int $repositoryId): Response
	{
		return $this->connector->send(new ActionsRemoveSelectedRepoFromOrgVariable($org, $name, $repositoryId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 * @param string $name The name field of an artifact. When specified, only artifacts with this name will be returned.
	 */
	public function actionsListArtifactsForRepo(string $owner, string $repo, ?int $page, ?string $name): Response
	{
		return $this->connector->send(new ActionsListArtifactsForRepo($owner, $repo, $page, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $artifactId The unique identifier of the artifact.
	 */
	public function actionsGetArtifact(string $owner, string $repo, int $artifactId): Response
	{
		return $this->connector->send(new ActionsGetArtifact($owner, $repo, $artifactId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $artifactId The unique identifier of the artifact.
	 */
	public function actionsDeleteArtifact(string $owner, string $repo, int $artifactId): Response
	{
		return $this->connector->send(new ActionsDeleteArtifact($owner, $repo, $artifactId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $artifactId The unique identifier of the artifact.
	 * @param string $archiveFormat
	 */
	public function actionsDownloadArtifact(
		string $owner,
		string $repo,
		int $artifactId,
		string $archiveFormat,
	): Response
	{
		return $this->connector->send(new ActionsDownloadArtifact($owner, $repo, $artifactId, $archiveFormat));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetActionsCacheUsage(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetActionsCacheUsage($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 * @param string $ref The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 * @param string $key An explicit key or prefix for identifying the cache
	 * @param string $sort The property to sort the results by. `created_at` means when the cache was created. `last_accessed_at` means when the cache was last accessed. `size_in_bytes` is the size of the cache in bytes.
	 * @param string $direction The direction to sort the results by.
	 */
	public function actionsGetActionsCacheList(
		string $owner,
		string $repo,
		?int $page,
		?string $ref,
		?string $key,
		?string $sort,
		?string $direction,
	): Response
	{
		return $this->connector->send(new ActionsGetActionsCacheList($owner, $repo, $page, $ref, $key, $sort, $direction));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $key A key for identifying the cache.
	 * @param string $ref The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 */
	public function actionsDeleteActionsCacheByKey(string $owner, string $repo, string $key, ?string $ref): Response
	{
		return $this->connector->send(new ActionsDeleteActionsCacheByKey($owner, $repo, $key, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $cacheId The unique identifier of the GitHub Actions cache.
	 */
	public function actionsDeleteActionsCacheById(string $owner, string $repo, int $cacheId): Response
	{
		return $this->connector->send(new ActionsDeleteActionsCacheById($owner, $repo, $cacheId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $jobId The unique identifier of the job.
	 */
	public function actionsGetJobForWorkflowRun(string $owner, string $repo, int $jobId): Response
	{
		return $this->connector->send(new ActionsGetJobForWorkflowRun($owner, $repo, $jobId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $jobId The unique identifier of the job.
	 */
	public function actionsDownloadJobLogsForWorkflowRun(string $owner, string $repo, int $jobId): Response
	{
		return $this->connector->send(new ActionsDownloadJobLogsForWorkflowRun($owner, $repo, $jobId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $jobId The unique identifier of the job.
	 */
	public function actionsReRunJobForWorkflowRun(string $owner, string $repo, int $jobId): Response
	{
		return $this->connector->send(new ActionsReRunJobForWorkflowRun($owner, $repo, $jobId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetCustomOidcSubClaimForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetCustomOidcSubClaimForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsSetCustomOidcSubClaimForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsSetCustomOidcSubClaimForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListRepoOrganizationSecrets(string $owner, string $repo, ?int $page): Response
	{
		return $this->connector->send(new ActionsListRepoOrganizationSecrets($owner, $repo, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListRepoOrganizationVariables(string $owner, string $repo, ?int $page): Response
	{
		return $this->connector->send(new ActionsListRepoOrganizationVariables($owner, $repo, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetGithubActionsPermissionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetGithubActionsPermissionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsSetGithubActionsPermissionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsSetGithubActionsPermissionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetWorkflowAccessToRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetWorkflowAccessToRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsSetWorkflowAccessToRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsSetWorkflowAccessToRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetAllowedActionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetAllowedActionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsSetAllowedActionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsSetAllowedActionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetGithubActionsDefaultWorkflowPermissionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetGithubActionsDefaultWorkflowPermissionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsSetGithubActionsDefaultWorkflowPermissionsRepository(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsSetGithubActionsDefaultWorkflowPermissionsRepository($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $name The name of a self-hosted runner.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListSelfHostedRunnersForRepo(string $owner, string $repo, ?string $name, ?int $page): Response
	{
		return $this->connector->send(new ActionsListSelfHostedRunnersForRepo($owner, $repo, $name, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsListRunnerApplicationsForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsListRunnerApplicationsForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGenerateRunnerJitconfigForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGenerateRunnerJitconfigForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsCreateRegistrationTokenForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsCreateRegistrationTokenForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsCreateRemoveTokenForRepo(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsCreateRemoveTokenForRepo($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsGetSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response
	{
		return $this->connector->send(new ActionsGetSelfHostedRunnerForRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsDeleteSelfHostedRunnerFromRepo(string $owner, string $repo, int $runnerId): Response
	{
		return $this->connector->send(new ActionsDeleteSelfHostedRunnerFromRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsListLabelsForSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response
	{
		return $this->connector->send(new ActionsListLabelsForSelfHostedRunnerForRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsSetCustomLabelsForSelfHostedRunnerForRepo(
		string $owner,
		string $repo,
		int $runnerId,
	): Response
	{
		return $this->connector->send(new ActionsSetCustomLabelsForSelfHostedRunnerForRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsAddCustomLabelsToSelfHostedRunnerForRepo(string $owner, string $repo, int $runnerId): Response
	{
		return $this->connector->send(new ActionsAddCustomLabelsToSelfHostedRunnerForRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function actionsRemoveAllCustomLabelsFromSelfHostedRunnerForRepo(
		string $owner,
		string $repo,
		int $runnerId,
	): Response
	{
		return $this->connector->send(new ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForRepo($owner, $repo, $runnerId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 * @param string $name The name of a self-hosted runner's custom label.
	 */
	public function actionsRemoveCustomLabelFromSelfHostedRunnerForRepo(
		string $owner,
		string $repo,
		int $runnerId,
		string $name,
	): Response
	{
		return $this->connector->send(new ActionsRemoveCustomLabelFromSelfHostedRunnerForRepo($owner, $repo, $runnerId, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $actor Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
	 * @param string $branch Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
	 * @param string $event Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
	 * @param string $status Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub can set a status of `waiting` or `requested`.
	 * @param int $page Page number of the results to fetch.
	 * @param string $created Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
	 * @param bool $excludePullRequests If `true` pull requests are omitted from the response (empty array).
	 * @param int $checkSuiteId Returns workflow runs with the `check_suite_id` that you specify.
	 * @param string $headSha Only returns workflow runs that are associated with the specified `head_sha`.
	 */
	public function actionsListWorkflowRunsForRepo(
		string $owner,
		string $repo,
		?string $actor,
		?string $branch,
		?string $event,
		?string $status,
		?int $page,
		?string $created,
		?bool $excludePullRequests,
		?int $checkSuiteId,
		?string $headSha,
	): Response
	{
		return $this->connector->send(new ActionsListWorkflowRunsForRepo($owner, $repo, $actor, $branch, $event, $status, $page, $created, $excludePullRequests, $checkSuiteId, $headSha));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param bool $excludePullRequests If `true` pull requests are omitted from the response (empty array).
	 */
	public function actionsGetWorkflowRun(string $owner, string $repo, int $runId, ?bool $excludePullRequests): Response
	{
		return $this->connector->send(new ActionsGetWorkflowRun($owner, $repo, $runId, $excludePullRequests));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsDeleteWorkflowRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsDeleteWorkflowRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsGetReviewsForRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsGetReviewsForRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsApproveWorkflowRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsApproveWorkflowRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param int $page Page number of the results to fetch.
	 * @param string $name The name field of an artifact. When specified, only artifacts with this name will be returned.
	 */
	public function actionsListWorkflowRunArtifacts(
		string $owner,
		string $repo,
		int $runId,
		?int $page,
		?string $name,
	): Response
	{
		return $this->connector->send(new ActionsListWorkflowRunArtifacts($owner, $repo, $runId, $page, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param int $attemptNumber The attempt number of the workflow run.
	 * @param bool $excludePullRequests If `true` pull requests are omitted from the response (empty array).
	 */
	public function actionsGetWorkflowRunAttempt(
		string $owner,
		string $repo,
		int $runId,
		int $attemptNumber,
		?bool $excludePullRequests,
	): Response
	{
		return $this->connector->send(new ActionsGetWorkflowRunAttempt($owner, $repo, $runId, $attemptNumber, $excludePullRequests));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param int $attemptNumber The attempt number of the workflow run.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListJobsForWorkflowRunAttempt(
		string $owner,
		string $repo,
		int $runId,
		int $attemptNumber,
		?int $page,
	): Response
	{
		return $this->connector->send(new ActionsListJobsForWorkflowRunAttempt($owner, $repo, $runId, $attemptNumber, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param int $attemptNumber The attempt number of the workflow run.
	 */
	public function actionsDownloadWorkflowRunAttemptLogs(
		string $owner,
		string $repo,
		int $runId,
		int $attemptNumber,
	): Response
	{
		return $this->connector->send(new ActionsDownloadWorkflowRunAttemptLogs($owner, $repo, $runId, $attemptNumber));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsCancelWorkflowRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsCancelWorkflowRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsReviewCustomGatesForRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsReviewCustomGatesForRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsForceCancelWorkflowRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsForceCancelWorkflowRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param string $filter Filters jobs by their `completed_at` timestamp. `latest` returns jobs from the most recent execution of the workflow run. `all` returns all jobs for a workflow run, including from old executions of the workflow run.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListJobsForWorkflowRun(
		string $owner,
		string $repo,
		int $runId,
		?string $filter,
		?int $page,
	): Response
	{
		return $this->connector->send(new ActionsListJobsForWorkflowRun($owner, $repo, $runId, $filter, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsDownloadWorkflowRunLogs(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsDownloadWorkflowRunLogs($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsDeleteWorkflowRunLogs(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsDeleteWorkflowRunLogs($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsGetPendingDeploymentsForRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsGetPendingDeploymentsForRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsReviewPendingDeploymentsForRun(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsReviewPendingDeploymentsForRun($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsReRunWorkflow(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsReRunWorkflow($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsReRunWorkflowFailedJobs(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsReRunWorkflowFailedJobs($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function actionsGetWorkflowRunUsage(string $owner, string $repo, int $runId): Response
	{
		return $this->connector->send(new ActionsGetWorkflowRunUsage($owner, $repo, $runId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListRepoSecrets(string $owner, string $repo, ?int $page): Response
	{
		return $this->connector->send(new ActionsListRepoSecrets($owner, $repo, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsGetRepoPublicKey(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsGetRepoPublicKey($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsGetRepoSecret(string $owner, string $repo, string $secretName): Response
	{
		return $this->connector->send(new ActionsGetRepoSecret($owner, $repo, $secretName));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsCreateOrUpdateRepoSecret(string $owner, string $repo, string $secretName): Response
	{
		return $this->connector->send(new ActionsCreateOrUpdateRepoSecret($owner, $repo, $secretName));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsDeleteRepoSecret(string $owner, string $repo, string $secretName): Response
	{
		return $this->connector->send(new ActionsDeleteRepoSecret($owner, $repo, $secretName));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListRepoVariables(string $owner, string $repo, ?int $page): Response
	{
		return $this->connector->send(new ActionsListRepoVariables($owner, $repo, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function actionsCreateRepoVariable(string $owner, string $repo): Response
	{
		return $this->connector->send(new ActionsCreateRepoVariable($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsGetRepoVariable(string $owner, string $repo, string $name): Response
	{
		return $this->connector->send(new ActionsGetRepoVariable($owner, $repo, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsDeleteRepoVariable(string $owner, string $repo, string $name): Response
	{
		return $this->connector->send(new ActionsDeleteRepoVariable($owner, $repo, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function actionsUpdateRepoVariable(string $owner, string $repo, string $name): Response
	{
		return $this->connector->send(new ActionsUpdateRepoVariable($owner, $repo, $name));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListRepoWorkflows(string $owner, string $repo, ?int $page): Response
	{
		return $this->connector->send(new ActionsListRepoWorkflows($owner, $repo, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function actionsGetWorkflow(string $owner, string $repo, mixed $workflowId): Response
	{
		return $this->connector->send(new ActionsGetWorkflow($owner, $repo, $workflowId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function actionsDisableWorkflow(string $owner, string $repo, mixed $workflowId): Response
	{
		return $this->connector->send(new ActionsDisableWorkflow($owner, $repo, $workflowId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function actionsCreateWorkflowDispatch(string $owner, string $repo, mixed $workflowId): Response
	{
		return $this->connector->send(new ActionsCreateWorkflowDispatch($owner, $repo, $workflowId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function actionsEnableWorkflow(string $owner, string $repo, mixed $workflowId): Response
	{
		return $this->connector->send(new ActionsEnableWorkflow($owner, $repo, $workflowId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 * @param string $actor Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
	 * @param string $branch Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
	 * @param string $event Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
	 * @param string $status Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub can set a status of `waiting` or `requested`.
	 * @param int $page Page number of the results to fetch.
	 * @param string $created Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
	 * @param bool $excludePullRequests If `true` pull requests are omitted from the response (empty array).
	 * @param int $checkSuiteId Returns workflow runs with the `check_suite_id` that you specify.
	 * @param string $headSha Only returns workflow runs that are associated with the specified `head_sha`.
	 */
	public function actionsListWorkflowRuns(
		string $owner,
		string $repo,
		mixed $workflowId,
		?string $actor,
		?string $branch,
		?string $event,
		?string $status,
		?int $page,
		?string $created,
		?bool $excludePullRequests,
		?int $checkSuiteId,
		?string $headSha,
	): Response
	{
		return $this->connector->send(new ActionsListWorkflowRuns($owner, $repo, $workflowId, $actor, $branch, $event, $status, $page, $created, $excludePullRequests, $checkSuiteId, $headSha));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function actionsGetWorkflowUsage(string $owner, string $repo, mixed $workflowId): Response
	{
		return $this->connector->send(new ActionsGetWorkflowUsage($owner, $repo, $workflowId));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListEnvironmentSecrets(int $repositoryId, string $environmentName, ?int $page): Response
	{
		return $this->connector->send(new ActionsListEnvironmentSecrets($repositoryId, $environmentName, $page));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function actionsGetEnvironmentPublicKey(int $repositoryId, string $environmentName): Response
	{
		return $this->connector->send(new ActionsGetEnvironmentPublicKey($repositoryId, $environmentName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsGetEnvironmentSecret(int $repositoryId, string $environmentName, string $secretName): Response
	{
		return $this->connector->send(new ActionsGetEnvironmentSecret($repositoryId, $environmentName, $secretName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsCreateOrUpdateEnvironmentSecret(
		int $repositoryId,
		string $environmentName,
		string $secretName,
	): Response
	{
		return $this->connector->send(new ActionsCreateOrUpdateEnvironmentSecret($repositoryId, $environmentName, $secretName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $secretName The name of the secret.
	 */
	public function actionsDeleteEnvironmentSecret(
		int $repositoryId,
		string $environmentName,
		string $secretName,
	): Response
	{
		return $this->connector->send(new ActionsDeleteEnvironmentSecret($repositoryId, $environmentName, $secretName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function actionsListEnvironmentVariables(int $repositoryId, string $environmentName, ?int $page): Response
	{
		return $this->connector->send(new ActionsListEnvironmentVariables($repositoryId, $environmentName, $page));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function actionsCreateEnvironmentVariable(int $repositoryId, string $environmentName): Response
	{
		return $this->connector->send(new ActionsCreateEnvironmentVariable($repositoryId, $environmentName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param string $name The name of the variable.
	 */
	public function actionsGetEnvironmentVariable(int $repositoryId, string $environmentName, string $name): Response
	{
		return $this->connector->send(new ActionsGetEnvironmentVariable($repositoryId, $environmentName, $name));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $name The name of the variable.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function actionsDeleteEnvironmentVariable(int $repositoryId, string $name, string $environmentName): Response
	{
		return $this->connector->send(new ActionsDeleteEnvironmentVariable($repositoryId, $name, $environmentName));
	}


	/**
	 * @param int $repositoryId The unique identifier of the repository.
	 * @param string $name The name of the variable.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function actionsUpdateEnvironmentVariable(int $repositoryId, string $name, string $environmentName): Response
	{
		return $this->connector->send(new ActionsUpdateEnvironmentVariable($repositoryId, $name, $environmentName));
	}
}
