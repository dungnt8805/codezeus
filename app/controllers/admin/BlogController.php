<?php
namespace Admin;
class BlogController extends ControllerBase
{
    // --------------------------------------------------------------------

    public function indexAction()
    {
        $this->view->setVars([]);
        $this->view->pick('admin/blog');
    }

    // --------------------------------------------------------------------

    public function createAction()
    {
        $this->view->setVars([]);
        $this->view->pick('admin/blog-edit');
    }

    // --------------------------------------------------------------------

    public function editAction()
    {
        $this->view->setVars([]);
        $this->view->pick('admin/blog-edit');
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------