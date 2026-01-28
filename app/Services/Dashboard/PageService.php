<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\PageRepository;
use App\Utils\ImageManagement;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PageService
{
    public function __construct(protected PageRepository $pageRepository,
                                protected ImageManagement $imageManagement)
    {
    }


    public function getPages()
    {
        return $this->pageRepository->getPages();
    }

    public function getPage($id)
    {
        return $this->pageRepository->getPage($id);
    }

    public function getPagesForDataTable()
    {
        $pages = $this->getPages();
        return DataTables::of($pages)
            ->addIndexColumn()
            ->addColumn('title', function ($page) {
                return $page->getTranslation('title', app()->getLocale());
            })
            ->addColumn('content', function ($page) {
                return view('dashboard.page.data-table.content',compact('page'));
            })
            ->addColumn('image', function ($page) {
                return $page->image !== null ?  view('dashboard.page.data-table.image', compact('page')): __('dashboard.not_found');
            })
            ->addColumn('actions', function ($page) {
                return view('dashboard.page.data-table.action', compact('page'));
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }

    public function createPage($data)
    {
        if (array_key_exists('image', $data) && $data['image'] !== null) {
            $data['image'] = $this->imageManagement->uploadSingleImage('/', $data['image'], 'pages');
        }
        $data['slug'] = Str::slug($data['title']['en']);

        return $this->pageRepository->createPage($data);
    }

    public function updatePage($id, $data)
    {
        if (!$page = $this->getPage($id)) {
            abort(404);
        }

        if (array_key_exists('image', $data) && $data['image'] !== null) {
            $data['image'] = $this->imageManagement->uploadSingleImage('/', $data['image'], 'pages');
        }
        $data['slug'] = Str::slug($data['title']['en']);

        return $this->pageRepository->updatePage($page, $data);
    }

    public function deletePage($id)
    {
        if (!$page = $this->getPage($id)) {
            return false;
        }

        $this->imageManagement->deleteImageFromLocal('uploads/pages/' . $page->image);

        return $this->pageRepository->deletePage($page);
    }

    public function changeStatus($id)
    {
        if (!$page = $this->getPage($id)) {
            abort(404);
        }
        return $this->pageRepository->changeStatus($page);
    }

    public function deleteImagePage($id)
    {
        if (!$page = $this->getPage($id)) {
            abort(404);
        }
        $this->imageManagement->deleteImageFromLocal('uploads/pages/' . $page->image);
        return $this->pageRepository->deleteImagePage($page);
    }

}