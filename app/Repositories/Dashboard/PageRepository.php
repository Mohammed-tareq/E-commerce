<?php

namespace App\Repositories\Dashboard;

use App\Models\Page;

class PageRepository
{
    public function getPages()
    {
        return Page::all();
    }

    public function getPage($id)
    {
        return Page::find($id);
    }

    public function createPage($data)
    {
        return Page::create($data);
    }

    public function updatePage($page,$data)
    {
        return $page->update($data);
    }

    public function deletePage($page)
    {
        return $page->delete();
    }

    public function changeStatus($page)
    {
        return $page->update(
            [
                'status' => !$page->getRawOriginal('status')
            ]
        );
    }

    public function deleteImagePage($page)
    {
        return $page->update(
            [
                'image' => null
            ]
        );
    }
}