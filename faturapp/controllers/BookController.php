<?php

use ActiveRecord\RecordNotFound;

class BookController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $books = Book::all();
        $this->renderView("book/index", ['books' => $books]);
    }

    public function show($id)
    {
        $this->loginFilter();

        try{
            $book = Book::find([$id]);
            $this->renderView("book/show", ['book' => $book]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'book/index']);
        }
    }

    public function create()
    {
        $this->loginFilter();
        $genre = Genre::all();
        $this->renderView("book/create", ["genre" => $genre]);
    }

    public function store()
    {
        $this->loginFilter();

        $book = new Book($_POST);

        if($book->is_valid())
        {
            $book->save();
            $this->redirectToRoute("book", "index");
        }
        else
        {
            $genre = Genre::all();
            $this->renderView("book/create", ["book" => $book, "genre" => $genre]);
        }
    }

    public function edit($id)
    {
        $this->loginFilter();
        try{
            $book = Book::find([$id]);
            $genre = Genre::all();
            $this->renderView("book/edit", ['book' => $book, 'genre' => $genre]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("book/show", ['book' => null]); // usar mesmo o do “show” porque faz a mesma coisa
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
                $this->redirectToRoute("book", "index");
            }
            else
            {
                $genre = Genre::all();
                $this->renderView("book/edit", ["book" => $book, "genre" => $genre]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("book/show", ['book' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function delete($id)
    {
        $this->loginFilter();
        try{
            $book = Book::find([$id]);
            if($book->delete())
            {
                $this->redirectToRoute("book", "index");
            }
            else
            {
                // Não foi possível apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("book/show", ['book' => null]); // usar o “show” porque mostra o erro
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
}