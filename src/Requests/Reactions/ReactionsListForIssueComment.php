<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/list-for-issue-comment
 *
 * List the reactions to an [issue
 * comment](https://docs.github.com/rest/issues/comments#get-an-issue-comment).
 */
class ReactionsListForIssueComment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/comments/{$this->commentId}/reactions";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     * @param  null|string  $content Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to an issue comment.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
        protected ?string $content = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['content' => $this->content, 'page' => $this->page]);
    }
}
