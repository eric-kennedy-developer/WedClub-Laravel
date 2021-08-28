# Laravel
____

## Instalação
1. Criar uma pasta e entrar nela (mkdir NomePasta && cd NomePasta)
2. git clone --branch master https://github.com/eric-kennedy-developer/WedClub-Laravel.git
3. Rodar o XAMPP
4. Abrir o projeto no VS Code
5. Abra o terminal e rode o comando: composer install
6. Em seguida, renomeie o arquivo ".env.example" para ".env" e não esqueça de preencher os dados para conectar com o banco de dados.
7. Volte para o terminal e rode o comando: php artisan key:generate
8. Abra o Mysql no seu computador e crie o banco de dados que você configurou no arquivo .env
9. Agora vamos criar as tabelas, rode o comando: php artisan migrate
10. php artisan db:seed --class=UserSeeder
11. php artisan serve
12. Aquela testada básica: abra o link "http://127.0.0.1:8000/api/users" no seu navegador, terá que aparecer 11 registros.
13. Agora é só deixar o servidor ativo e testar o CRUD no Jquery e React
___

## EndPoints
Method | URL
------------ | -------------
GET | http://127.0.0.1:8000/api/users
GET | http://127.0.0.1:8000/api/users/{id}
POST | http://127.0.0.1:8000/api/user
PUT | http://127.0.0.1:8000/api/user/{id}
DELETE | http://127.0.0.1:8000/api/user/{id}
___

## PostMan - Testes Realizados
- [x] Listar todos os usuários
- [x] Listar 1 usuário
- [x] Cadastrar usuário
- [x] Tentar cadastrar com o mesmo nome e email de outro usuário
- [x] Tentar cadastrar com o mesmo nome de outro usuário
- [x] Tentar cadastrar com o mesmo email de outro usuário
- [x] Editar usuário
- [x] Tentar editar o usuário com o mesmo nome e email de outro usuário
- [x] Tentar editar o usuário com o mesmo nome de outro usuário
- [x] Tentar editar o usuário com o mesmo email de outro usuário
- [x] Excluir usuário
___

## Validações (Migration User)
Essa validação garante que não terá registros duplicados no banco de dados.
```
// create_user_table
name->unique();
email->unique();
foto_perfil->unique();
```

___

## Validações com tratamento de erro e function failedValidation (UserRequest)

#### Validações

```
'name' => ['required', 'unique:users'];
'email' => ['required', 'unique:users', 'email'];
'foto_perfil' => ['required', 'unique:users', 'image', 'mimes:jpg,jpeg,png', 'max:2048'];
'password' => ['required'];
```

#### Tratamento de erro

```
'name.required' => 'Campo name obrigatório.';
'name.unique' => 'Campo name já cadastrado.';
'email.required' => 'Campo email obrigatório.';
'email.unique' => 'Campo email já cadastrado.';
'email.email' => 'Campo email precisa ser um email válido.';
'foto_perfil.required' => 'Campo foto_perfil obrigatório.';
'foto_perfil.unique' => 'Campo foto_perfil já cadastrado.';
'foto_perfil.image' => 'Campo foto_perfil precisa ser uma imagem';
'foto_perfil.mimes' => 'Campo foto_perfil precisa ser uma imagem jpg, jpeg ou png';
'foto_perfil.max' => 'Campo foto_perfil precisa ter até 2048 KB';
'password.required' => 'Campo password obrigatório.';
```

####  function failedValidation
```
response()->json($validator->errors(), 422)
```
___

## Validações com tratamento de erro e function failedValidation (UserUpdateRequest)

#### Validações

```
'name' => ['required'];
'email' => ['required', 'email'];
'foto_perfil' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'];
'password' => ['required'];
```

#### Tratamento de erro
```
'name.required' => 'Campo name obrigatório.'
'email.required' => 'Campo email obrigatório.'
'email.email' => 'Campo email precisa ser um email válido.'
'foto_perfil.required' => 'Campo foto_perfil obrigatório.'
'foto_perfil.image' => 'Campo foto_perfil precisa ser uma imagem'
'foto_perfil.mimes' => 'Campo foto_perfil precisa ser uma imagem jpg, jpeg ou png'
'foto_perfil.max' => 'Campo foto_perfil precisa ter até 2048 KB'
'password.required' => 'Campo password obrigatório.'
```

#### function failedValidation
```
response()->json($validator->errors(), 422)
```

___

## Password
#### Adicionei a função Hash para melhorar na segurança do sistema
```
$User->password = Hash::make($request->password);
```
___

## UserResource
```
'id' => $this->id
'name' => $this->name
'email' => $this->email
'foto_perfil' => $this->foto_perfil
```
___

## Image Resize e Qualidade (intervention/image)
```
$image = $request->file('foto_perfil');
$input['imagename'] = md5(time()).'.'.$image->extension();
$filePath = public_path('/profile');
$img = Image::make($image->path())->resize(200, 200); // 200 x 200 tamanho da imagem
$img->save($filePath.'/'.$input['imagename'], 70); // 70% da qualidade
