<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BlogCommentController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for blog_comment
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "BlogComment", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $blog_comment = BlogComment::find($parameters);
        if (count($blog_comment) == 0) {
            $this->flash->notice("The search did not find any blog_comment");

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $blog_comment,
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
     * Edits a blog_comment
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $blog_comment = BlogComment::findFirstByid($id);
            if (!$blog_comment) {
                $this->flash->error("blog_comment was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "blog_comment",
                    "action" => "index"
                ));
            }

            $this->view->id = $blog_comment->id;

            $this->tag->setDefault("id", $blog_comment->id);
            $this->tag->setDefault("blog_post_id", $blog_comment->blog_post_id);
            $this->tag->setDefault("user_id", $blog_comment->user_id);
            $this->tag->setDefault("title", $blog_comment->title);
            $this->tag->setDefault("content", $blog_comment->content);
            $this->tag->setDefault("deleted", $blog_comment->deleted);
            $this->tag->setDefault("created_at", $blog_comment->created_at);
            $this->tag->setDefault("updated_at", $blog_comment->updated_at);
            $this->tag->setDefault("deleted_at", $blog_comment->deleted_at);
            
        }
    }

    /**
     * Creates a new blog_comment
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "index"
            ));
        }

        $blog_comment = new BlogComment();

        $blog_comment->id = $this->request->getPost("id");
        $blog_comment->blog_post_id = $this->request->getPost("blog_post_id");
        $blog_comment->user_id = $this->request->getPost("user_id");
        $blog_comment->title = $this->request->getPost("title");
        $blog_comment->content = $this->request->getPost("content");
        $blog_comment->deleted = $this->request->getPost("deleted");
        $blog_comment->created_at = $this->request->getPost("created_at");
        $blog_comment->updated_at = $this->request->getPost("updated_at");
        $blog_comment->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_comment->save()) {
            foreach ($blog_comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "new"
            ));
        }

        $this->flash->success("blog_comment was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_comment",
            "action" => "index"
        ));

    }

    /**
     * Saves a blog_comment edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $blog_comment = BlogComment::findFirstByid($id);
        if (!$blog_comment) {
            $this->flash->error("blog_comment does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "index"
            ));
        }

        $blog_comment->id = $this->request->getPost("id");
        $blog_comment->blog_post_id = $this->request->getPost("blog_post_id");
        $blog_comment->user_id = $this->request->getPost("user_id");
        $blog_comment->title = $this->request->getPost("title");
        $blog_comment->content = $this->request->getPost("content");
        $blog_comment->deleted = $this->request->getPost("deleted");
        $blog_comment->created_at = $this->request->getPost("created_at");
        $blog_comment->updated_at = $this->request->getPost("updated_at");
        $blog_comment->deleted_at = $this->request->getPost("deleted_at");
        

        if (!$blog_comment->save()) {

            foreach ($blog_comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "edit",
                "params" => array($blog_comment->id)
            ));
        }

        $this->flash->success("blog_comment was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_comment",
            "action" => "index"
        ));

    }

    /**
     * Deletes a blog_comment
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $blog_comment = BlogComment::findFirstByid($id);
        if (!$blog_comment) {
            $this->flash->error("blog_comment was not found");

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "index"
            ));
        }

        if (!$blog_comment->delete()) {

            foreach ($blog_comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "blog_comment",
                "action" => "search"
            ));
        }

        $this->flash->success("blog_comment was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "blog_comment",
            "action" => "index"
        ));
    }

}
