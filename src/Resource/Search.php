<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Search\SearchCode;
use Tonning\Github\Requests\Search\SearchCommits;
use Tonning\Github\Requests\Search\SearchIssuesAndPullRequests;
use Tonning\Github\Requests\Search\SearchLabels;
use Tonning\Github\Requests\Search\SearchRepos;
use Tonning\Github\Requests\Search\SearchTopics;
use Tonning\Github\Requests\Search\SearchUsers;
use Tonning\Github\Resource;

class Search extends Resource
{
	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching code](https://docs.github.com/search-github/searching-on-github/searching-code)" for a detailed list of qualifiers.
	 * @param string $sort **This field is deprecated.** Sorts the results of your query. Can only be `indexed`, which indicates how recently a file has been indexed by the GitHub search infrastructure. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order **This field is deprecated.** Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchCode(string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchCode($q, $sort, $order, $page));
	}


	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching commits](https://docs.github.com/search-github/searching-on-github/searching-commits)" for a detailed list of qualifiers.
	 * @param string $sort Sorts the results of your query by `author-date` or `committer-date`. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchCommits(string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchCommits($q, $sort, $order, $page));
	}


	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching issues and pull requests](https://docs.github.com/search-github/searching-on-github/searching-issues-and-pull-requests)" for a detailed list of qualifiers.
	 * @param string $sort Sorts the results of your query by the number of `comments`, `reactions`, `reactions-+1`, `reactions--1`, `reactions-smile`, `reactions-thinking_face`, `reactions-heart`, `reactions-tada`, or `interactions`. You can also sort results by how recently the items were `created` or `updated`, Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchIssuesAndPullRequests(string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchIssuesAndPullRequests($q, $sort, $order, $page));
	}


	/**
	 * @param int $repositoryId The id of the repository.
	 * @param string $q The search keywords. This endpoint does not accept qualifiers in the query. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query).
	 * @param string $sort Sorts the results of your query by when the label was `created` or `updated`. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchLabels(int $repositoryId, string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchLabels($repositoryId, $q, $sort, $order, $page));
	}


	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching for repositories](https://docs.github.com/articles/searching-for-repositories/)" for a detailed list of qualifiers.
	 * @param string $sort Sorts the results of your query by number of `stars`, `forks`, or `help-wanted-issues` or how recently the items were `updated`. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchRepos(string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchRepos($q, $sort, $order, $page));
	}


	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query).
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchTopics(string $q, ?int $page): Response
	{
		return $this->connector->send(new SearchTopics($q, $page));
	}


	/**
	 * @param string $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching users](https://docs.github.com/search-github/searching-on-github/searching-users)" for a detailed list of qualifiers.
	 * @param string $sort Sorts the results of your query by number of `followers` or `repositories`, or when the person `joined` GitHub. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
	 * @param string $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
	 * @param int $page Page number of the results to fetch.
	 */
	public function searchUsers(string $q, ?string $sort, ?string $order, ?int $page): Response
	{
		return $this->connector->send(new SearchUsers($q, $sort, $order, $page));
	}
}
