<?php

use ActiveRecord\RecordNotFound;

class ChapterController extends BaseAuthController
{
    public function index($id)
    {
        $this->loginFilter();
        try
        {
            $this->renderView("chapter/index", ["book" => Book::find([$id])]);
        }
        catch(RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("book/show", ["book"=>null]);
        }
    }

    public function show($id)
    {
        $this->loginFilter();

        try{
            $chapter = Chapter::find([$id]);
            $this->renderView("chapter/show", ['chapter' => $chapter]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("chapter/show", ['chapter' => null]);
        }
    }

    public function create($id)
    {
        $this->loginFilter();
        try
        {
            Book::find([$id]);
            $this->renderView("chapter/create", ["book_id" => $id]);
        }
        catch(RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("book/show", ["book" => null]);
        }
    }

    public function store()
    {
        $this->loginFilter();

        $chapter = new Chapter($_POST);

        if($chapter->is_valid())
        {
            $chapter->save();
            $this->redirectToRoute("chapter", "index", ["chapter"=>$chapter->id, "id" => $chapter->book->id]);
        }
        else
        {
            //$this->renderView("chapter/create", ["book_id" => $chapter->]);
        }
    }

    public function edit($id)
    {
        $this->loginFilter();

        try
        {
            $chapter = Chapter::find([$id]);

            $this->renderView("chapter/edit", ["chapter" => $chapter]);
        }
        catch(RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("chapter/show", ["chapter" => null]);
        }

    }

    public function update($id)
    {
        $this->loginFilter();

        try
        {
            $chapter = Chapter::find([$id]);
            $chapter->update_attributes($_POST);

            if($chapter->is_valid())
            {
                $this->redirectToRoute("chapter", "index", ["id" => $chapter->book->id]);
            }
            else
            {
                $this->renderView("chapter/edit", ["chapter" => $chapter]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->redirectToRoute("book", "index");
        }
    }

    public function destroy($id)
    {
        $this->loginFilter();
        try
        {
            $chapter = Chapter::find([$id]);

            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $book_id = $chapter->book->id;

            if($chapter->delete())
            {
                $this->redirectToRoute("chapter", "index", ["id" => $book_id]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("chapter/show", ["chapter" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }
}