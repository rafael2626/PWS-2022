<?php
require_once './controllers/BaseController.php';
require_once './controllers/BaseAuthController.php';

class AdminController extends  BaseAuthController
{

    public  function  index()
    {
        $admin = user::all();
        $this->renderView("admin/index", ['users' => $admin]);
    }
    public  function  create()
    {
        $admin = user::all();
        $this->renderView("admin/create", ['users' => $admin]);
    }
    public function store()
    {
        $this->loginFilter();

        $admin = new user($_POST);

        if($admin->is_valid())
        {
            $admin->save();
            $this->redirectToRoute("admin", "index");
        }
        else
        {
            $admin =User::all();
            $this->renderView("admin/create", ["users" => $admin]);
        }
    }

    public function edit($id)
    {

        try{
            $admin = User::find([$id]);
            $admin = User::all();
            $this->renderView("admin/edit", ['users' => $admin]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("admin/show", ['admin' => null]);
        }
    }

    public function update($id)
    {
        $this->loginFilter();
        try{
            $book = Book::find([$id]);
            $book->update_attributes($_POST);

            if($book->is_valid())
            {
                $book->save();
                $this->redirectToRoute("admin", "index");
            }
            else
            {
                $genre = Genre::all();
                $this->renderView("admin/edit", ["admin" => $book, "genre" => $genre]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("admin/show", ['admin' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function delete($id)
    {
        $this->loginFilter();
        try{
            $book = Book::find([$id]);
            if($book->delete())
            {
                $this->redirectToRoute("admin", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("admin/show", ['admin' => null]); // usar o “show” porque mostra o erro
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
}
