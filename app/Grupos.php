<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'grupos';
	
	public function scopeGrupo($query, $grup)
    {
    	//dd($plan);
    	if($grup != ""){
    	$query->where('idcarrera','=',"$grup");
    	}
    	else{
    	}
    	//dd($query);
    	

    }
    
}

?>
