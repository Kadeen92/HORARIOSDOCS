<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'carreras';
	
	public function scopeCarrera($query, $carrera)
    {
    	//dd($plan);
    	if($carrera != ""){
    		$query->where('carrera',"like","%$carrera%");
    	}
    	else{
    	}
    	//dd($query);
    
    
    }
}

?>
