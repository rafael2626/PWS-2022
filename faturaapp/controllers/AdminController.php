<?php
require_once './controllers/BaseController.php';
require_once './controllers/BaseAuthController.php';

class AdminController extends  BaseAuthController
{

    public  function  index()
    {
        $admin = User::all();
        $this->renderView("admin/index", ['users' => $admin]);
    }
    public  function  create()
    {
        $admin = User::all();
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

            $this->renderView("admin/edit", ['admin' => $admin]);
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
            $admin = User::find([$id]);
            $admin->update_attributes($_POST);

            if($admin->is_valid())
            {
                $admin->save();
                $this->redirectToRoute("admin", "index");
            }
            else
            {

                $this->renderView("admin/edit", ["admin" => $admin]);
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
            $admin = User::find([$id]);
            if($admin->delete())
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
    public function show($id)
    {


        try{
            $admin = User::find([$id]);
            $this->renderView("admin/show", ['admin' => $admin]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'admin/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $admin =User::find([$id]);

            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $admin = $admin->id;

            if($admin->delete())
            {
                $this->redirectToRoute("admin", "index", ["id" => $admin]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("chapter/show", ["admin" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }
}
