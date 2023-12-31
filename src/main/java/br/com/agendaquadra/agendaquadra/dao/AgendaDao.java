package br.com.agendaquadra.agendaquadra.dao;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.agendaquadra.agendaquadra.Models.Agenda;

public interface AgendaDao extends JpaRepository<Agenda, Integer>{
    
}