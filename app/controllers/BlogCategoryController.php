<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BlogCategoryController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for blog_category
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "BlogCategory", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $blog_category = BlogCategory::find($parameters);
        if (count($blog_category) == 0) {
            $this->flash->notice("The search did not find any blog_category");

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $blog_category,
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
     * Edits a blog_category
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $blog_category = BlogCategory::findFirstByid($id);
            if (!$blog_category) {
                $this->flash->error("blog_category was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "blog_category",
                    "action" => "index"
                ));
            }

            $this->view->id = $blog_category->id;

            $this->tag->setDefault("id", $blog_category->id);
            $this->tag->setDefault("title", $blog_category->title);
            $this->tag->setDefault("deleted", $blog_category->deleted);
            $this->tag->setDefault("created_at", $blog_category->created_at);
            $this->tag->setDefault("updated_at", $blog_category->updated_at);
            $this->tag->setDefault("deleted_at", $blog_category->deleted_at);
            
        }
    }

    /**
     * Creates a new blog_category
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "index"
            ));
        }

        $blog_category = new BlogCategory();

        $blog_category->id = $this->request->getPost("id");
        $blog_category->title = $this->request->getPost("title");
        $blog_category->deleted = $this->request->getPost("deleted");
        $blog_category->created_at = $this->request->getPost("created_at");
        $blog_category->updated_at = $this->request->getPost("updated_at");
        $blog_category->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_category->save()) {
            foreach ($blog_category->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "new"
            ));
        }

        $this->flash->success("blog_category was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_category",
            "action" => "index"
        ));

    }

    /**
     * Saves a blog_category edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $blog_category = BlogCategory::findFirstByid($id);
        if (!$blog_category) {
            $this->flash->error("blog_category does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "index"
            ));
        }

        $blog_category->id = $this->request->getPost("id");
        $blog_category->title = $this->request->getPost("title");
        $blog_category->deleted = $this->request->getPost("deleted");
        $blog_category->created_at = $this->request->getPost("created_at");
        $blog_category->updated_at = $this->request->getPost("updated_at");
        $blog_category->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_category->save()) {

            foreach ($blog_category->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "edit",
                "params" => array($blog_category->id)
            ));
        }

        $this->flash->success("blog_category was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_category",
            "action" => "index"
        ));

    }

    /**
     * Deletes a blog_category
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $blog_category = BlogCategory::findFirstByid($id);
        if (!$blog_category) {
            $this->flash->error("blog_category was not found");

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "index"
            ));
        }

        if (!$blog_category->delete()) {

            foreach ($blog_category->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_category",
                "action" => "search"
            ));
        }

        $this->flash->success("blog_category was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_category",
            "action" => "index"
        ));
    }

}
