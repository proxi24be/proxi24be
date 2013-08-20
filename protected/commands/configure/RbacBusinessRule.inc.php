<?php

$rbac_business_rule = array(
	'edit own ads' => 'return isset($params["ads_id"]) 
		&& OwnerAds::isOwner(Yii::app()->user->getId(), $params["ads_id"]);', 
	);
