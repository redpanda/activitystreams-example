<?php

namespace Blog\Model\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelPDO;
use Blog\Model\Category;
use Blog\Model\Post;
use Blog\Model\PostPeer;
use Blog\Model\PostQuery;
use Blog\Model\User;

/**
 * Base class that represents a query for the 'post' table.
 *
 * 
 *
 * @method     PostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PostQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     PostQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     PostQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     PostQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     PostQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PostQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PostQuery groupById() Group by the id column
 * @method     PostQuery groupByTitle() Group by the title column
 * @method     PostQuery groupByBody() Group by the body column
 * @method     PostQuery groupByUserId() Group by the user_id column
 * @method     PostQuery groupByCategoryId() Group by the category_id column
 * @method     PostQuery groupByCreatedAt() Group by the created_at column
 * @method     PostQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     PostQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     PostQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     PostQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     PostQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     PostQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     Post findOne(PropelPDO $con = null) Return the first Post matching the query
 * @method     Post findOneOrCreate(PropelPDO $con = null) Return the first Post matching the query, or a new Post object populated from the query conditions when no match is found
 *
 * @method     Post findOneById(int $id) Return the first Post filtered by the id column
 * @method     Post findOneByTitle(string $title) Return the first Post filtered by the title column
 * @method     Post findOneByBody(string $body) Return the first Post filtered by the body column
 * @method     Post findOneByUserId(int $user_id) Return the first Post filtered by the user_id column
 * @method     Post findOneByCategoryId(int $category_id) Return the first Post filtered by the category_id column
 * @method     Post findOneByCreatedAt(string $created_at) Return the first Post filtered by the created_at column
 * @method     Post findOneByUpdatedAt(string $updated_at) Return the first Post filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Post objects filtered by the id column
 * @method     array findByTitle(string $title) Return Post objects filtered by the title column
 * @method     array findByBody(string $body) Return Post objects filtered by the body column
 * @method     array findByUserId(int $user_id) Return Post objects filtered by the user_id column
 * @method     array findByCategoryId(int $category_id) Return Post objects filtered by the category_id column
 * @method     array findByCreatedAt(string $created_at) Return Post objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Post objects filtered by the updated_at column
 *
 * @package    propel.generator.Blog.Model.om
 */
abstract class BasePostQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'activitystreams_blog_example', $modelName = 'Blog\\Model\\Post', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostQuery) {
			return $criteria;
		}
		$query = new PostQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Post|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PostPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Post A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TITLE`, `BODY`, `USER_ID`, `CATEGORY_ID`, `CREATED_AT`, `UPDATED_AT` FROM `post` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Post();
			$obj->hydrate($row);
			PostPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Post|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
	 * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $title The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the body column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBody('fooValue');   // WHERE body = 'fooValue'
	 * $query->filterByBody('%fooValue%'); // WHERE body LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $body The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($body)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $body)) {
				$body = str_replace('*', '%', $body);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the user_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE user_id = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
	 * </code>
	 *
	 * @see       filterByUser()
	 *
	 * @param     mixed $userId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(PostPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(PostPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoryId(1234); // WHERE category_id = 1234
	 * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
	 * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
	 * </code>
	 *
	 * @see       filterByCategory()
	 *
	 * @param     mixed $categoryId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId)) {
			$useMinMax = false;
			if (isset($categoryId['min'])) {
				$this->addUsingAlias(PostPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoryId['max'])) {
				$this->addUsingAlias(PostPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PostPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PostPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $updatedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PostPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PostPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(PostPeer::USER_ID, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'User');
		}

		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \Blog\Model\UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', '\Blog\Model\UserQuery');
	}

	/**
	 * Filter the query by a related Category object
	 *
	 * @param     Category|PropelCollection $category The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByCategory($category, $comparison = null)
	{
		if ($category instanceof Category) {
			return $this
				->addUsingAlias(PostPeer::CATEGORY_ID, $category->getId(), $comparison);
		} elseif ($category instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostPeer::CATEGORY_ID, $category->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategory() only accepts arguments of type Category or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Category relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Category');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Category');
		}

		return $this;
	}

	/**
	 * Use the Category relation Category object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    \Blog\Model\CategoryQuery A secondary query class using the current class as primary query
	 */
	public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Category', '\Blog\Model\CategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Post $post Object to remove from the list of results
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function prune($post = null)
	{
		if ($post) {
			$this->addUsingAlias(PostPeer::ID, $post->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(PostPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(PostPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(PostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(PostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(PostPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     PostQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(PostPeer::CREATED_AT);
	}

} // BasePostQuery