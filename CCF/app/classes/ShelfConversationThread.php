<?php 
/**
 * ShelfConversationThread
 **
 * 
 * @package       CCFApplication
 * @author        Zaphod Beeblebrox <info@example.com>
 * @version       1.0.0
 * @copyright     2014 Magrathea Example
 */
class ShelfConversationThread extends ShelfEntity
{

	/**
	 * The  default properties
	 * 
	 * @var string
	 */
	protected static $_defaults = array(
		'id',
		'type'			=> array( 'string', 'conversation' ),
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
	
	/**
	 * Get the ShelfConversations
	 *
	 * @return ShelfConversation
	 */
	public function conversations()
	{
		return $this->has_many( 'ShelfConversation', 'shelf_id', 'id' );
	}
}
