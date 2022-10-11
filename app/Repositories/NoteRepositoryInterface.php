<?php


namespace App\Repositories;

interface NoteRepositoryInterface
{

    public function create(array $data);
    public function all();
    public function noteTypes();
    public function getNotesById($id);
    public function deleteById($id);
}
