<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BlogTagController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for blog_tag
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "BlogTag", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $blog_tag = BlogTag::find($parameters);
        if (count($blog_tag) == 0) {
            $this->flash->notice("The search did not find any blog_tag");

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $blog_tag,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a blog_tag
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $blog_tag = BlogTag::findFirstByid($id);
            if (!$blog_tag) {
                $this->flash->error("blog_tag was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "blog_tag",
                    "action" => "index"
                ));
            }

            $this->view->id = $blog_tag->id;

            $this->tag->setDefault("id", $blog_tag->id);
            $this->tag->setDefault("title", $blog_tag->title);
            $this->tag->setDefault("deleted", $blog_tag->deleted);
            $this->tag->setDefault("created_at", $blog_tag->created_at);
            $this->tag->setDefault("updated_at", $blog_tag->updated_at);
            $this->tag->setDefault("deleted_at", $blog_tag->deleted_at);
            
        }
    }

    /**
     * Creates a new blog_tag
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "index"
            ));
        }

        $blog_tag = new BlogTag();

        $blog_tag->id = $this->request->getPost("id");
        $blog_tag->title = $this->request->getPost("title");
        $blog_tag->deleted = $this->request->getPost("deleted");
        $blog_tag->created_at = $this->request->getPost("created_at");
        $blog_tag->updated_at = $this->request->getPost("updated_at");
        $blog_tag->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_tag->save()) {
            foreach ($blog_tag->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "new"
            ));
        }

        $this->flash->success("blog_tag was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_tag",
            "action" => "index"
        ));

    }

    /**
     * Saves a blog_tag edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $blog_tag = BlogTag::findFirstByid($id);
        if (!$blog_tag) {
            $this->flash->error("blog_tag does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "index"
            ));
        }

        $blog_tag->id = $this->request->getPost("id");
        $blog_tag->title = $this->request->getPost("title");
        $blog_tag->deleted = $this->request->getPost("deleted");
        $blog_tag->created_at = $this->request->getPost("created_at");
        $blog_tag->updated_at = $this->request->getPost("updated_at");
        $blog_tag->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_tag->save()) {

            foreach ($blog_tag->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "edit",
                "params" => array($blog_tag->id)
            ));
        }

        $this->flash->success("blog_tag was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_tag",
            "action" => "index"
        ));

    }

    /**
     * Deletes a blog_tag
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $blog_tag = BlogTag::findFirstByid($id);
        if (!$blog_tag) {
            $this->flash->error("blog_tag was not found");

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "index"
            ));
        }

        if (!$blog_tag->delete()) {

            foreach ($blog_tag->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_tag",
                "action" => "search"
            ));
        }

        $this->flash->success("blog_tag was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_tag",
            "action" => "index"
        ));
    }

}
