package br.com.agendaquadra.agendaquadra.Repositorios;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import br.com.agendaquadra.agendaquadra.Models.Usuarios;

public interface AdministradorRepo extends CrudRepository<Usuarios, Integer>{

    @Query(value = "SELECT * FROM tbl_usuarios WHERE email = :email AND senha = :senha", nativeQuery = true)
    public Usuarios Login(String email, String senha);
    
}
