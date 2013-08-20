<?php

class OwnerAds
{
	public static function isOwner($current_user_id, $ads_id){
		if (isset($current_user_id) && isset($ads_id)){
			$rbac_connection = Yii::app()->db;
			$command = $rbac_connection->createCommand("select user_id from ads where id = :ads_id");
			$command->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
			$user_id = $command->queryScalar();
			return $user_id == $current_user_id;
		}
		else
			return false;
			
	}
}