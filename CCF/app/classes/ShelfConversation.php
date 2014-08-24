<?php 
/**
 * ShelfConversation
 **
 * 
 * @package       CCFApplication
 * @author        Zaphod Beeblebrox <info@example.com>
 * @version       1.0.0
 * @copyright     2014 Magrathea Example
 */
class ShelfConversation extends \DB\Model
{
	/**
	 * The database table name
	 * 
	 * @var string
	 */
	protected static $_table = 'shelf_conversations';
	
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
		'shelf_id'		=> array( 'int' ),
		'text'			=> array( 'string', '' ),
		'created_by'	=> array( 'int', 0 ),
		'created_at'	=> array( 'timestamp' ),
		'modified_by'	=> array( 'int', 0 ),
		'modified_at'	=> array( 'timestamp' ),
		'locked'		=> array( 'bool', false ),
		'deleted'		=> array( 'bool', false )
	);

	/**
	 * Get the ShelfConversationThread
	 *
	 * @return ShelfConversationThread
	 */
	public function thread()
	{
		return $this->belongs_to( 'ShelfConversationThread', 'id', 'shelf_id' );
	}
	
	
}
