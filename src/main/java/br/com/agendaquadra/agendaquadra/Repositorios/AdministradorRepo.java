package br.com.agendaquadra.agendaquadra.Repositorios;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import br.com.agendaquadra.agendaquadra.Models.Usuario;

public interface AdministradorRepo extends CrudRepository<Usuario, Integer>{

    @Query(value = "SELECT * FROM usuario WHERE email = :email AND senha = :senha", nativeQuery = true)
    public Usuario Login(String email, String senha);
    
}
