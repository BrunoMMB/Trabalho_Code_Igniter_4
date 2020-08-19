<?php
    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\TesteModel;
    use App\Models\UploadModel;
    use App\Models\LoginModel;
    use CodeIgniter\Database\Query;

    class Principal extends Controller
    {
        public function index(){
            return view('index');
        }
        public function pdf(){
            return view('generate_pdf');
        }

        // public function showme($page = 'home'){
        //     if(!is_file(APPPATH. '/views/pages/'. $page .'.php')){
        //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        //     }
        //     $data['title'] = ucfirst($page);
        //     echo view('templates/header', $data);
        //     echo view('pages/'.$page, $data);
        //     echo view('templates/footer', $data);
        // }

        public function insert(){
            $session = \Config\Services::session();
            $isAdmin = $session->get('adm');
            $data['msg2'] = "";
            $data['msg3'] = "";
            if($isAdmin){//checa se ele já está logado
                if($isAdmin == "sim"){
                    if($this->request->getMethod() === 'post'){
                        $name   = $this->request->getPost('name');
                        $num    = $this->request->getPost('num');
                        $validation =  \Config\Services::validation();
                        if ((!$validation->check($name, 'alpha')) || (!$validation->check($name, 'required'))) {
                            $data['msg2'] = "O Nome é obrigatório deve conter apenas letras.";
                            return view('insert', $data);
                        }
                        else if(!$validation->check($num, 'required')){
                            $data['msg2'] = "O numero é obrigatório.";
                            return view('insert', $data);
                        }else{
                            $num    = sha1($num);
                            $db = \Config\Database::connect();
                            $builder = $db->table('teste');
                            $info = [
                                'name' => $name,
                                'num'  => $num
                            ];

                            if($builder->insert($info)){
                                $data['msg3'] = "Inserido";
                            }else{
                                $data['msg3'] = "Erro de inserção Principal - Linha 22";
                            }
                            $db->close();
                        }
                    }
                }else{
                    $data['msg2'] = "Você não pode inserir pois não é admin";
                }
            }else{
                $data['msg2'] = "Faça o login primeiro";
            }

            return view('insert', $data);
        }

        public function update(){
            $data['msg2'] = "";
            $data['msg3'] = "";

            if($this->request->getMethod() === 'post'){
                $name    = $this->request->getPost('name');
                $num     = $this->request->getPost('num');
                $validation =  \Config\Services::validation();
                if ((!$validation->check($name, 'alpha')) || (!$validation->check($name, 'required'))) {
                    $data['msg2'] = "O Nome é obrigatório deve conter apenas letras.";
                    return view('update', $data);
                }
                else if(!$validation->check($num, 'required')){
                    $data['msg2'] = "O numero é obrigatório.";
                    return view('update', $data);
                }else{
                    $db = \Config\Database::connect();
                    $builder = $db->table('teste');
                    $info = [
                        'name' => $name,
                        'num'  => $num
                    ];
                    $builder->where('name', $name);

                    if($builder->update($info)){
                        $data['msg3'] = "Modificado";
                    }else{
                        $data['msg2'] = "Erro Principal - Linha 50";
                    }
                    $db->close();
                }
            }
            return view('update', $data);
        }

        public function delete(){
            $data['msg'] = '';
            $data['msg2'] = '';
            $data['msg3'] = '';

            if($this->request->getMethod() === 'post'){
                $name    = $this->request->getPost('name');
                $num     = $this->request->getPost('num');

                $validation =  \Config\Services::validation();
                if ((!$validation->check($name, 'alpha')) || (!$validation->check($name, 'required'))) {
                    $data['msg2'] = "O Nome é obrigatório deve conter apenas letras.";
                    return view('delete', $data);
                }
                else if(!$validation->check($num, 'required')){
                    $data['msg2'] = "O numero é obrigatório.";
                    return view('delete', $data);
                }else{
                    $db = \Config\Database::connect();
                    $builder = $db->table('teste');
                    $builder->where('name', $name);
                    if($builder->delete()){
                        $data['msg3'] = "Deletado";
                    }else{
                        $data['msg2'] = "Erro Principal - Linha 50";
                    }
                    $db->close();
                }
            }

            return view('delete', $data);
        }

        public function select(){
            $db = \Config\Database::connect();
            $builder = $db->table('teste');
            $query   = $builder->get();
            $data['query'] = $query = $builder->get();
            $db->close();
            return view('select', $data);
        }

        public function prov(){
            $data['msg2'] = "";
            $data['msg3'] = "";
            return view('upload', $data);
        }

        public function upload(){
            $data['msg2'] = "";
            $data['msg3'] = "";
            $file = $this->request->getFile('pic');
            if (! $file->isValid())
            {
                throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
            }else{
                $name = $file->getName();
                $file->move('./images', $name);
            }

            $db = \Config\Database::connect();
            $builder = $db->table('ufiles');
            $info = [
                'dsc' => $name,
                'path' => "./images".$name,
            ];

            if($builder->insert($info)){
                $data['msg3'] = "Inserido";
            }else{
                $data['msg2'] = "Erro de inserção Principal - Linha 22";
            }
            $db->close();
            return view('upload', $data);
        }

        public function page_login(){
            return view('login');
        }

        public function login(){
            $login    = $this->request->getPost('login');
            $senha    = $this->request->getPost('senha');

            $validation =  \Config\Services::validation();
            if (!$validation->check($login, 'required')) {
                $data['msg2'] = "O login é obrigatório.";
                return view('login', $data);
            }
            else if(!$validation->check($senha, 'required')){
                $data['msg2'] = "A senha é obrigatória.";
                return view('login', $data);
            }else{
                $db = \Config\Database::connect();
                $query = $db->query("SELECT * FROM tlogin WHERE login = '".$login."'");
                foreach ($query->getResult() as $row)
                {
                    if($row->senha == sha1($senha)){
                        $session = \Config\Services::session();
                        $session->set('login', $login);
                        $session->set('adm',$row->admin);
                        return view('index');
                    }else{
                        echo "usuário ou senha incorretos";
                        return view('login');
                    }
                }
            }
        }

        public function logout(){
            $session = \Config\Services::session();
            $session->remove('login');
            $session->remove('adm');
            $session->destroy();
            return view('index');
        }

        public function select2(){
            $db = \Config\Database::connect();
            $builder = $db->table('ufiles');
            $query   = $builder->get();
            $data['query'] = $query = $builder->get();
            $db->close();
            return view('select2', $data);
        }



    }
?>
