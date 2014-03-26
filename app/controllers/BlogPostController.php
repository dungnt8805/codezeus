<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BlogPostController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for blog_post
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "BlogPost", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $blog_post = BlogPost::find($parameters);
        if (count($blog_post) == 0) {
            $this->flash->notice("The search did not find any blog_post");

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $blog_post,
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
     * Edits a blog_post
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $blog_post = BlogPost::findFirstByid($id);
            if (!$blog_post) {
                $this->flash->error("blog_post was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "blog_post",
                    "action" => "index"
                ));
            }

            $this->view->id = $blog_post->id;

            $this->tag->setDefault("id", $blog_post->id);
            $this->tag->setDefault("user_id", $blog_post->user_id);
            $this->tag->setDefault("blog_category_id", $blog_post->blog_category_id);
            $this->tag->setDefault("blog_tag_group_id", $blog_post->blog_tag_group_id);
            $this->tag->setDefault("title", $blog_post->title);
            $this->tag->setDefault("content", $blog_post->content);
            $this->tag->setDefault("deleted", $blog_post->deleted);
            $this->tag->setDefault("created_at", $blog_post->created_at);
            $this->tag->setDefault("updated_at", $blog_post->updated_at);
            $this->tag->setDefault("deleted_at", $blog_post->deleted_at);
            
        }
    }

    /**
     * Creates a new blog_post
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "index"
            ));
        }

        $blog_post = new BlogPost();

        $blog_post->id = $this->request->getPost("id");
        $blog_post->user_id = $this->request->getPost("user_id");
        $blog_post->blog_category_id = $this->request->getPost("blog_category_id");
        $blog_post->blog_tag_group_id = $this->request->getPost("blog_tag_group_id");
        $blog_post->title = $this->request->getPost("title");
        $blog_post->content = $this->request->getPost("content");
        $blog_post->deleted = $this->request->getPost("deleted");
        $blog_post->created_at = $this->request->getPost("created_at");
        $blog_post->updated_at = $this->request->getPost("updated_at");
        $blog_post->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_post->save()) {
            foreach ($blog_post->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "new"
            ));
        }

        $this->flash->success("blog_post was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_post",
            "action" => "index"
        ));

    }

    /**
     * Saves a blog_post edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $blog_post = BlogPost::findFirstByid($id);
        if (!$blog_post) {
            $this->flash->error("blog_post does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "index"
            ));
        }

        $blog_post->id = $this->request->getPost("id");
        $blog_post->user_id = $this->request->getPost("user_id");
        $blog_post->blog_category_id = $this->request->getPost("blog_category_id");
        $blog_post->blog_tag_group_id = $this->request->getPost("blog_tag_group_id");
        $blog_post->title = $this->request->getPost("title");
        $blog_post->content = $this->request->getPost("content");
        $blog_post->deleted = $this->request->getPost("deleted");
        $blog_post->created_at = $this->request->getPost("created_at");
        $blog_post->updated_at = $this->request->getPost("updated_at");
        $blog_post->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_post->save()) {

            foreach ($blog_post->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "edit",
                "params" => array($blog_post->id)
            ));
        }

        $this->flash->success("blog_post was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_post",
            "action" => "index"
        ));

    }

    /**
     * Deletes a blog_post
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $blog_post = BlogPost::findFirstByid($id);
        if (!$blog_post) {
            $this->flash->error("blog_post was not found");

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "index"
            ));
        }

        if (!$blog_post->delete()) {

            foreach ($blog_post->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_post",
                "action" => "search"
            ));
        }

        $this->flash->success("blog_post was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_post",
            "action" => "index"
        ));
    }

}
