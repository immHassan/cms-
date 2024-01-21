<?php

use App\Models\Banner;
use App\Models\News;
use App\Models\Services;
use App\Models\Navbar as NavbarModel;
use App\Models\Navbar_detail as NavbarDetailModel;


if (!function_exists('get_navbar'))
{
	function get_navbar() {
		$navbar = NavbarModel::where('is_selected',1)->first();
        $nav_detail = NavbarDetailModel::where('navbar_id', $navbar->id)->get();
		return $nav_detail;
	}
}


if (!function_exists('get_banners'))
{
	function get_banners() {
		$banner = Banner::all(); 
		return $banner;
	}
}

if (!function_exists('get_news'))
{
	function get_news() {
		$news = News::all(); 
		return $news;
	}
}


if (!function_exists('get_services'))
{
	function get_services() {
		$services = Services::all(); 
		return $services;
	}
}

if (!function_exists('replace_text'))
{
	function replace_text($text) {

		$updated_text = $text;
		$updated_text = str_replace('&amp;lt;','<', $updated_text);
		$updated_text = str_replace('&amp;quot;','"', $updated_text);
		$updated_text = str_replace('&amp;gt;','>', $updated_text);
		$updated_text = str_replace('&#039;','"', $updated_text);


		return $updated_text;
	}
}

if (!function_exists('short_string'))
{
	function short_string($text) {
		$string = strip_tags($text);
		$string = str_replace('&nbsp;', ' ', $string);
		if (strlen($string) >= 90) {
			return substr($string, 0, 90). " ... " . substr($string, -5);
		}
		else {
			return $string;
		}
	}
}


?>