<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Salones extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'salones';
	
	public function scopeSalon($query, $salon)
    {
    	//dd($plan);
    	if($salon != ""){
    	$query->where('salon',"like","%$salon%");
    	}
    	else{
    	}
    	//dd($query);
    
    
    }
}

?>
