<?php

class BlogController extends ControllerBase
{
    // --------------------------------------------------------------------

    public function indexAction()
    {
        $this->view->setVars([
            'github' => $this->_getGithub()
        ]);
        $this->view->pick('index/index');
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------