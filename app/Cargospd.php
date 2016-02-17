<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargospd extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'especialidadpd';
	
	public function scopeCxd($query, $mxd)
    {
    	//dd($plan);
    	if($cxd != ""){
    	$query->where('id', $cxd);
    	}
    	else{
    	}
    	//dd($query);
    
    }
}

?>
