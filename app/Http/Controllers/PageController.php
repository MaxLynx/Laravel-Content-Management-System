<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Page as Page;

class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $langs = ["en", "ru", "ua"];

    public function main(){
        $page = Page::find(1);
        $pages = Page::all()->sortBy($page->orderType);
        $i = 0;
        foreach($pages as $one_page){
            if($one_page->id == $page->id){
                unset($pages[$i]);
                break;
            }
            $i++;
        }
        $page->lang = "en";
        return view('page', ['page' => $page, 'pages' => $pages]);
    }

    
    public function showShortVersion($codeOrLang){
        if (in_array($codeOrLang, $this->langs)) {
            $page = Page::find(1);
            $page->lang = $codeOrLang;
        }
        else{
            $page = Page::where('code', '=', $codeOrLang)->firstOrFail();
            $page->lang = "en";
        }
        $pages = Page::all()->sortBy($page->orderType);
        $i = 0;
        foreach($pages as $one_page){
            if($one_page->id == $page->id){
                unset($pages[$i]);
                break;
            }
            $i++;
        }
        return view('page', ['page' => $page, 'pages' => $pages]);
    }

    public function showFullVersion($code, $lang){
        $page = Page::where('code', '=', $code)->firstOrFail();
        $page->lang = $lang;
        $pages = Page::all()->sortBy($page->orderType);
        $i = 0;
        foreach($pages as $one_page){
            if($one_page->id == $page->id){
                unset($pages[$i]);
                break;
            }
            $i++;
        }
        return view('page', ['page' => $page, 'pages' => $pages]);
    }
}
