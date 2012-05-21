<?php

namespace Blog\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \DateTimeZone;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Blog\Model\ActionPeer;
use Blog\Model\ActionQuery;

/**
 * Base class that represents a row from the 'action' table.
 *
 * 
 *
 * @package    propel.generator.Blog.Model.om
 */
abstract class BaseAction extends BaseObject 
{

	/**
	 * Peer class name
	 */
	const PEER = 'Blog\\Model\\ActionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ActionPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the actor_id field.
	 * @var        int
	 */
	protected $actor_id;

	/**
	 * The value for the actor_type field.
	 * @var        string
	 */
	protected $actor_type;

	/**
	 * The value for the actor_name field.
	 * @var        string
	 */
	protected $actor_name;

	/**
	 * The value for the actor_url field.
	 * @var        string
	 */
	protected $actor_url;

	/**
	 * The value for the actor_image field.
	 * @var        string
	 */
	protected $actor_image;

	/**
	 * The value for the verb field.
	 * @var        string
	 */
	protected $verb;

	/**
	 * The value for the object_id field.
	 * @var        int
	 */
	protected $object_id;

	/**
	 * The value for the object_type field.
	 * @var        string
	 */
	protected $object_type;

	/**
	 * The value for the object_name field.
	 * @var        string
	 */
	protected $object_name;

	/**
	 * The value for the object_url field.
	 * @var        string
	 */
	protected $object_url;

	/**
	 * The value for the object_image field.
	 * @var        string
	 */
	protected $object_image;

	/**
	 * The value for the target_id field.
	 * @var        int
	 */
	protected $target_id;

	/**
	 * The value for the target_type field.
	 * @var        string
	 */
	protected $target_type;

	/**
	 * The value for the target_name field.
	 * @var        string
	 */
	protected $target_name;

	/**
	 * The value for the target_url field.
	 * @var        string
	 */
	protected $target_url;

	/**
	 * The value for the target_image field.
	 * @var        string
	 */
	protected $target_image;

	/**
	 * The value for the published_at field.
	 * @var        string
	 */
	protected $published_at;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [actor_id] column value.
	 * 
	 * @return     int
	 */
	public function getActorId()
	{
		return $this->actor_id;
	}

	/**
	 * Get the [actor_type] column value.
	 * 
	 * @return     string
	 */
	public function getActorType()
	{
		return $this->actor_type;
	}

	/**
	 * Get the [actor_name] column value.
	 * 
	 * @return     string
	 */
	public function getActorName()
	{
		return $this->actor_name;
	}

	/**
	 * Get the [actor_url] column value.
	 * 
	 * @return     string
	 */
	public function getActorUrl()
	{
		return $this->actor_url;
	}

	/**
	 * Get the [actor_image] column value.
	 * 
	 * @return     string
	 */
	public function getActorImage()
	{
		return $this->actor_image;
	}

	/**
	 * Get the [verb] column value.
	 * 
	 * @return     string
	 */
	public function getVerb()
	{
		return $this->verb;
	}

	/**
	 * Get the [object_id] column value.
	 * 
	 * @return     int
	 */
	public function getObjectId()
	{
		return $this->object_id;
	}

	/**
	 * Get the [object_type] column value.
	 * 
	 * @return     string
	 */
	public function getObjectType()
	{
		return $this->object_type;
	}

	/**
	 * Get the [object_name] column value.
	 * 
	 * @return     string
	 */
	public function getObjectName()
	{
		return $this->object_name;
	}

	/**
	 * Get the [object_url] column value.
	 * 
	 * @return     string
	 */
	public function getObjectUrl()
	{
		return $this->object_url;
	}

	/**
	 * Get the [object_image] column value.
	 * 
	 * @return     string
	 */
	public function getObjectImage()
	{
		return $this->object_image;
	}

	/**
	 * Get the [target_id] column value.
	 * 
	 * @return     int
	 */
	public function getTargetId()
	{
		return $this->target_id;
	}

	/**
	 * Get the [target_type] column value.
	 * 
	 * @return     string
	 */
	public function getTargetType()
	{
		return $this->target_type;
	}

	/**
	 * Get the [target_name] column value.
	 * 
	 * @return     string
	 */
	public function getTargetName()
	{
		return $this->target_name;
	}

	/**
	 * Get the [target_url] column value.
	 * 
	 * @return     string
	 */
	public function getTargetUrl()
	{
		return $this->target_url;
	}

	/**
	 * Get the [target_image] column value.
	 * 
	 * @return     string
	 */
	public function getTargetImage()
	{
		return $this->target_image;
	}

	/**
	 * Get the [optionally formatted] temporal [published_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPublishedAt($format = NULL)
	{
		if ($this->published_at === null) {
			return null;
		}


		if ($this->published_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->published_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->published_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ActionPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [actor_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setActorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->actor_id !== $v) {
			$this->actor_id = $v;
			$this->modifiedColumns[] = ActionPeer::ACTOR_ID;
		}

		return $this;
	} // setActorId()

	/**
	 * Set the value of [actor_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setActorType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor_type !== $v) {
			$this->actor_type = $v;
			$this->modifiedColumns[] = ActionPeer::ACTOR_TYPE;
		}

		return $this;
	} // setActorType()

	/**
	 * Set the value of [actor_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setActorName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor_name !== $v) {
			$this->actor_name = $v;
			$this->modifiedColumns[] = ActionPeer::ACTOR_NAME;
		}

		return $this;
	} // setActorName()

	/**
	 * Set the value of [actor_url] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setActorUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor_url !== $v) {
			$this->actor_url = $v;
			$this->modifiedColumns[] = ActionPeer::ACTOR_URL;
		}

		return $this;
	} // setActorUrl()

	/**
	 * Set the value of [actor_image] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setActorImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor_image !== $v) {
			$this->actor_image = $v;
			$this->modifiedColumns[] = ActionPeer::ACTOR_IMAGE;
		}

		return $this;
	} // setActorImage()

	/**
	 * Set the value of [verb] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setVerb($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->verb !== $v) {
			$this->verb = $v;
			$this->modifiedColumns[] = ActionPeer::VERB;
		}

		return $this;
	} // setVerb()

	/**
	 * Set the value of [object_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setObjectId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->object_id !== $v) {
			$this->object_id = $v;
			$this->modifiedColumns[] = ActionPeer::OBJECT_ID;
		}

		return $this;
	} // setObjectId()

	/**
	 * Set the value of [object_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setObjectType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->object_type !== $v) {
			$this->object_type = $v;
			$this->modifiedColumns[] = ActionPeer::OBJECT_TYPE;
		}

		return $this;
	} // setObjectType()

	/**
	 * Set the value of [object_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setObjectName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->object_name !== $v) {
			$this->object_name = $v;
			$this->modifiedColumns[] = ActionPeer::OBJECT_NAME;
		}

		return $this;
	} // setObjectName()

	/**
	 * Set the value of [object_url] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setObjectUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->object_url !== $v) {
			$this->object_url = $v;
			$this->modifiedColumns[] = ActionPeer::OBJECT_URL;
		}

		return $this;
	} // setObjectUrl()

	/**
	 * Set the value of [object_image] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setObjectImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->object_image !== $v) {
			$this->object_image = $v;
			$this->modifiedColumns[] = ActionPeer::OBJECT_IMAGE;
		}

		return $this;
	} // setObjectImage()

	/**
	 * Set the value of [target_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setTargetId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->target_id !== $v) {
			$this->target_id = $v;
			$this->modifiedColumns[] = ActionPeer::TARGET_ID;
		}

		return $this;
	} // setTargetId()

	/**
	 * Set the value of [target_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setTargetType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target_type !== $v) {
			$this->target_type = $v;
			$this->modifiedColumns[] = ActionPeer::TARGET_TYPE;
		}

		return $this;
	} // setTargetType()

	/**
	 * Set the value of [target_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setTargetName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target_name !== $v) {
			$this->target_name = $v;
			$this->modifiedColumns[] = ActionPeer::TARGET_NAME;
		}

		return $this;
	} // setTargetName()

	/**
	 * Set the value of [target_url] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setTargetUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target_url !== $v) {
			$this->target_url = $v;
			$this->modifiedColumns[] = ActionPeer::TARGET_URL;
		}

		return $this;
	} // setTargetUrl()

	/**
	 * Set the value of [target_image] column.
	 * 
	 * @param      string $v new value
	 * @return     Action The current object (for fluent API support)
	 */
	public function setTargetImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target_image !== $v) {
			$this->target_image = $v;
			$this->modifiedColumns[] = ActionPeer::TARGET_IMAGE;
		}

		return $this;
	} // setTargetImage()

	/**
	 * Sets the value of [published_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Action The current object (for fluent API support)
	 */
	public function setPublishedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->published_at !== null || $dt !== null) {
			$currentDateAsString = ($this->published_at !== null && $tmpDt = new DateTime($this->published_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->published_at = $newDateAsString;
				$this->modifiedColumns[] = ActionPeer::PUBLISHED_AT;
			}
		} // if either are not null

		return $this;
	} // setPublishedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->actor_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->actor_type = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->actor_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->actor_url = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->actor_image = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->verb = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->object_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->object_type = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->object_name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->object_url = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->object_image = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->target_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->target_type = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->target_name = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->target_url = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->target_image = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->published_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 18; // 18 = ActionPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Action object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ActionQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				ActionPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = ActionPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ActionPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ActionPeer::ACTOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR_ID`';
		}
		if ($this->isColumnModified(ActionPeer::ACTOR_TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR_TYPE`';
		}
		if ($this->isColumnModified(ActionPeer::ACTOR_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR_NAME`';
		}
		if ($this->isColumnModified(ActionPeer::ACTOR_URL)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR_URL`';
		}
		if ($this->isColumnModified(ActionPeer::ACTOR_IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR_IMAGE`';
		}
		if ($this->isColumnModified(ActionPeer::VERB)) {
			$modifiedColumns[':p' . $index++]  = '`VERB`';
		}
		if ($this->isColumnModified(ActionPeer::OBJECT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`OBJECT_ID`';
		}
		if ($this->isColumnModified(ActionPeer::OBJECT_TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`OBJECT_TYPE`';
		}
		if ($this->isColumnModified(ActionPeer::OBJECT_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`OBJECT_NAME`';
		}
		if ($this->isColumnModified(ActionPeer::OBJECT_URL)) {
			$modifiedColumns[':p' . $index++]  = '`OBJECT_URL`';
		}
		if ($this->isColumnModified(ActionPeer::OBJECT_IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`OBJECT_IMAGE`';
		}
		if ($this->isColumnModified(ActionPeer::TARGET_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_ID`';
		}
		if ($this->isColumnModified(ActionPeer::TARGET_TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_TYPE`';
		}
		if ($this->isColumnModified(ActionPeer::TARGET_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_NAME`';
		}
		if ($this->isColumnModified(ActionPeer::TARGET_URL)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_URL`';
		}
		if ($this->isColumnModified(ActionPeer::TARGET_IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET_IMAGE`';
		}
		if ($this->isColumnModified(ActionPeer::PUBLISHED_AT)) {
			$modifiedColumns[':p' . $index++]  = '`PUBLISHED_AT`';
		}

		$sql = sprintf(
			'INSERT INTO `action` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`ACTOR_ID`':
						$stmt->bindValue($identifier, $this->actor_id, PDO::PARAM_INT);
						break;
					case '`ACTOR_TYPE`':
						$stmt->bindValue($identifier, $this->actor_type, PDO::PARAM_STR);
						break;
					case '`ACTOR_NAME`':
						$stmt->bindValue($identifier, $this->actor_name, PDO::PARAM_STR);
						break;
					case '`ACTOR_URL`':
						$stmt->bindValue($identifier, $this->actor_url, PDO::PARAM_STR);
						break;
					case '`ACTOR_IMAGE`':
						$stmt->bindValue($identifier, $this->actor_image, PDO::PARAM_STR);
						break;
					case '`VERB`':
						$stmt->bindValue($identifier, $this->verb, PDO::PARAM_STR);
						break;
					case '`OBJECT_ID`':
						$stmt->bindValue($identifier, $this->object_id, PDO::PARAM_INT);
						break;
					case '`OBJECT_TYPE`':
						$stmt->bindValue($identifier, $this->object_type, PDO::PARAM_STR);
						break;
					case '`OBJECT_NAME`':
						$stmt->bindValue($identifier, $this->object_name, PDO::PARAM_STR);
						break;
					case '`OBJECT_URL`':
						$stmt->bindValue($identifier, $this->object_url, PDO::PARAM_STR);
						break;
					case '`OBJECT_IMAGE`':
						$stmt->bindValue($identifier, $this->object_image, PDO::PARAM_STR);
						break;
					case '`TARGET_ID`':
						$stmt->bindValue($identifier, $this->target_id, PDO::PARAM_INT);
						break;
					case '`TARGET_TYPE`':
						$stmt->bindValue($identifier, $this->target_type, PDO::PARAM_STR);
						break;
					case '`TARGET_NAME`':
						$stmt->bindValue($identifier, $this->target_name, PDO::PARAM_STR);
						break;
					case '`TARGET_URL`':
						$stmt->bindValue($identifier, $this->target_url, PDO::PARAM_STR);
						break;
					case '`TARGET_IMAGE`':
						$stmt->bindValue($identifier, $this->target_image, PDO::PARAM_STR);
						break;
					case '`PUBLISHED_AT`':
						$stmt->bindValue($identifier, $this->published_at, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = ActionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                     Defaults to BasePeer::TYPE_PHPNAME
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getActorId();
				break;
			case 2:
				return $this->getActorType();
				break;
			case 3:
				return $this->getActorName();
				break;
			case 4:
				return $this->getActorUrl();
				break;
			case 5:
				return $this->getActorImage();
				break;
			case 6:
				return $this->getVerb();
				break;
			case 7:
				return $this->getObjectId();
				break;
			case 8:
				return $this->getObjectType();
				break;
			case 9:
				return $this->getObjectName();
				break;
			case 10:
				return $this->getObjectUrl();
				break;
			case 11:
				return $this->getObjectImage();
				break;
			case 12:
				return $this->getTargetId();
				break;
			case 13:
				return $this->getTargetType();
				break;
			case 14:
				return $this->getTargetName();
				break;
			case 15:
				return $this->getTargetUrl();
				break;
			case 16:
				return $this->getTargetImage();
				break;
			case 17:
				return $this->getPublishedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['Action'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Action'][$this->getPrimaryKey()] = true;
		$keys = ActionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getActorId(),
			$keys[2] => $this->getActorType(),
			$keys[3] => $this->getActorName(),
			$keys[4] => $this->getActorUrl(),
			$keys[5] => $this->getActorImage(),
			$keys[6] => $this->getVerb(),
			$keys[7] => $this->getObjectId(),
			$keys[8] => $this->getObjectType(),
			$keys[9] => $this->getObjectName(),
			$keys[10] => $this->getObjectUrl(),
			$keys[11] => $this->getObjectImage(),
			$keys[12] => $this->getTargetId(),
			$keys[13] => $this->getTargetType(),
			$keys[14] => $this->getTargetName(),
			$keys[15] => $this->getTargetUrl(),
			$keys[16] => $this->getTargetImage(),
			$keys[17] => $this->getPublishedAt(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                     Defaults to BasePeer::TYPE_PHPNAME
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setActorId($value);
				break;
			case 2:
				$this->setActorType($value);
				break;
			case 3:
				$this->setActorName($value);
				break;
			case 4:
				$this->setActorUrl($value);
				break;
			case 5:
				$this->setActorImage($value);
				break;
			case 6:
				$this->setVerb($value);
				break;
			case 7:
				$this->setObjectId($value);
				break;
			case 8:
				$this->setObjectType($value);
				break;
			case 9:
				$this->setObjectName($value);
				break;
			case 10:
				$this->setObjectUrl($value);
				break;
			case 11:
				$this->setObjectImage($value);
				break;
			case 12:
				$this->setTargetId($value);
				break;
			case 13:
				$this->setTargetType($value);
				break;
			case 14:
				$this->setTargetName($value);
				break;
			case 15:
				$this->setTargetUrl($value);
				break;
			case 16:
				$this->setTargetImage($value);
				break;
			case 17:
				$this->setPublishedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's BasePeer::TYPE_PHPNAME
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ActionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setActorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setActorType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActorName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActorUrl($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActorImage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setVerb($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObjectId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObjectType($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObjectName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setObjectUrl($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObjectImage($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTargetId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTargetType($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTargetName($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTargetUrl($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTargetImage($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPublishedAt($arr[$keys[17]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ActionPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActionPeer::ID)) $criteria->add(ActionPeer::ID, $this->id);
		if ($this->isColumnModified(ActionPeer::ACTOR_ID)) $criteria->add(ActionPeer::ACTOR_ID, $this->actor_id);
		if ($this->isColumnModified(ActionPeer::ACTOR_TYPE)) $criteria->add(ActionPeer::ACTOR_TYPE, $this->actor_type);
		if ($this->isColumnModified(ActionPeer::ACTOR_NAME)) $criteria->add(ActionPeer::ACTOR_NAME, $this->actor_name);
		if ($this->isColumnModified(ActionPeer::ACTOR_URL)) $criteria->add(ActionPeer::ACTOR_URL, $this->actor_url);
		if ($this->isColumnModified(ActionPeer::ACTOR_IMAGE)) $criteria->add(ActionPeer::ACTOR_IMAGE, $this->actor_image);
		if ($this->isColumnModified(ActionPeer::VERB)) $criteria->add(ActionPeer::VERB, $this->verb);
		if ($this->isColumnModified(ActionPeer::OBJECT_ID)) $criteria->add(ActionPeer::OBJECT_ID, $this->object_id);
		if ($this->isColumnModified(ActionPeer::OBJECT_TYPE)) $criteria->add(ActionPeer::OBJECT_TYPE, $this->object_type);
		if ($this->isColumnModified(ActionPeer::OBJECT_NAME)) $criteria->add(ActionPeer::OBJECT_NAME, $this->object_name);
		if ($this->isColumnModified(ActionPeer::OBJECT_URL)) $criteria->add(ActionPeer::OBJECT_URL, $this->object_url);
		if ($this->isColumnModified(ActionPeer::OBJECT_IMAGE)) $criteria->add(ActionPeer::OBJECT_IMAGE, $this->object_image);
		if ($this->isColumnModified(ActionPeer::TARGET_ID)) $criteria->add(ActionPeer::TARGET_ID, $this->target_id);
		if ($this->isColumnModified(ActionPeer::TARGET_TYPE)) $criteria->add(ActionPeer::TARGET_TYPE, $this->target_type);
		if ($this->isColumnModified(ActionPeer::TARGET_NAME)) $criteria->add(ActionPeer::TARGET_NAME, $this->target_name);
		if ($this->isColumnModified(ActionPeer::TARGET_URL)) $criteria->add(ActionPeer::TARGET_URL, $this->target_url);
		if ($this->isColumnModified(ActionPeer::TARGET_IMAGE)) $criteria->add(ActionPeer::TARGET_IMAGE, $this->target_image);
		if ($this->isColumnModified(ActionPeer::PUBLISHED_AT)) $criteria->add(ActionPeer::PUBLISHED_AT, $this->published_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ActionPeer::DATABASE_NAME);
		$criteria->add(ActionPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Action (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setActorId($this->getActorId());
		$copyObj->setActorType($this->getActorType());
		$copyObj->setActorName($this->getActorName());
		$copyObj->setActorUrl($this->getActorUrl());
		$copyObj->setActorImage($this->getActorImage());
		$copyObj->setVerb($this->getVerb());
		$copyObj->setObjectId($this->getObjectId());
		$copyObj->setObjectType($this->getObjectType());
		$copyObj->setObjectName($this->getObjectName());
		$copyObj->setObjectUrl($this->getObjectUrl());
		$copyObj->setObjectImage($this->getObjectImage());
		$copyObj->setTargetId($this->getTargetId());
		$copyObj->setTargetType($this->getTargetType());
		$copyObj->setTargetName($this->getTargetName());
		$copyObj->setTargetUrl($this->getTargetUrl());
		$copyObj->setTargetImage($this->getTargetImage());
		$copyObj->setPublishedAt($this->getPublishedAt());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Action Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ActionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ActionPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->actor_id = null;
		$this->actor_type = null;
		$this->actor_name = null;
		$this->actor_url = null;
		$this->actor_image = null;
		$this->verb = null;
		$this->object_id = null;
		$this->object_type = null;
		$this->object_name = null;
		$this->object_url = null;
		$this->object_image = null;
		$this->target_id = null;
		$this->target_type = null;
		$this->target_name = null;
		$this->target_url = null;
		$this->target_image = null;
		$this->published_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ActionPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseAction
