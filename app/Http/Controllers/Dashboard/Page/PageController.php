<?php

namespace App\Http\Controllers\Dashboard\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Page\PageRequest;
use App\Services\Dashboard\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function __construct(protected PageService $pageService)
    {
    }

    public function index()
    {
        return view('dashboard.page.index');
    }


    public function getPagesForDataTable()
    {
        return $this->pageService->getPagesForDataTable();
    }

    public function create()
    {
        return view('dashboard.page.create');
    }


    public function store(PageRequest $request)
    {
        $data = $request->validated();
        if (!$this->pageService->createPage($data)) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->back();
        }

        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->back();
    }


    public function edit($id)
    {
        $page = $this->pageService->getPage($id);
        return view('dashboard.page.edit', compact('page'));
    }


    public function update(PageRequest $request, $id)
    {
        $data = $request->validated();
        if (!$this->pageService->updatePage($id, $data)) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->back();
        }

        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->back();

    }


    public function destroy($id)
    {
        if (!$this->pageService->deletePage($id)) {

            return response()->json([
                'status' => true,
                'message' => __('dashboard.operation_error')
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }

    public function changeStaus($id)
    {
        if (!$this->pageService->changeStatus($id)) {
            return response()->json([
                'status' => true,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }

    public function deleteImagePage($id)
    {
        if (!$this->pageService->deleteImagePage($id)) {
            return response()->json([
                'status' => true,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }
}
