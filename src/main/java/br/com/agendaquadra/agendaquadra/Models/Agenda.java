package br.com.agendaquadra.agendaquadra.Models;

import java.time.LocalDate;

import br.com.agendaquadra.agendaquadra.Enums.Esportes;
import br.com.agendaquadra.agendaquadra.Enums.Quadras;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "agendamento")
public class Agenda {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private int id;

    @Column(name = "dia", nullable = false)
    private LocalDate dia;

    @Column(name = "quadra", length = 40, nullable = false)
    //@Enumerated(EnumType.STRING)
    private Quadras quadra;

    @Column(name = "atividade", length = 40, nullable = false)
    @Enumerated(EnumType.STRING)
    private Esportes atividade;

    @Column(name = "aceito", length = 40, nullable = false)
    private String aceito;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public LocalDate getDia() {
        return dia;
    }

    public void setDia(LocalDate dia) {
        this.dia = dia;
    }

    public Quadras getQuadra() {
        return quadra;
    }

    public void setQuadra(Quadras quadra) {
        this.quadra = quadra;
    }

    public Esportes getAtividade() {
        return atividade;
    }

    public void setAtividade(Esportes atividade) {
        this.atividade = atividade;
    }

    public String getAceito() {
        return aceito;
    }

    public void setAceito(String aceito) {
        this.aceito = aceito;
    }
    
}
