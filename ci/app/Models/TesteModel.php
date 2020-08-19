<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class TesteModel extends Model{
        protected $table = 'teste';
        protected $primaryKey = 'name';
        protected $allowedFields = ['name', 'num'];
        protected $returnType = 'object';
    }
?>