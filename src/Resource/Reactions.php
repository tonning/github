<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Reactions\ReactionsCreateForCommitComment;
use Tonning\Github\Requests\Reactions\ReactionsCreateForIssue;
use Tonning\Github\Requests\Reactions\ReactionsCreateForIssueComment;
use Tonning\Github\Requests\Reactions\ReactionsCreateForPullRequestReviewComment;
use Tonning\Github\Requests\Reactions\ReactionsCreateForRelease;
use Tonning\Github\Requests\Reactions\ReactionsCreateForTeamDiscussionCommentInOrg;
use Tonning\Github\Requests\Reactions\ReactionsCreateForTeamDiscussionCommentLegacy;
use Tonning\Github\Requests\Reactions\ReactionsCreateForTeamDiscussionInOrg;
use Tonning\Github\Requests\Reactions\ReactionsCreateForTeamDiscussionLegacy;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForCommitComment;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForIssue;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForIssueComment;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForPullRequestComment;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForRelease;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForTeamDiscussion;
use Tonning\Github\Requests\Reactions\ReactionsDeleteForTeamDiscussionComment;
use Tonning\Github\Requests\Reactions\ReactionsListForCommitComment;
use Tonning\Github\Requests\Reactions\ReactionsListForIssue;
use Tonning\Github\Requests\Reactions\ReactionsListForIssueComment;
use Tonning\Github\Requests\Reactions\ReactionsListForPullRequestReviewComment;
use Tonning\Github\Requests\Reactions\ReactionsListForRelease;
use Tonning\Github\Requests\Reactions\ReactionsListForTeamDiscussionCommentInOrg;
use Tonning\Github\Requests\Reactions\ReactionsListForTeamDiscussionCommentLegacy;
use Tonning\Github\Requests\Reactions\ReactionsListForTeamDiscussionInOrg;
use Tonning\Github\Requests\Reactions\ReactionsListForTeamDiscussionLegacy;
use Tonning\Github\Resource;

class Reactions extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion comment.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForTeamDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber, $content, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     */
    public function reactionsCreateForTeamDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForTeamDiscussionComment(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForTeamDiscussionComment($org, $teamSlug, $discussionNumber, $commentNumber, $reactionId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForTeamDiscussionInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionInOrg($org, $teamSlug, $discussionNumber, $content, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     */
    public function reactionsCreateForTeamDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $teamSlug The slug of the team name.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForTeamDiscussion(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForTeamDiscussion($org, $teamSlug, $discussionNumber, $reactionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a commit comment.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForCommitComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForCommitComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reactionsCreateForCommitComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForCommitComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForCommitComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to an issue comment.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForIssueComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForIssueComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reactionsCreateForIssueComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForIssueComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForIssueComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForIssueComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $issueNumber The number that identifies the issue.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to an issue.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForIssue(
        string $owner,
        string $repo,
        int $issueNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForIssue($owner, $repo, $issueNumber, $content, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $issueNumber The number that identifies the issue.
     */
    public function reactionsCreateForIssue(string $owner, string $repo, int $issueNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForIssue($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $issueNumber The number that identifies the issue.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForIssue(string $owner, string $repo, int $issueNumber, int $reactionId): Response
    {
        return $this->connector->send(new ReactionsDeleteForIssue($owner, $repo, $issueNumber, $reactionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a pull request review comment.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForPullRequestReviewComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForPullRequestReviewComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function reactionsCreateForPullRequestReviewComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForPullRequestReviewComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForPullRequestComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForPullRequestComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a release.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForRelease(
        string $owner,
        string $repo,
        int $releaseId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForRelease($owner, $repo, $releaseId, $content, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     */
    public function reactionsCreateForRelease(string $owner, string $repo, int $releaseId): Response
    {
        return $this->connector->send(new ReactionsCreateForRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $releaseId The unique identifier of the release.
     * @param  int  $reactionId The unique identifier of the reaction.
     */
    public function reactionsDeleteForRelease(string $owner, string $repo, int $releaseId, int $reactionId): Response
    {
        return $this->connector->send(new ReactionsDeleteForRelease($owner, $repo, $releaseId, $reactionId));
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion comment.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForTeamDiscussionCommentLegacy(
        int $teamId,
        int $discussionNumber,
        int $commentNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber, $content, $page));
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  int  $commentNumber The number that identifies the comment.
     */
    public function reactionsCreateForTeamDiscussionCommentLegacy(
        int $teamId,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     * @param  string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  int  $page Page number of the results to fetch.
     */
    public function reactionsListForTeamDiscussionLegacy(
        int $teamId,
        int $discussionNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionLegacy($teamId, $discussionNumber, $content, $page));
    }

    /**
     * @param  int  $teamId The unique identifier of the team.
     * @param  int  $discussionNumber The number that identifies the discussion.
     */
    public function reactionsCreateForTeamDiscussionLegacy(int $teamId, int $discussionNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionLegacy($teamId, $discussionNumber));
    }
}
