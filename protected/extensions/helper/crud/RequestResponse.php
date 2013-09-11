<?php

namespace ext\helper\crud;

class RequestResponse
{
	const SUCCESS = 1;
	
	public static function printSuccess()
	{
		echo json_encode(array('success'=>true));
	}

	public static function printFailed($errors)
	{
		$error = array('success'=>false, 'failed'=>$errors);
		echo json_encode($error);
	}
}