<?php
namespace Admin;
class AdminController extends ControllerBase
{
    // --------------------------------------------------------------------

    public function indexAction()
    {
        $this->view->setVars([]);
        $this->view->pick('admin/admin');
    }

    // --------------------------------------------------------------------

    public function loginAction()
    {
        echo 1;
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------