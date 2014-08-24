<?php 
/**
 * ShelfPermission
 **
 * 
 * @package       CCFApplication
 * @author        Zaphod Beeblebrox <info@example.com>
 * @version       1.0.0
 * @copyright     2014 Magrathea Example
 */
class ShelfPermission extends \DB\Model
{
	/**
	 * The database table name
	 * 
	 * @var string
	 */
	protected static $_table = 'shelf_permissions';
	
	/**
	 * The  default properties
	 * 
	 * @var string
	 */
	protected static $_defaults = array(
		'id',
		'shelf_id' => array( 'int', 0 ),
		'user_id' => array( 'int', 0 )
	);

	public function User ()
	{
		return $this->belongs_to( 'User', 'id', 'user_id' );
	}

	public function ShelfItem ()
	{
		return $this->belongs_to( 'ShelfEntity', 'id', 'shelf_id' );
	}
}
