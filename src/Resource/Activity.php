<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Activity\ActivityCheckRepoIsStarredByAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityDeleteRepoSubscription;
use Tonning\Github\Requests\Activity\ActivityDeleteThreadSubscription;
use Tonning\Github\Requests\Activity\ActivityGetFeeds;
use Tonning\Github\Requests\Activity\ActivityGetRepoSubscription;
use Tonning\Github\Requests\Activity\ActivityGetThread;
use Tonning\Github\Requests\Activity\ActivityGetThreadSubscriptionForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListEventsForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListNotificationsForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListOrgEventsForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListPublicEvents;
use Tonning\Github\Requests\Activity\ActivityListPublicEventsForRepoNetwork;
use Tonning\Github\Requests\Activity\ActivityListPublicEventsForUser;
use Tonning\Github\Requests\Activity\ActivityListPublicOrgEvents;
use Tonning\Github\Requests\Activity\ActivityListReceivedEventsForUser;
use Tonning\Github\Requests\Activity\ActivityListReceivedPublicEventsForUser;
use Tonning\Github\Requests\Activity\ActivityListRepoEvents;
use Tonning\Github\Requests\Activity\ActivityListRepoNotificationsForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListReposStarredByAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListReposStarredByUser;
use Tonning\Github\Requests\Activity\ActivityListReposWatchedByUser;
use Tonning\Github\Requests\Activity\ActivityListStargazersForRepo;
use Tonning\Github\Requests\Activity\ActivityListWatchedReposForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityListWatchersForRepo;
use Tonning\Github\Requests\Activity\ActivityMarkNotificationsAsRead;
use Tonning\Github\Requests\Activity\ActivityMarkRepoNotificationsAsRead;
use Tonning\Github\Requests\Activity\ActivityMarkThreadAsDone;
use Tonning\Github\Requests\Activity\ActivityMarkThreadAsRead;
use Tonning\Github\Requests\Activity\ActivitySetRepoSubscription;
use Tonning\Github\Requests\Activity\ActivitySetThreadSubscription;
use Tonning\Github\Requests\Activity\ActivityStarRepoForAuthenticatedUser;
use Tonning\Github\Requests\Activity\ActivityUnstarRepoForAuthenticatedUser;
use Tonning\Github\Resource;

class Activity extends Resource
{
    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListPublicEvents(?int $page): Response
    {
        return $this->connector->send(new ActivityListPublicEvents($page));
    }

    public function activityGetFeeds(): Response
    {
        return $this->connector->send(new ActivityGetFeeds());
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListPublicEventsForRepoNetwork(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ActivityListPublicEventsForRepoNetwork($owner, $repo, $page));
    }

    /**
     * @param  bool  $all If `true`, show notifications marked as read.
     * @param  bool  $participating If `true`, only shows notifications in which the user is directly participating or mentioned.
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $before Only show notifications updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListNotificationsForAuthenticatedUser(
        ?bool $all,
        ?bool $participating,
        ?string $since,
        ?string $before,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActivityListNotificationsForAuthenticatedUser($all, $participating, $since, $before, $page));
    }

    public function activityMarkNotificationsAsRead(): Response
    {
        return $this->connector->send(new ActivityMarkNotificationsAsRead());
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activityGetThread(int $threadId): Response
    {
        return $this->connector->send(new ActivityGetThread($threadId));
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activityMarkThreadAsDone(int $threadId): Response
    {
        return $this->connector->send(new ActivityMarkThreadAsDone($threadId));
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activityMarkThreadAsRead(int $threadId): Response
    {
        return $this->connector->send(new ActivityMarkThreadAsRead($threadId));
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activityGetThreadSubscriptionForAuthenticatedUser(int $threadId): Response
    {
        return $this->connector->send(new ActivityGetThreadSubscriptionForAuthenticatedUser($threadId));
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activitySetThreadSubscription(int $threadId): Response
    {
        return $this->connector->send(new ActivitySetThreadSubscription($threadId));
    }

    /**
     * @param  int  $threadId The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function activityDeleteThreadSubscription(int $threadId): Response
    {
        return $this->connector->send(new ActivityDeleteThreadSubscription($threadId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListPublicOrgEvents(string $org, ?int $page): Response
    {
        return $this->connector->send(new ActivityListPublicOrgEvents($org, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListRepoEvents(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ActivityListRepoEvents($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  bool  $all If `true`, show notifications marked as read.
     * @param  bool  $participating If `true`, only shows notifications in which the user is directly participating or mentioned.
     * @param  string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $before Only show notifications updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListRepoNotificationsForAuthenticatedUser(
        string $owner,
        string $repo,
        ?bool $all,
        ?bool $participating,
        ?string $since,
        ?string $before,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActivityListRepoNotificationsForAuthenticatedUser($owner, $repo, $all, $participating, $since, $before, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityMarkRepoNotificationsAsRead(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityMarkRepoNotificationsAsRead($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListStargazersForRepo(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ActivityListStargazersForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListWatchersForRepo(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new ActivityListWatchersForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityGetRepoSubscription(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityGetRepoSubscription($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activitySetRepoSubscription(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivitySetRepoSubscription($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityDeleteRepoSubscription(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityDeleteRepoSubscription($owner, $repo));
    }

    /**
     * @param  string  $sort The property to sort the results by. `created` means when the repository was starred. `updated` means when the repository was last pushed to.
     * @param  string  $direction The direction to sort the results by.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListReposStarredByAuthenticatedUser(?string $sort, ?string $direction, ?int $page): Response
    {
        return $this->connector->send(new ActivityListReposStarredByAuthenticatedUser($sort, $direction, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityCheckRepoIsStarredByAuthenticatedUser(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityCheckRepoIsStarredByAuthenticatedUser($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityStarRepoForAuthenticatedUser(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityStarRepoForAuthenticatedUser($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function activityUnstarRepoForAuthenticatedUser(string $owner, string $repo): Response
    {
        return $this->connector->send(new ActivityUnstarRepoForAuthenticatedUser($owner, $repo));
    }

    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListWatchedReposForAuthenticatedUser(?int $page): Response
    {
        return $this->connector->send(new ActivityListWatchedReposForAuthenticatedUser($page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListEventsForAuthenticatedUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new ActivityListEventsForAuthenticatedUser($username, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListOrgEventsForAuthenticatedUser(string $username, string $org, ?int $page): Response
    {
        return $this->connector->send(new ActivityListOrgEventsForAuthenticatedUser($username, $org, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListPublicEventsForUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new ActivityListPublicEventsForUser($username, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListReceivedEventsForUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new ActivityListReceivedEventsForUser($username, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListReceivedPublicEventsForUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new ActivityListReceivedPublicEventsForUser($username, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $sort The property to sort the results by. `created` means when the repository was starred. `updated` means when the repository was last pushed to.
     * @param  string  $direction The direction to sort the results by.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListReposStarredByUser(
        string $username,
        ?string $sort,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new ActivityListReposStarredByUser($username, $sort, $direction, $page));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $page Page number of the results to fetch.
     */
    public function activityListReposWatchedByUser(string $username, ?int $page): Response
    {
        return $this->connector->send(new ActivityListReposWatchedByUser($username, $page));
    }
}
