<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Page as Page;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){
        $grandparentCode = null;
        if($request->parentCode != null && $request->parentCode != 'null'){
            $pages = Page::all()->where('parentCode', $request->parentCode);
            $parentPage = Page::where('code', '=', $request->parentCode)->first();
            $grandparentCode = $parentPage->parentCode;
        }
        else{
            $pages = Page::all()->where('parentCode', null);
        }
        return view('adminindex', ['pages' => $pages, 'parentCode' => $request->parentCode,
        'grandparentCode' => $grandparentCode]);
    }

    public function showCreateForm(Request $request){
        $page = new Page;
        if($request->parentCode != null){
            $page->parentCode = $request->parentCode;
        }
        else{
            $page->parentCode = '';
        }
        return view('form', ['page' => $page]);
    }

    public function showEditForm(Request $request, $code){
        $page = Page::where('code', '=', $code)->firstOrFail();
        $pageCode = $page->code;
        $parentCode = $page->parentCode;
        if($parentCode == null){
            $parentCode = 'null';
        }
        return view('formUpd', ['page' => $page, 'pageCode' => $pageCode, 'parentCode' => $parentCode]);
    }

    public function store($parentCode, Request $request){
        $page = new Page;
        $page->lang = 'en';
        $page->parentCode = $request->parentCode;
        $page->code = $request->code;
        $page->captionEn = $request->captionEn;
        $page->captionRu = $request->captionRu;
        $page->captionUa = $request->captionUa;
        $page->introEn = $request->introEn;
        $page->introRu = $request->introRu;
        $page->introUa = $request->introUa;
        $page->textEn = $request->textEn;
        $page->textRu = $request->textRu;
        $page->textUa = $request->textUa;
        $page->orderNum = $request->orderNum;
        $page->orderType = $request->orderType;
        $page->containerType = $request->containerType;

        if($request->file('image') != null)
        {
            $request->file('image')->storeAs('public', $request->image->getClientOriginalName());
            $page->imageurl = $request->image->getClientOriginalName();
        }

        $page -> save();
        return redirect()->route('index', ['parentCode' => $parentCode]);
    }

    public function update($parentCode, Request $request){
        $page = Page::where('code', '=', $request->code)->firstOrFail();
        $page->lang = 'en';
        $page->parentCode = $request->parentCode;
        $page->code = $request->code;
        $page->captionEn = $request->captionEn;
        $page->captionRu = $request->captionRu;
        $page->captionUa = $request->captionUa;
        $page->introEn = $request->introEn;
        $page->introRu = $request->introRu;
        $page->introUa = $request->introUa;
        $page->textEn = $request->textEn;
        $page->textRu = $request->textRu;
        $page->textUa = $request->textUa;
        $page->orderNum = $request->orderNum;
        $page->orderType = $request->orderType;
        $page->containerType = $request->containerType;

        if($request->file('image') != null)
        {
            $request->file('image')->storeAs('public', $request->image->getClientOriginalName());
            $page->imageurl = $request->image->getClientOriginalName();
        }

        $page -> save();
        return redirect()->route('index', ['parentCode' => $parentCode]);
    }

    public function delete($code){
        
        $page = Page::where('code', '=', $code)->firstOrFail();
        $parentCode = $page->parentCode;

        $pages = Page::all()->where('parentCode', $code);

        $page -> delete();

        foreach($pages as $one_page){
            $this->delete($one_page->code);
        }

        return redirect()->route('index', ['parentCode' => $parentCode]);
        
    }

    
    
}
