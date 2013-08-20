<?php

$rbac_business_rule = array(
	'edit own ads' => 'return isset($params["user_id"] && isset($params["model"]) 
		&& OwnerAds::isOwner($params["user_id"], $params["model"]);', 
	);
