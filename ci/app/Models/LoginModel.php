<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class LoginModel extends Model{
        protected $table            = 'tlogin';
        protected $primaryKey       = 'login';
        protected $allowedFields    = ['login', 'senha', 'admin'];
        protected $returnType       = 'object';
    }
?>