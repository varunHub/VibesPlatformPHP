<?php

class Recipe extends Eloquent {
	public static $key = 'rec_id';
	public static $table = 'rec_1_rec_base';
	public static $timestamps = true;

	public function ingreeds()
    {
        return $this->has_many('Ingreed','rec_id');
    }
} 