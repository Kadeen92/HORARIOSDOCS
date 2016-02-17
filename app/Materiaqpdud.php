<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiaqpdud extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'materiaqpdud';
	
	
	public function scopeMxd($query, $mxd)
    {
    	//dd($plan);
    	if($mxd != ""){
    	$query->where('id', $mxd);
    	}
    	else{
    	}
    	//dd($query);
    
    }
}

?>
