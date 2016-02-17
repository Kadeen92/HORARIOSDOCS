<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'planes';
	
	public function scopePlan($query, $plan)
    {
    	//dd($plan);
    	if($plan != ""){
    	$query->where('plan',"like","%$plan%");
    	}
    	else{
    	}
    	//dd($query);
    
    
    }
}

?>
