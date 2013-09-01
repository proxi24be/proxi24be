<?php

namespace application\apis;

class GenerateHtml
{
	public static function generate(array $configuration)
	{
		if(count($configuration) !== 1)
			throw new \Exception('Error the method accepts only an array of one element for now.');
		else
		{
			foreach($configuration as $tag => $attributes)
				return GenerateHtml::_generate($attributes, $tag);
		}
	}

	private static function _generate($configuration, $level_html='')
	{
		$html = '';
		if(!is_array($configuration))
			throw new \Exception('Error the object configuration does not follow the convention.');
		else
		{
			if(!empty($level_html))
			{
				foreach($configuration as $tag => $attribute)
				{
					if($tag =='htmlOptions')
						$html .= '<'. $level_html .' '. GenerateHtml::_generateAttribute($attribute) . '>' . PHP_EOL;
					// Recursive call.
					else
						$html .= GenerateHtml::_generate($attribute, $tag);
				}
			}
		}
		return $html  . "</$level_html>";
	}

	private static function _generateAttribute(array $attributes = array())
	{
		$html = '';
		foreach($attributes as $attr => $val)
		{
			if(is_numeric($attr))
				$html .= sprintf('%s ',$val);	
			else
				$html .= sprintf('%s="%s" ', $attr, $val);	
		}
		return $html;
	}
}