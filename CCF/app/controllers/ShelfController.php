<?php 
/**
 * ShelfController
 **
 * 
 * @package       ShelfBoard
 * @author        Ludwig Behm <ludwig.behm@gmail.com>
 * @version       1.0.0
 * @copyright     2014 Ludwig Behm
 * 
 */
class ShelfController extends CCViewController
{
	/**
	 * Index action
	 * @return void|CCResponse
	 */
	protected function action_index()
	{
		if (is_null(App::$user->id))
		{
			UI\Alert::flash( 'warning', 'You must be logged in!' );
			return CCRedirect::alias( 'auth.sign_in' );
		}
		$this->theme->topic = "Shelf";
		$this->view = $this->theme->view( 'shelf/index' );

		//$this->view->entities = ShelfEntity::find();
		$this->view->entities = DB::fetch("SELECT `shelf_base`.* FROM `shelf_base` INNER JOIN `shelf_permissions` ON `shelf_base`.`id` = `shelf_permissions`.`shelf_id` WHERE `shelf_permissions`.`user_id` = ". App::$user->id ." AND `deleted` = 0");
	}

	/**
	 * Create action
	 * @return void|CCResponse
	 */
	protected function action_create()
	{
		$this->theme->topic = "Create";
		$this->view = $this->theme->view( 'shelf/create' );

		if ( CCIn::method( 'post' ) )
		{
			$entity = null;
			switch (CCIn::post('type'))
			{
				case 'conversation':
					$entity = new ShelfConversationThread;
				break;
				case 'poll':

				//break;
				case 'file':
					$entity = new ShelfEntity;
				break;
				default:
			}
			if (! $entity instanceof ShelfEntity)
			{
				UI\Alert::flash( 'error', 'Your post hasn\'t been created!' );
				return CCRedirect::action( 'index' );
			}
			// create new Post model
			$entity = new ShelfEntity;

			// assign specific post data
			$entity->strict_assign( array( 'title', 'description' ), CCIn::all( 'post' ) );

			// save the new post to the database
			$entity->save();

			// add an ui message
			UI\Alert::flash( 'success', 'Your post has been created successfully.' );

			// redirect to index
			return CCRedirect::action( 'index' );
		}
	}
	
	/**
	 * Create action
	 * @return void|CCResponse
	 */
	protected function action_detail($id)
	{
		$shelfItem = ShelfEntity::find($id);
		if (!($shelfItem instanceof ShelfEntity && is_string($shelfItem->type)))
		{
			UI\Alert::flash( 'error', 'This isn\'t the page you\'re looking for!' );
			return CCRedirect::action( 'index' );
		}
		switch ($shelfItem->type)
		{
			case 'conversation':
				return self::_detail_conversation($shelfItem);
			break;
			case 'poll':
			case 'file':
			default:
				UI\Alert::flash( 'error', 'This isn\'t the page you\'re looking for!' );
				return CCRedirect::action( 'index' );
			break;
		}
	}

	private function _detail_conversation($shelfItem)
	{
		print_r($shelfItem);
		$thread = ShelfConversationThread::create($shelfItem->raw);
		$this->view = $this->theme->view( 'shelf/conversation/thread' );
		$this->theme->topic = $thread->title;
		$this->view->thread = $thread;

		if ( !is_null(App::$user->id) && (CCIn::method( 'post' )) && (CCIn::has_post('text')))
		{
			$post = new ShelfConversation;
			$post->shelf_id = $thread->id;
			$post->text = CCIn::post('text');
			$post->created_by = $post->modified_by = App::$user->id;
			$post->save();
		}
		
		$this->view->conversations = $thread->conversations()->run();
	}

	/**
	 * Controller wake
	 * @return void|CCResponse
	 */
	protected function wake()
	{
		//
	}
	
	/**
	 * Controller wake
	 * @return void
	 */
	protected function sleep()
	{
		//
	}
}
