<?php

namespace Tonning\Github\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/get-comment
 *
 * You can use the REST API to get comments on issues and pull requests. Every pull request is an
 * issue, but not every issue is a pull request.
 */
class IssuesGetComment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/comments/{$this->commentId}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
    ) {
    }
}
