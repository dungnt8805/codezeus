<?php

class IndexController extends BaseController
{

    public function indexAction()
    {
        $this->view->pick('index/index');
    }

}

// End of File
// --------------------------------------------------------------------