<?php

class IndexController extends ControllerBase
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

    private function _getGithub()
    {
        Guzzle\Http\StaticClient::mount();
        try {
            $response = Guzzle::get('https://api.github.com/orgs/codezeus/repos');
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        } catch (\Exception $e) {}

        return [];
    }

    // --------------------------------------------------------------------

}

// End of File
// --------------------------------------------------------------------