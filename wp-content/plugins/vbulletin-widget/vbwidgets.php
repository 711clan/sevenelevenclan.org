<?php
	
/*
Plugin Name: Vbulletin widget
Plugin URI: 
Description: Allows you to display a list of latest threads from Vbulletin forum
Author: Dinko Miletic
Version: 1.0
Author URI: dinko.miletic@gmail.com
*/


class Threads_Vbulletin extends WP_Widget {

	private $root;
	
	public function __construct() {
		
		/* Widget settings. */
		$widget_ops = array(
			'classname' => 'vbulletin', 
			'description' => 'Allows you to display a list of latest threads from Vbulletin forum.');

		/* Widget control settings. */
		$control_ops = array(
			'width' => 250, 
			'height' => 250, 
			'id_base' => 'vbulletin-widget');
			
		parent::__construct('vbulletin-widget','Latest threads from a Vbulletin',$widget_ops,$control_ops);	
		
		//check for possible forum root
		$this->check_roots();
	}
	
	function form ($instance) {

		/* Set up some default widget settings. */
		$defaults = array('title'=>'Recent forum threads','forum_root'=>$this->root,'numberposts' => '5');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $instance['title'] ?>" size="20">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('forum_root'); ?>">Forum root:</label>
			<input type="text" name="<?php echo $this->get_field_name('forum_root') ?>" id="<?php echo $this->get_field_id('forum_root') ?> " value="<?php echo $instance['forum_root'] ?>" size="20">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('numberposts'); ?>">Number of posts:</label>
			<input type="text" name="<?php echo $this->get_field_name('numberposts') ?>" id="<?php echo $this->get_field_id('numberposts') ?> " value="<?php echo $instance['numberposts'] ?>" size="20">	
		</p>
		
		<?php
	}

	function update ($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title']=$new_instance['title'];
		$instance['numberposts'] = $new_instance['numberposts'];
		$instance['forum_root'] = $new_instance['forum_root'];

		return $instance;
	}

	function widget ($args,$instance) {
		extract($args);
		$numberposts = $instance['numberposts'];
		$title=$instance['title'];
		$forum_root=$instance['forum_root'];
        
		$this->include_global($forum_root);
		
		global $vbulletin, $db; 
		
		$forum_url=$vbulletin->options['bburl'];			
        //Begin Thread Counts   
        $toutput=''; 
       
		//query threads	   
		$recent_threads = $vbulletin->db->query_read("   
		SELECT thread.threadid, thread.title, thread.dateline, thread.lastpost, thread.lastposter, thread.lastposterid, thread.visible, thread.open, thread.postusername, thread.postuserid, thread.replycount, thread.views, forum.forumid, forum.title as forumtitle
        FROM  " . TABLE_PREFIX . "thread AS thread   
        LEFT JOIN  " . TABLE_PREFIX . "forum AS forum ON ( forum.forumid = thread.forumid )  
        WHERE NOT ISNULL(threadid) AND visible = '1' AND open!='10'   
        ORDER BY lastpost DESC   
		LIMIT 0, $numberposts   
        ");   
		
         $toutput.='<ul class="wbulletin-thread-list">';
         $i = 0; 
         while ($recent_thread = $db->fetch_array($recent_threads)) {   
			
			$i++; 
              	   
            $recent_thread[title] = unhtmlspecialchars($recent_thread[title]);   
            $recent_thread[lastpostdate] = vbdate('M jS', $recent_thread[lastpost], 1);   
            $recent_thread[lastposttime] = vbdate($vbulletin->options['timeformat'], $recent_thread[lastpost]);  
            $toutput .='<li class="vbulletin-thread-item"><a class="vbulletin-thread-link" href="'.$forum_url.'/showthread.php?t='.    $recent_thread[threadid].'">'.    $recent_thread[title].'</a><br/>';  
            $toutput .='Last Post By: <a class="vbulletin-thread-poster" href="'.$forum_url.'/member.php?u='.$recent_thread[lastposterid].'">'.$recent_thread[lastposter].'</a>';  
            $toutput .=' in <a class="vbulletin-thread-name" href="'.$forum_url.'/forumdisplay.php?f='.$recent_thread[forumid].'">'.$recent_thread[forumtitle].'</a><br/> Replies: '.$recent_thread[replycount].'<br/>';  
            $toutput .='Posted: <span class="vbulletin-thread-date">'.$recent_thread[lastpostdate].'</span> at: <span class="vbulletin-thread-time">'. $recent_thread[lastposttime].'</span></li>';  
				   
		}  
               
		$toutput.='</ul>';
		//End Thread Counts   
         
		$db->free_result($recent_threads);
		//print the widget for the sidebar
		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo $toutput;
		echo $after_widget;
	}
	
	
	private function check_roots(){
		$possible_root=$_SERVER['DOCUMENT_ROOT'].'forum/';
		$possible_root1=$_SERVER['DOCUMENT_ROOT'].'forums/';
		
		//check for possible forum roots
		if(is_dir($possible_root) && file_exists($possible_root.'global.php')){
			$this->root = $possible_root;
		}
		else if(is_dir($possible_root1) && file_exists($possible_root1.'global.php')){
			$this->root = $possible_root1;
		}
			
	}
	
	//pull global.php in wordpress template
	private function include_global($forum_root)
	{			
		$curdir = getcwd();
		chdir($forum_root);
		require_once($forum_root . 'global.php');
		chdir($curdir);
	}
}

function ahspfc_load_widgets() {
	register_widget('Threads_Vbulletin');
}

add_action('widgets_init', 'ahspfc_load_widgets');

?>