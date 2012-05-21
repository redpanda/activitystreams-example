<?php

namespace Blog\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'action' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Blog.Model.map
 */
class ActionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Blog.Model.map.ActionTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('action');
		$this->setPhpName('Action');
		$this->setClassname('Blog\\Model\\Action');
		$this->setPackage('Blog.Model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ACTOR_ID', 'ActorId', 'INTEGER', true, null, null);
		$this->addColumn('ACTOR_TYPE', 'ActorType', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTOR_NAME', 'ActorName', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTOR_URL', 'ActorUrl', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTOR_IMAGE', 'ActorImage', 'VARCHAR', true, 255, null);
		$this->addColumn('VERB', 'Verb', 'VARCHAR', true, 255, null);
		$this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null, null);
		$this->addColumn('OBJECT_TYPE', 'ObjectType', 'VARCHAR', false, 255, null);
		$this->addColumn('OBJECT_NAME', 'ObjectName', 'VARCHAR', false, 255, null);
		$this->addColumn('OBJECT_URL', 'ObjectUrl', 'VARCHAR', false, 255, null);
		$this->addColumn('OBJECT_IMAGE', 'ObjectImage', 'VARCHAR', false, 255, null);
		$this->addColumn('TARGET_ID', 'TargetId', 'INTEGER', false, null, null);
		$this->addColumn('TARGET_TYPE', 'TargetType', 'VARCHAR', false, 255, null);
		$this->addColumn('TARGET_NAME', 'TargetName', 'VARCHAR', false, 255, null);
		$this->addColumn('TARGET_URL', 'TargetUrl', 'VARCHAR', false, 255, null);
		$this->addColumn('TARGET_IMAGE', 'TargetImage', 'VARCHAR', false, 255, null);
		$this->addColumn('PUBLISHED_AT', 'PublishedAt', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ActionTableMap
