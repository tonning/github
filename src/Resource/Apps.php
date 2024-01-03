<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Apps\AppsAddRepoToInstallationForAuthenticatedUser;
use Tonning\Github\Requests\Apps\AppsCheckToken;
use Tonning\Github\Requests\Apps\AppsCreateFromManifest;
use Tonning\Github\Requests\Apps\AppsCreateInstallationAccessToken;
use Tonning\Github\Requests\Apps\AppsDeleteAuthorization;
use Tonning\Github\Requests\Apps\AppsDeleteInstallation;
use Tonning\Github\Requests\Apps\AppsDeleteToken;
use Tonning\Github\Requests\Apps\AppsGetAuthenticated;
use Tonning\Github\Requests\Apps\AppsGetBySlug;
use Tonning\Github\Requests\Apps\AppsGetInstallation;
use Tonning\Github\Requests\Apps\AppsGetOrgInstallation;
use Tonning\Github\Requests\Apps\AppsGetRepoInstallation;
use Tonning\Github\Requests\Apps\AppsGetSubscriptionPlanForAccount;
use Tonning\Github\Requests\Apps\AppsGetSubscriptionPlanForAccountStubbed;
use Tonning\Github\Requests\Apps\AppsGetUserInstallation;
use Tonning\Github\Requests\Apps\AppsGetWebhookConfigForApp;
use Tonning\Github\Requests\Apps\AppsGetWebhookDelivery;
use Tonning\Github\Requests\Apps\AppsListAccountsForPlan;
use Tonning\Github\Requests\Apps\AppsListAccountsForPlanStubbed;
use Tonning\Github\Requests\Apps\AppsListInstallationReposForAuthenticatedUser;
use Tonning\Github\Requests\Apps\AppsListInstallationRequestsForAuthenticatedApp;
use Tonning\Github\Requests\Apps\AppsListInstallations;
use Tonning\Github\Requests\Apps\AppsListInstallationsForAuthenticatedUser;
use Tonning\Github\Requests\Apps\AppsListPlans;
use Tonning\Github\Requests\Apps\AppsListPlansStubbed;
use Tonning\Github\Requests\Apps\AppsListReposAccessibleToInstallation;
use Tonning\Github\Requests\Apps\AppsListSubscriptionsForAuthenticatedUser;
use Tonning\Github\Requests\Apps\AppsListSubscriptionsForAuthenticatedUserStubbed;
use Tonning\Github\Requests\Apps\AppsListWebhookDeliveries;
use Tonning\Github\Requests\Apps\AppsRedeliverWebhookDelivery;
use Tonning\Github\Requests\Apps\AppsRemoveRepoFromInstallationForAuthenticatedUser;
use Tonning\Github\Requests\Apps\AppsResetToken;
use Tonning\Github\Requests\Apps\AppsRevokeInstallationAccessToken;
use Tonning\Github\Requests\Apps\AppsScopeToken;
use Tonning\Github\Requests\Apps\AppsSuspendInstallation;
use Tonning\Github\Requests\Apps\AppsUnsuspendInstallation;
use Tonning\Github\Requests\Apps\AppsUpdateWebhookConfigForApp;
use Tonning\Github\Resource;

class Apps extends Resource
{
    public function appsGetAuthenticated(): Response
    {
        return $this->connector->send(new AppsGetAuthenticated());
    }

    public function appsCreateFromManifest(string $code): Response
    {
        return $this->connector->send(new AppsCreateFromManifest($code));
    }

    public function appsGetWebhookConfigForApp(): Response
    {
        return $this->connector->send(new AppsGetWebhookConfigForApp());
    }

    public function appsUpdateWebhookConfigForApp(): Response
    {
        return $this->connector->send(new AppsUpdateWebhookConfigForApp());
    }

    /**
     * @param  string  $cursor Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function appsListWebhookDeliveries(?string $cursor, ?bool $redelivery): Response
    {
        return $this->connector->send(new AppsListWebhookDeliveries($cursor, $redelivery));
    }

    public function appsGetWebhookDelivery(int $deliveryId): Response
    {
        return $this->connector->send(new AppsGetWebhookDelivery($deliveryId));
    }

    public function appsRedeliverWebhookDelivery(int $deliveryId): Response
    {
        return $this->connector->send(new AppsRedeliverWebhookDelivery($deliveryId));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListInstallationRequestsForAuthenticatedApp(?int $page): Response
    {
        return $this->connector->send(new AppsListInstallationRequestsForAuthenticatedApp($page));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function appsListInstallations(?int $page, ?string $since, ?string $outdated): Response
    {
        return $this->connector->send(new AppsListInstallations($page, $since, $outdated));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     */
    public function appsGetInstallation(int $installationId): Response
    {
        return $this->connector->send(new AppsGetInstallation($installationId));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     */
    public function appsDeleteInstallation(int $installationId): Response
    {
        return $this->connector->send(new AppsDeleteInstallation($installationId));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     */
    public function appsCreateInstallationAccessToken(int $installationId): Response
    {
        return $this->connector->send(new AppsCreateInstallationAccessToken($installationId));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     */
    public function appsSuspendInstallation(int $installationId): Response
    {
        return $this->connector->send(new AppsSuspendInstallation($installationId));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     */
    public function appsUnsuspendInstallation(int $installationId): Response
    {
        return $this->connector->send(new AppsUnsuspendInstallation($installationId));
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function appsDeleteAuthorization(string $clientId): Response
    {
        return $this->connector->send(new AppsDeleteAuthorization($clientId));
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function appsCheckToken(string $clientId): Response
    {
        return $this->connector->send(new AppsCheckToken($clientId));
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function appsDeleteToken(string $clientId): Response
    {
        return $this->connector->send(new AppsDeleteToken($clientId));
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function appsResetToken(string $clientId): Response
    {
        return $this->connector->send(new AppsResetToken($clientId));
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function appsScopeToken(string $clientId): Response
    {
        return $this->connector->send(new AppsScopeToken($clientId));
    }

    public function appsGetBySlug(string $appSlug): Response
    {
        return $this->connector->send(new AppsGetBySlug($appSlug));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListReposAccessibleToInstallation(?int $page): Response
    {
        return $this->connector->send(new AppsListReposAccessibleToInstallation($page));
    }

    public function appsRevokeInstallationAccessToken(): Response
    {
        return $this->connector->send(new AppsRevokeInstallationAccessToken());
    }

    /**
     * @param  int  $accountId account_id parameter
     */
    public function appsGetSubscriptionPlanForAccount(int $accountId): Response
    {
        return $this->connector->send(new AppsGetSubscriptionPlanForAccount($accountId));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListPlans(?int $page): Response
    {
        return $this->connector->send(new AppsListPlans($page));
    }

    /**
     * @param  int  $planId The unique identifier of the plan.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $direction To return the oldest accounts first, set to `asc`. Ignored without the `sort` parameter.
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListAccountsForPlan(int $planId, ?string $sort, ?string $direction, ?int $page): Response
    {
        return $this->connector->send(new AppsListAccountsForPlan($planId, $sort, $direction, $page));
    }

    /**
     * @param  int  $accountId account_id parameter
     */
    public function appsGetSubscriptionPlanForAccountStubbed(int $accountId): Response
    {
        return $this->connector->send(new AppsGetSubscriptionPlanForAccountStubbed($accountId));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListPlansStubbed(?int $page): Response
    {
        return $this->connector->send(new AppsListPlansStubbed($page));
    }

    /**
     * @param  int  $planId The unique identifier of the plan.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $direction To return the oldest accounts first, set to `asc`. Ignored without the `sort` parameter.
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListAccountsForPlanStubbed(int $planId, ?string $sort, ?string $direction, ?int $page): Response
    {
        return $this->connector->send(new AppsListAccountsForPlanStubbed($planId, $sort, $direction, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function appsGetOrgInstallation(string $org): Response
    {
        return $this->connector->send(new AppsGetOrgInstallation($org));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function appsGetRepoInstallation(string $owner, string $repo): Response
    {
        return $this->connector->send(new AppsGetRepoInstallation($owner, $repo));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListInstallationsForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new AppsListInstallationsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListInstallationReposForAuthenticatedUser(int $installationId, ?int $page): Response
    {
        return $this->connector->send(new AppsListInstallationReposForAuthenticatedUser($installationId, $page));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     * @param  int  $repositoryId The unique identifier of the repository.
     */
    public function appsAddRepoToInstallationForAuthenticatedUser(int $installationId, int $repositoryId): Response
    {
        return $this->connector->send(new AppsAddRepoToInstallationForAuthenticatedUser($installationId, $repositoryId));
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     * @param  int  $repositoryId The unique identifier of the repository.
     */
    public function appsRemoveRepoFromInstallationForAuthenticatedUser(int $installationId, int $repositoryId): Response
    {
        return $this->connector->send(new AppsRemoveRepoFromInstallationForAuthenticatedUser($installationId, $repositoryId));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListSubscriptionsForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new AppsListSubscriptionsForAuthenticatedUser($page));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function appsListSubscriptionsForAuthenticatedUserStubbed(?int $page): Response
    {
        return $this->connector->send(new AppsListSubscriptionsForAuthenticatedUserStubbed($page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     */
    public function appsGetUserInstallation(string $username): Response
    {
        return $this->connector->send(new AppsGetUserInstallation($username));
    }
}
