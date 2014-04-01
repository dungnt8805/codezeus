<?php

class UserController extends ControllerBase
{
    // --------------------------------------------------------------------

    public function onConstruct()
    {
        echo 1;
        die;
    }

    public function indexAction()
    {
        echo 'Nothing here';
        die;
    }

    // --------------------------------------------------------------------

    public function doLoginAction()
    {
        $this->request->getPost('username');
        $this->request->getPost('password');
        echo 'Pretend post';
        die;
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------