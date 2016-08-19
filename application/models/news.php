<?php
class News_model extends CI_Model
{
	protected $table_name = "news";
    public function __construct() {
        parent::__construct();
    }
	
	public function getNews()
	{
		$result =  $this->db->where($user)->from( $this->table_name )->get()->row_array();
		if( !$result )
		{
			return 0;
		}
		else
		{
			return $result;
		}			
		}catch( Exeption $e ){
			return $e->getMessage();
		}
	}
}