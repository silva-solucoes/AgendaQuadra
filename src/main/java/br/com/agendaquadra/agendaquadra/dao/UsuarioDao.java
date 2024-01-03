package br.com.agendaquadra.agendaquadra.dao;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import br.com.agendaquadra.agendaquadra.Enums.TipoAcesso;
import br.com.agendaquadra.agendaquadra.Models.Usuario;
import jakarta.transaction.Transactional;

public interface UsuarioDao extends JpaRepository<Usuario, Integer> {
    
    @Query("SELECT u FROM Usuario u WHERE u.email = :email")
    public Usuario findByEmail(String email);

    @Query("SELECT u FROM Usuario u WHERE u.email = :email AND u.senha = :senha")
    public Usuario buscarLogin(String email, String senha);

    List<Usuario> findByTipoacessoIn(List<TipoAcesso> tiposAcesso);

    // Método para bloquear um usuário
    @Transactional
    @Modifying
    @Query("UPDATE Usuario u SET u.ativo = 2 WHERE u.id = :id")
    void bloquearUsuario(@Param("id") Integer id);

    // Método para ativar um usuário
    @Transactional
    @Modifying
    @Query("UPDATE Usuario u SET u.ativo = 1 WHERE u.id = :id")
    void ativarUsuario(@Param("id") Integer id);

}
