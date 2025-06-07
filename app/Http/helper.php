<?php

/*
|--------------------------------------------------------------------------
| Application Helpers
|--------------------------------------------------------------------------
|
|
*/

/**
 * Prodice the Phone number
 * @return  String
 */

/**
 * Function to easily display images in view from storage path
 * @return  String
 */
if (!function_exists('replaceSize'))
{
	function replaceSize($filename, $suffix)
	{
		$lastDotPos = strrpos($filename, '.');
        if ($lastDotPos !== false) {
            return substr($filename, 0, $lastDotPos) . $suffix . substr($filename, $lastDotPos);
        } else {
            return $filename.$suffix;
        }
	}
}
