<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'materias';
	
	
	public function scopeMat($query, $mat)
    {
    	//dd($plan);
    	if($mat != ""){
    	$query->where('materia',"like","%$mat%");
    	}
    	else{
    	}
    	//dd($query);
    
    
    }
	
	
}

?>
