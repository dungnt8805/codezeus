<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //curl
        //https://api.github.com/orgs/codezeus/repos
        $this->view->pick('index/index');
    }

}

// End of File
// --------------------------------------------------------------------