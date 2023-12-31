package br.com.agendaquadra.agendaquadra.dao;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import br.com.agendaquadra.agendaquadra.Models.Usuario;

public interface UsuarioDao extends JpaRepository<Usuario, Integer> {
    
    @Query("SELECT u FROM Usuario u WHERE u.email = :email")
    public Usuario findByEmail(String email);

    @Query("SELECT u FROM Usuario u WHERE u.email = :email AND u.senha = :senha")
    public Usuario buscarLogin(String email, String senha);

}
