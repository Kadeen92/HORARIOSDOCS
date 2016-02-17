<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpm extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'cxpxm';
	
	//EN CONSTRUCCIÓN
	/*public function scopeCmp($query, $cmp)
    {
    	
    	if($cmp != ""){
    	$P = $query->where('plan',"like","%$cmp%");
    	$query->where('idplan',"like","%$p%");
    	}
    	else{
    	}
    	
    
    
    }*/
}

?>
