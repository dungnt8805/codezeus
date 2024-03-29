<?php

class BlogController extends ControllerBase
{
    // --------------------------------------------------------------------

    public function indexAction()
    {
        $this->view->setVars([]);
        $this->view->pick('blog/index');
    }

    // --------------------------------------------------------------------

    public function singleAction($slug = false)
    {
        $this->view->setVars([]);
        $this->view->pick('blog/single');
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------