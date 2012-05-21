<?php

namespace Blog\Model\om;

use \Criteria;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelPDO;
use Blog\Model\Action;
use Blog\Model\ActionPeer;
use Blog\Model\ActionQuery;

/**
 * Base class that represents a query for the 'action' table.
 *
 * 
 *
 * @method     ActionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ActionQuery orderByActorId($order = Criteria::ASC) Order by the actor_id column
 * @method     ActionQuery orderByActorType($order = Criteria::ASC) Order by the actor_type column
 * @method     ActionQuery orderByActorName($order = Criteria::ASC) Order by the actor_name column
 * @method     ActionQuery orderByActorUrl($order = Criteria::ASC) Order by the actor_url column
 * @method     ActionQuery orderByActorImage($order = Criteria::ASC) Order by the actor_image column
 * @method     ActionQuery orderByVerb($order = Criteria::ASC) Order by the verb column
 * @method     ActionQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     ActionQuery orderByObjectType($order = Criteria::ASC) Order by the object_type column
 * @method     ActionQuery orderByObjectName($order = Criteria::ASC) Order by the object_name column
 * @method     ActionQuery orderByObjectUrl($order = Criteria::ASC) Order by the object_url column
 * @method     ActionQuery orderByObjectImage($order = Criteria::ASC) Order by the object_image column
 * @method     ActionQuery orderByTargetId($order = Criteria::ASC) Order by the target_id column
 * @method     ActionQuery orderByTargetType($order = Criteria::ASC) Order by the target_type column
 * @method     ActionQuery orderByTargetName($order = Criteria::ASC) Order by the target_name column
 * @method     ActionQuery orderByTargetUrl($order = Criteria::ASC) Order by the target_url column
 * @method     ActionQuery orderByTargetImage($order = Criteria::ASC) Order by the target_image column
 * @method     ActionQuery orderByPublishedAt($order = Criteria::ASC) Order by the published_at column
 *
 * @method     ActionQuery groupById() Group by the id column
 * @method     ActionQuery groupByActorId() Group by the actor_id column
 * @method     ActionQuery groupByActorType() Group by the actor_type column
 * @method     ActionQuery groupByActorName() Group by the actor_name column
 * @method     ActionQuery groupByActorUrl() Group by the actor_url column
 * @method     ActionQuery groupByActorImage() Group by the actor_image column
 * @method     ActionQuery groupByVerb() Group by the verb column
 * @method     ActionQuery groupByObjectId() Group by the object_id column
 * @method     ActionQuery groupByObjectType() Group by the object_type column
 * @method     ActionQuery groupByObjectName() Group by the object_name column
 * @method     ActionQuery groupByObjectUrl() Group by the object_url column
 * @method     ActionQuery groupByObjectImage() Group by the object_image column
 * @method     ActionQuery groupByTargetId() Group by the target_id column
 * @method     ActionQuery groupByTargetType() Group by the target_type column
 * @method     ActionQuery groupByTargetName() Group by the target_name column
 * @method     ActionQuery groupByTargetUrl() Group by the target_url column
 * @method     ActionQuery groupByTargetImage() Group by the target_image column
 * @method     ActionQuery groupByPublishedAt() Group by the published_at column
 *
 * @method     ActionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ActionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ActionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Action findOne(PropelPDO $con = null) Return the first Action matching the query
 * @method     Action findOneOrCreate(PropelPDO $con = null) Return the first Action matching the query, or a new Action object populated from the query conditions when no match is found
 *
 * @method     Action findOneById(int $id) Return the first Action filtered by the id column
 * @method     Action findOneByActorId(int $actor_id) Return the first Action filtered by the actor_id column
 * @method     Action findOneByActorType(string $actor_type) Return the first Action filtered by the actor_type column
 * @method     Action findOneByActorName(string $actor_name) Return the first Action filtered by the actor_name column
 * @method     Action findOneByActorUrl(string $actor_url) Return the first Action filtered by the actor_url column
 * @method     Action findOneByActorImage(string $actor_image) Return the first Action filtered by the actor_image column
 * @method     Action findOneByVerb(string $verb) Return the first Action filtered by the verb column
 * @method     Action findOneByObjectId(int $object_id) Return the first Action filtered by the object_id column
 * @method     Action findOneByObjectType(string $object_type) Return the first Action filtered by the object_type column
 * @method     Action findOneByObjectName(string $object_name) Return the first Action filtered by the object_name column
 * @method     Action findOneByObjectUrl(string $object_url) Return the first Action filtered by the object_url column
 * @method     Action findOneByObjectImage(string $object_image) Return the first Action filtered by the object_image column
 * @method     Action findOneByTargetId(int $target_id) Return the first Action filtered by the target_id column
 * @method     Action findOneByTargetType(string $target_type) Return the first Action filtered by the target_type column
 * @method     Action findOneByTargetName(string $target_name) Return the first Action filtered by the target_name column
 * @method     Action findOneByTargetUrl(string $target_url) Return the first Action filtered by the target_url column
 * @method     Action findOneByTargetImage(string $target_image) Return the first Action filtered by the target_image column
 * @method     Action findOneByPublishedAt(string $published_at) Return the first Action filtered by the published_at column
 *
 * @method     array findById(int $id) Return Action objects filtered by the id column
 * @method     array findByActorId(int $actor_id) Return Action objects filtered by the actor_id column
 * @method     array findByActorType(string $actor_type) Return Action objects filtered by the actor_type column
 * @method     array findByActorName(string $actor_name) Return Action objects filtered by the actor_name column
 * @method     array findByActorUrl(string $actor_url) Return Action objects filtered by the actor_url column
 * @method     array findByActorImage(string $actor_image) Return Action objects filtered by the actor_image column
 * @method     array findByVerb(string $verb) Return Action objects filtered by the verb column
 * @method     array findByObjectId(int $object_id) Return Action objects filtered by the object_id column
 * @method     array findByObjectType(string $object_type) Return Action objects filtered by the object_type column
 * @method     array findByObjectName(string $object_name) Return Action objects filtered by the object_name column
 * @method     array findByObjectUrl(string $object_url) Return Action objects filtered by the object_url column
 * @method     array findByObjectImage(string $object_image) Return Action objects filtered by the object_image column
 * @method     array findByTargetId(int $target_id) Return Action objects filtered by the target_id column
 * @method     array findByTargetType(string $target_type) Return Action objects filtered by the target_type column
 * @method     array findByTargetName(string $target_name) Return Action objects filtered by the target_name column
 * @method     array findByTargetUrl(string $target_url) Return Action objects filtered by the target_url column
 * @method     array findByTargetImage(string $target_image) Return Action objects filtered by the target_image column
 * @method     array findByPublishedAt(string $published_at) Return Action objects filtered by the published_at column
 *
 * @package    propel.generator.Blog.Model.om
 */
abstract class BaseActionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseActionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'activitystreams_blog_example', $modelName = 'Blog\\Model\\Action', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ActionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ActionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ActionQuery) {
			return $criteria;
		}
		$query = new ActionQuery();
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
	 * @return    Action|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ActionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Action A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ACTOR_ID`, `ACTOR_TYPE`, `ACTOR_NAME`, `ACTOR_URL`, `ACTOR_IMAGE`, `VERB`, `OBJECT_ID`, `OBJECT_TYPE`, `OBJECT_NAME`, `OBJECT_URL`, `OBJECT_IMAGE`, `TARGET_ID`, `TARGET_TYPE`, `TARGET_NAME`, `TARGET_URL`, `TARGET_IMAGE`, `PUBLISHED_AT` FROM `action` WHERE `ID` = :p0';
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
			$obj = new Action();
			$obj->hydrate($row);
			ActionPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Action|array|mixed the result, formatted by the current formatter
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
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ActionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ActionPeer::ID, $keys, Criteria::IN);
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
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ActionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the actor_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActorId(1234); // WHERE actor_id = 1234
	 * $query->filterByActorId(array(12, 34)); // WHERE actor_id IN (12, 34)
	 * $query->filterByActorId(array('min' => 12)); // WHERE actor_id > 12
	 * </code>
	 *
	 * @param     mixed $actorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByActorId($actorId = null, $comparison = null)
	{
		if (is_array($actorId)) {
			$useMinMax = false;
			if (isset($actorId['min'])) {
				$this->addUsingAlias(ActionPeer::ACTOR_ID, $actorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($actorId['max'])) {
				$this->addUsingAlias(ActionPeer::ACTOR_ID, $actorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionPeer::ACTOR_ID, $actorId, $comparison);
	}

	/**
	 * Filter the query on the actor_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActorType('fooValue');   // WHERE actor_type = 'fooValue'
	 * $query->filterByActorType('%fooValue%'); // WHERE actor_type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actorType The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByActorType($actorType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actorType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actorType)) {
				$actorType = str_replace('*', '%', $actorType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::ACTOR_TYPE, $actorType, $comparison);
	}

	/**
	 * Filter the query on the actor_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActorName('fooValue');   // WHERE actor_name = 'fooValue'
	 * $query->filterByActorName('%fooValue%'); // WHERE actor_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actorName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByActorName($actorName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actorName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actorName)) {
				$actorName = str_replace('*', '%', $actorName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::ACTOR_NAME, $actorName, $comparison);
	}

	/**
	 * Filter the query on the actor_url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActorUrl('fooValue');   // WHERE actor_url = 'fooValue'
	 * $query->filterByActorUrl('%fooValue%'); // WHERE actor_url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actorUrl The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByActorUrl($actorUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actorUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actorUrl)) {
				$actorUrl = str_replace('*', '%', $actorUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::ACTOR_URL, $actorUrl, $comparison);
	}

	/**
	 * Filter the query on the actor_image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActorImage('fooValue');   // WHERE actor_image = 'fooValue'
	 * $query->filterByActorImage('%fooValue%'); // WHERE actor_image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actorImage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByActorImage($actorImage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actorImage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actorImage)) {
				$actorImage = str_replace('*', '%', $actorImage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::ACTOR_IMAGE, $actorImage, $comparison);
	}

	/**
	 * Filter the query on the verb column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVerb('fooValue');   // WHERE verb = 'fooValue'
	 * $query->filterByVerb('%fooValue%'); // WHERE verb LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $verb The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByVerb($verb = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($verb)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $verb)) {
				$verb = str_replace('*', '%', $verb);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::VERB, $verb, $comparison);
	}

	/**
	 * Filter the query on the object_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectId(1234); // WHERE object_id = 1234
	 * $query->filterByObjectId(array(12, 34)); // WHERE object_id IN (12, 34)
	 * $query->filterByObjectId(array('min' => 12)); // WHERE object_id > 12
	 * </code>
	 *
	 * @param     mixed $objectId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByObjectId($objectId = null, $comparison = null)
	{
		if (is_array($objectId)) {
			$useMinMax = false;
			if (isset($objectId['min'])) {
				$this->addUsingAlias(ActionPeer::OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectId['max'])) {
				$this->addUsingAlias(ActionPeer::OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionPeer::OBJECT_ID, $objectId, $comparison);
	}

	/**
	 * Filter the query on the object_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectType('fooValue');   // WHERE object_type = 'fooValue'
	 * $query->filterByObjectType('%fooValue%'); // WHERE object_type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $objectType The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByObjectType($objectType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objectType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objectType)) {
				$objectType = str_replace('*', '%', $objectType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::OBJECT_TYPE, $objectType, $comparison);
	}

	/**
	 * Filter the query on the object_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectName('fooValue');   // WHERE object_name = 'fooValue'
	 * $query->filterByObjectName('%fooValue%'); // WHERE object_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $objectName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByObjectName($objectName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objectName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objectName)) {
				$objectName = str_replace('*', '%', $objectName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::OBJECT_NAME, $objectName, $comparison);
	}

	/**
	 * Filter the query on the object_url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectUrl('fooValue');   // WHERE object_url = 'fooValue'
	 * $query->filterByObjectUrl('%fooValue%'); // WHERE object_url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $objectUrl The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByObjectUrl($objectUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objectUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objectUrl)) {
				$objectUrl = str_replace('*', '%', $objectUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::OBJECT_URL, $objectUrl, $comparison);
	}

	/**
	 * Filter the query on the object_image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectImage('fooValue');   // WHERE object_image = 'fooValue'
	 * $query->filterByObjectImage('%fooValue%'); // WHERE object_image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $objectImage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByObjectImage($objectImage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objectImage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objectImage)) {
				$objectImage = str_replace('*', '%', $objectImage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::OBJECT_IMAGE, $objectImage, $comparison);
	}

	/**
	 * Filter the query on the target_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetId(1234); // WHERE target_id = 1234
	 * $query->filterByTargetId(array(12, 34)); // WHERE target_id IN (12, 34)
	 * $query->filterByTargetId(array('min' => 12)); // WHERE target_id > 12
	 * </code>
	 *
	 * @param     mixed $targetId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByTargetId($targetId = null, $comparison = null)
	{
		if (is_array($targetId)) {
			$useMinMax = false;
			if (isset($targetId['min'])) {
				$this->addUsingAlias(ActionPeer::TARGET_ID, $targetId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($targetId['max'])) {
				$this->addUsingAlias(ActionPeer::TARGET_ID, $targetId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionPeer::TARGET_ID, $targetId, $comparison);
	}

	/**
	 * Filter the query on the target_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetType('fooValue');   // WHERE target_type = 'fooValue'
	 * $query->filterByTargetType('%fooValue%'); // WHERE target_type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $targetType The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByTargetType($targetType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetType)) {
				$targetType = str_replace('*', '%', $targetType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::TARGET_TYPE, $targetType, $comparison);
	}

	/**
	 * Filter the query on the target_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetName('fooValue');   // WHERE target_name = 'fooValue'
	 * $query->filterByTargetName('%fooValue%'); // WHERE target_name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $targetName The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByTargetName($targetName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetName)) {
				$targetName = str_replace('*', '%', $targetName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::TARGET_NAME, $targetName, $comparison);
	}

	/**
	 * Filter the query on the target_url column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetUrl('fooValue');   // WHERE target_url = 'fooValue'
	 * $query->filterByTargetUrl('%fooValue%'); // WHERE target_url LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $targetUrl The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByTargetUrl($targetUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetUrl)) {
				$targetUrl = str_replace('*', '%', $targetUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::TARGET_URL, $targetUrl, $comparison);
	}

	/**
	 * Filter the query on the target_image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetImage('fooValue');   // WHERE target_image = 'fooValue'
	 * $query->filterByTargetImage('%fooValue%'); // WHERE target_image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $targetImage The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByTargetImage($targetImage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($targetImage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $targetImage)) {
				$targetImage = str_replace('*', '%', $targetImage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionPeer::TARGET_IMAGE, $targetImage, $comparison);
	}

	/**
	 * Filter the query on the published_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPublishedAt('2011-03-14'); // WHERE published_at = '2011-03-14'
	 * $query->filterByPublishedAt('now'); // WHERE published_at = '2011-03-14'
	 * $query->filterByPublishedAt(array('max' => 'yesterday')); // WHERE published_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $publishedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function filterByPublishedAt($publishedAt = null, $comparison = null)
	{
		if (is_array($publishedAt)) {
			$useMinMax = false;
			if (isset($publishedAt['min'])) {
				$this->addUsingAlias(ActionPeer::PUBLISHED_AT, $publishedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($publishedAt['max'])) {
				$this->addUsingAlias(ActionPeer::PUBLISHED_AT, $publishedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionPeer::PUBLISHED_AT, $publishedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Action $action Object to remove from the list of results
	 *
	 * @return    ActionQuery The current query, for fluid interface
	 */
	public function prune($action = null)
	{
		if ($action) {
			$this->addUsingAlias(ActionPeer::ID, $action->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseActionQuery