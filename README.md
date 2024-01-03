# Projeto de Agendamento de Quadras 2024

Este é um projeto de Agendamento de Quadras desenvolvido em Java para alunos do IFRN Campus Lajes.

## Descrição

O sistema permite aos usuários agendar quadras poliesportivas para eventos esportivos, proporcionando uma maneira eficiente de gerenciar reservas.

## Funcionalidades

- Agendamento de quadras por usuários.
- Controle de acesso com diferentes níveis de permissões (administradores e usuários regulares).
- Cadastro de usuários e administradores.
- Edição e bloqueio de usuários e administradores.
- Visualização de lista de agendamentos.

## Tecnologias Utilizadas

- Java
- Spring Framework
- Thymeleaf (para a camada de visualização)
- MySQL (ou outro banco de dados compatível)
- Bootstrap 5 (para o design responsivo)

## Pré-requisitos

- JDK (Java Development Kit) na versão 17 instalada.
- Maven para gerenciamento de dependências.
- MySQL (ou outro banco de dados compatível) instalado e configurado através do XAMPP.
- Variável de ambiente JAVA_HOME configurada.
- Crie uma base de dados no XAMPP chamada agendaquadras.

## Configuração do Banco de Dados

```properties
spring.datasource.username=[seu_usuario]
spring.datasource.password=[sua_senha]
spring.datasource.url=jdbc:mysql://localhost:3306/agendaquadras?useSSL=false&useTimezone=true&serverTimezone=UTC
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.MySQL8Dialect
spring.jpa.hibernate.ddl-auto=update

Certifique-se de substituir [seu_usuario] e [sua_senha] pelos detalhes do seu banco de dados.

## Instalação e Execução
Clone o repositório: git clone https://github.com/[seu_usuario]/agenda-quadras.git
Navegue até o diretório do projeto: cd agenda-quadras
Execute o aplicativo: mvn spring-boot:run
O aplicativo estará disponível em http://localhost:8080.

## Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir problemas ou enviar pull requests.

## Licença
Este projeto está licenciado sob a Silva Soluções Tech.
