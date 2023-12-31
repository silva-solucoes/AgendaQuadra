package br.com.agendaquadra.agendaquadra.Enums;

public enum TipoAcesso {
    
    ADMINISTRADORSISTEMA("AdministradorSistema"),
    ADMINISTRADORQUADRA("AdministradorQuadra"),
    USUARIO("Usuario");

    private String tipoacesso;

    private TipoAcesso (String tipoacesso){
        this.tipoacesso = tipoacesso;
    }

}
