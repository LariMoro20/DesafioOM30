## Desafio OM30


Esta é uma aplicação de cadastro de pacientes, desenvolvida com o propósito de demonstrar conhecimentos para a empresa.
* Conhecimentos aplicados: PHP, MySQL, HTML, CSS e JavaScript;
* Frameworks aplicados: CodeIgniter 3 e Bootstrap 4;
* Biblioteca: JQuery;

Aplicação conta com:
* Cadastro de pacientes com ;
	* Foto;
    * Nome Completo*;
    * Nome Completo da Mãe*;
    * Data de Nascimento*;
    * CPF*;
    * CNS*;
    * Endereço completo*;

* Edição de pacientes;
* Visualização de pacientes;
* Máscara para CPF, CNS e Data;
* Validação de CPF;
* Validação de data;
* Busca de endereço por CEP via API ViaCEP: **https://viacep.com.br/**;

## Requerimentos

* Necessário PHP > 5.6


## Instalação

* Editar arquivo de constantes ``` aplication/config/constants.php ```
Alterar linha:

```
defined('BASE_URL') or define('BASE_URL','https://localhost/TesteOM/'); //Mudar para a pasta onde o projeto for instalado
```

* Criar banco de dados e rodar o sql presente na raiz do projeto ``` pacientes_db.sql ```

* Editar arquivo de banco de dados ``` aplication/config/database.php ```
Alterar linhas:
```
'hostname' => 'localhost',      // IP/URL do banco (localhost)
'username' => 'root',           // Usuário
'password' => '',               // Senha
'database' => 'pacientes_db',   // Nome do banco
```

Documentação CodeIgniter: **https://codeigniter.com/docs**

by Lari Moro with :heart: