<?php

class Ingreed extends Eloquent {
	public static $key = 'ing_id';
	public static $table = 'rec_1_ingreed';
	public static $timestamps = true;

	public function recipe()
    {
        return $this->belongsTo('Recipe','rec_id');
    }
} 