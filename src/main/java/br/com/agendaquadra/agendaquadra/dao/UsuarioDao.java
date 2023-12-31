package br.com.agendaquadra.agendaquadra.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.agendaquadra.agendaquadra.Models.Usuario;

public interface UsuarioDao extends JpaRepository<Usuario, Integer> {
    
}
