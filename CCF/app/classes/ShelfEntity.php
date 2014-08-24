<?php 
/**
 * ShelfEntity
 **
 * 
 * @package       CCFApplication
 * @author        Zaphod Beeblebrox <info@example.com>
 * @version       1.0.0
 * @copyright     2014 Magrathea Example
 */
class ShelfEntity extends \DB\Model
{
	/**
	 * The database table name
	 * 
	 * @var string
	 */
	protected static $_table = 'shelf_base';
	
	/*
	 * Let the model automatically set created_at and modified_at 
	 */
	protected static $_timestamps = true;
	
	/**
	 * The  default properties
	 * 
	 * @var string
	 */
	protected static $_defaults = array(
		'id',
		'type',
		'title'			=> array( 'string', '' ),
		'description'	=> array( 'string', '' ),
		'created_by'	=> array( 'int', 0 ),
		'created_at'	=> array( 'timestamp' ),
		'modified_by'	=> array( 'int', 0 ),
		'modified_at'	=> array( 'timestamp' ),
		'contributors'	=> array( 'json', array() ),	
		'locked'		=> array( 'bool', false ),
		'deleted'		=> array( 'bool', false )
	);

	public function permissions ()
	{
		return $this->has_many( 'ShelfPermission', 'shelf_id', 'id' );
	}

	public function has_permission($user = null)
	{
		if ($user === null)
		{
			$user = App::$user;
		}
		return ShelfPermission::create($this->permissions()->where('user_id', $user->id)->first());
	}
}
