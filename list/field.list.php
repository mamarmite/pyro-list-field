<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * List Field Type
 *
 * @package		Addons\Field Types
 * @author		James Doyle (james2doyle)
 * @author 		Marc-André Martin (@mamarmite);
 * @license		MIT License
 * @link		http://github.com/james2doyle/pyro-list-field
 * @link		http://github.com/mamarmite/pyro-list-field
 * @todo  		Use JSON for decode, encode for a better hierarchical structure.
 */
class Field_list
{
	public $field_type_slug    = 'list';
	public $db_col_type        = 'text';
	public $version            = '1.2.0';
	public $author             = array('name'=>'James Doyle', 'url'=>'http://github.com/james2doyle/pyro-list-field');

	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	// --------------------------------------------------------------------------

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data)
	{
		$output = gettype($data['value']) == "array" ? $data['value'] : unserialize($data['value']);

		if (is_null($output) || strlen($output[0]) == 0) {
			return '<ul class="list_field" id="'.$data['form_slug'].'"><li><textarea name="'.$data['form_slug'].'[0]" class="item_input" placeholder="'.lang('streams:list.placeholder').'"></textarea><div class="btn gray add">'.lang('streams:list.item_actions.add').'</div><div class="btn gray remove">'.lang('streams:list.item_actions.remove').'</div></li></ul>';
		} else {
			$str = '<ul class="list_field" id="'.$data['form_slug'].'">';
			foreach ($output as $key => $value) {
				if (!empty($value)) {
					$str .= '<li><textarea name="'.$data['form_slug'].'['.$key.']" class="item_input" placeholder="List item content...">'.$value.'</textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li>';
				}
			}
			return $str.'</ul>';
		}
	}

	/**
	 * event
	 * @param type $field 
	 * @return no return.
	 */
	public function event($field)
	{
		$this->CI->type->add_css('list', 'list.css');
		$this->CI->type->add_js('list', 'list.js');
	}

	/**
	 * pre_save
	 * Done before every saving to DB
	 * @param type $input 
	 * @return type
	 */
	public function pre_save($input)
	{
		//On duplicate page, this is already serialize, so we do nothing. Otherwise, it become double serialize like: s:615:a:1, etc..
		return gettype($input) === "string" ? $input : serialize($input);
	}

	/**
	 * Output for Admin
	 *
	 * @param	$input string
	 * @param	$params array
	 * @return	string
	 */
	public function pre_output($input, $data)
	{
		$input = unserialize($data);
		if ($input) {
			$output = array();
			
			foreach ($input as $key => $value) {
				if (empty($value) || !isset($value)) continue;
				$output["items"][] = array(
					'key' => $key,
					'value' => $value,
					);
			}
			$output["count"] = count($output["items"]);
			$output["has_item"] = count($output["items"]) > 0 ? true : false;
			return $output;
		}
	}


	/**
	 * Tag output variables
	 *
	 * @param string	$input 
	 * @param array		$params 
	 * @return array
	 */
	public function pre_output_plugin($input, $params)
	{
		//didn't see any difference wtih pre_outpout so, do nothing.
	}
}
