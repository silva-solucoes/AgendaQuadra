package br.com.agendaquadra.agendaquadra.dao;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import br.com.agendaquadra.agendaquadra.Enums.Quadras;
import br.com.agendaquadra.agendaquadra.Models.Agenda;
import jakarta.transaction.Transactional;

public interface AgendaDao extends JpaRepository<Agenda, Integer>{
    
    List<Agenda> findByQuadra(Quadras quadra);

    @Query("SELECT a FROM Agenda a WHERE a.quadra = :quadra ORDER BY CASE WHEN a.aceito = 'Pendente' THEN 0 WHEN a.aceito = 'Aceito' THEN 1 WHEN a.aceito = 'Negado' THEN 2 ELSE 3 END, a.id DESC")
    List<Agenda> findByQuadraOrderByStatusAndIdDesc(Quadras quadra);

    @Transactional
    @Modifying
    @Query("UPDATE Agenda a SET a.aceito = 'Negado' WHERE a.id = :id AND a.aceito = 'Pendente'")
    void negarAgendamento(@Param("id") Integer id);

    @Transactional
    @Modifying
    @Query("UPDATE Agenda a SET a.aceito = 'Aceito' WHERE a.id = :id AND a.aceito = 'Pendente'")
    void aceitarAgendamento(@Param("id") Integer id);

    @Transactional
    @Modifying
    @Query("UPDATE Agenda a SET a.aceito = 'Negado' WHERE a.id = :id AND a.aceito = 'Aceito'")
    void negarAgendamento2(@Param("id") Integer id);

    @Transactional
    @Modifying
    @Query("UPDATE Agenda a SET a.aceito = 'Aceito' WHERE a.id = :id AND a.aceito = 'Negado'")
    void aceitarAgendamento2(@Param("id") Integer id);

}
