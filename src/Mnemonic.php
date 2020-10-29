<?php

namespace Monsterz\Pluginsreceh;

/*
 * Basic Mnemonic
 */
class Mnemonic{

	public static $code; 
	public static $model_name;
	public static $field_name;
	public static $prefix_name = "";
	public static $suffix_name = "";
	public static $default_number = 1;
	public static $length_code = 6;
    public static $date = false;

	/**
	 * set model name
	 *
	 * @method model
	 * @param string model
	 * @return void
	 */
    public static function model($model){
    	$model = explode(".",$model);
    	$model = implode('\\',$model);
    	$model = '\\App\\'.$model;
        static::$model_name = $model;
        return new static;
    }

    /**
	 * set table's field
	 *
	 * @method field
	 * @param string field
	 * @return void
	 */
    public static function field($field){
    	static::$field_name = $field;
        return new static;
    }

    /**
	 * set prefix code
	 *
	 * @method prefix
	 * @param string prefix
	 * @return void
	 */
    public static function prefix($prefix){
    	static::$prefix_name = $prefix;
        return new static;
    }

    /**
	 * set suffix code
	 *
	 * @method suffix
	 * @param string suffix
	 * @return void
	 */
    public static function suffix($suffix){
    	static::$suffix_name = $suffix;
        return new static;
    }

    /**
	 * set default number if doesn't exist code
	 *
	 * @method default
	 * @param int default
	 * @return void
	 */
    public static function default($default){
    	static::$default_number = $default;
        return new static;
    }

    /**
	 * set length of code
	 *
	 * @method length
	 * @param int length
	 * @return void
	 */
    public static function length($length){
    	static::$length_code = $length;
        return new static;
    }

    /**
     * set length of code
     *
     * @method withDate
     * @return void
     */
    public static function withDate(){
        static::$date = true;
        return new static;
    }

    /**
	 * create Mnemonic code
	 *
	 * @method create
	 * @return void
	 */
    public static function create(){
        $model = static::$model_name;
        $field = static::$field_name;
        $prefix = static::$prefix_name;
        $suffix = static::$suffix_name;
        $length = static::$length_code;
        $default = static::$default_number;
        $date = static::$date;

        $last_row = $model::max($field);
        $next_number = 0;

        if(!$last_row){
        	$next_number = $default;
        }else{
        	$last_row = str_replace($prefix, "", $last_row);
        	$last_row = str_replace($suffix, "", $last_row);
        	$next_number = ((int) $last_row) + 1;
        }

        $next_code = sprintf('%0'.$length.'d',$next_number);

        $code = "";
        $code .= $prefix;
        $code .= ($date) ? date('Ymd') : '';
        $code .= $next_code;
        $code .= $suffix;

        return $code;
    }

}
