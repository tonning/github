<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Git\GitCreateBlob;
use Tonning\Github\Requests\Git\GitCreateCommit;
use Tonning\Github\Requests\Git\GitCreateRef;
use Tonning\Github\Requests\Git\GitCreateTag;
use Tonning\Github\Requests\Git\GitCreateTree;
use Tonning\Github\Requests\Git\GitDeleteRef;
use Tonning\Github\Requests\Git\GitGetBlob;
use Tonning\Github\Requests\Git\GitGetCommit;
use Tonning\Github\Requests\Git\GitGetRef;
use Tonning\Github\Requests\Git\GitGetTag;
use Tonning\Github\Requests\Git\GitGetTree;
use Tonning\Github\Requests\Git\GitListMatchingRefs;
use Tonning\Github\Requests\Git\GitUpdateRef;
use Tonning\Github\Resource;

class Git extends Resource
{
	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function gitCreateBlob(string $owner, string $repo): Response
	{
		return $this->connector->send(new GitCreateBlob($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $fileSha
	 */
	public function gitGetBlob(string $owner, string $repo, string $fileSha): Response
	{
		return $this->connector->send(new GitGetBlob($owner, $repo, $fileSha));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function gitCreateCommit(string $owner, string $repo): Response
	{
		return $this->connector->send(new GitCreateCommit($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $commitSha The SHA of the commit.
	 */
	public function gitGetCommit(string $owner, string $repo, string $commitSha): Response
	{
		return $this->connector->send(new GitGetCommit($owner, $repo, $commitSha));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
	 */
	public function gitListMatchingRefs(string $owner, string $repo, string $ref): Response
	{
		return $this->connector->send(new GitListMatchingRefs($owner, $repo, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
	 */
	public function gitGetRef(string $owner, string $repo, string $ref): Response
	{
		return $this->connector->send(new GitGetRef($owner, $repo, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function gitCreateRef(string $owner, string $repo): Response
	{
		return $this->connector->send(new GitCreateRef($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
	 */
	public function gitDeleteRef(string $owner, string $repo, string $ref): Response
	{
		return $this->connector->send(new GitDeleteRef($owner, $repo, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ref The name of the reference to update (for example, `heads/featureA`). Can be a branch name (`heads/BRANCH_NAME`) or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
	 */
	public function gitUpdateRef(string $owner, string $repo, string $ref): Response
	{
		return $this->connector->send(new GitUpdateRef($owner, $repo, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function gitCreateTag(string $owner, string $repo): Response
	{
		return $this->connector->send(new GitCreateTag($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $tagSha
	 */
	public function gitGetTag(string $owner, string $repo, string $tagSha): Response
	{
		return $this->connector->send(new GitGetTag($owner, $repo, $tagSha));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function gitCreateTree(string $owner, string $repo): Response
	{
		return $this->connector->send(new GitCreateTree($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $treeSha The SHA1 value or ref (branch or tag) name of the tree.
	 * @param string $recursive Setting this parameter to any value returns the objects or subtrees referenced by the tree specified in `:tree_sha`. For example, setting `recursive` to any of the following will enable returning objects or subtrees: `0`, `1`, `"true"`, and `"false"`. Omit this parameter to prevent recursively returning objects or subtrees.
	 */
	public function gitGetTree(string $owner, string $repo, string $treeSha, ?string $recursive): Response
	{
		return $this->connector->send(new GitGetTree($owner, $repo, $treeSha, $recursive));
	}
}
