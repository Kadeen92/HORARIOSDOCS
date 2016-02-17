<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'laboratorios';
	
	
	public function scopeLab($query, $lab)
    {
    	//dd($plan);
    	if($lab != ""){
    	$query->where('laboratorio',"like","%$lab%");
    	}
    	else{
    	}
    	//dd($query);
    
    
    }
}

?>
