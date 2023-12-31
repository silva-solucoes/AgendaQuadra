package br.com.agendaquadra.agendaquadra.Enums;

public enum Esportes {
    
    BASQUETE("Basquete"),
    VOLEI("Volei"),
    FUTEBOL("Futebol"),
    HANDEBOL("Handebol");

    private String esporte;

    private Esportes(String esporte){
        this.esporte = esporte;
    }
}
