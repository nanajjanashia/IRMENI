<?php
	
	$config['img_path'] = '/pictures'; // Relative to domain name
	$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . $config['img_path']; // Physical path. [Usually works fine like this]


/*-------------------------------------------------------------------
| 
| 
| $config['allowed_types'] = 'gif|jpg|png';
| 
| -------------------------------------------------------------------*/

	
	$config['allowed_types'] = 'gif|jpg|jpeg|png';


/*-------------------------------------------------------------------
| 
| Maximum image file size in kilobytes. This value can't exceed value set in php.ini.
| Set to `0` if you want to use php.ini default:
| 
| $config['max_size'] = 0;
| 
| -------------------------------------------------------------------*/

	
	$config['max_size'] = 0;


/*-------------------------------------------------------------------
| 
| Maximum image width. Set to `0` for no limit:
| 
| $config['max_width'] = 0;
| 
| -------------------------------------------------------------------*/

	
	$config['max_width'] = 0;


/*-------------------------------------------------------------------
| 
| Maximum image height. Set to `0` for no limit:
| 
| $config['max_height'] = 0;
| 
| -------------------------------------------------------------------*/

	
	$config['max_height'] = 0;


/*-------------------------------------------------------------------
| 
| Allow script to resize image that exceeds maximum width or maximum height (or both)
| If set to `TRUE`, image will be resized to fit maximum values (proportions are saved)
| If set to `FALSE`, user will recieve an error message.
| 
| $config['allow_resize'] = TRUE;
| 
| -------------------------------------------------------------------*/

	
	$config['allow_resize'] = FALSE;


/*-------------------------------------------------------------------
| 
| Image name encryption
| If set to `TRUE`, image file name will be encrypted in something like 7fdd57742f0f7b02288feb62570c7813.jpg
| If set to `FALSE`, original filenames will be preserved
| 
| $config['encrypt_name'] = TRUE;
| 
| -------------------------------------------------------------------*/

	
	$config['encrypt_name'] = FALSE;


/*-------------------------------------------------------------------
| 
| How to behave if 2 or more files with the same name are uploaded:
| `TRUE` - the entire file will be overwritten
| `FALSE` - a number will be added to the newly uploaded file name
| 
| -------------------------------------------------------------------*/


	$config['overwrite'] = FALSE;
	
	
?>
