package br.com.agendaquadra.agendaquadra.Controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import br.com.agendaquadra.agendaquadra.Models.Usuario;
import br.com.agendaquadra.agendaquadra.Repositorios.AdministradorRepo;

@Controller
public class HomeController {

    @Autowired
    private AdministradorRepo repo;

    @GetMapping("/")
    public String home() {
        return "index";
    }

    @GetMapping("/cadcliente")
    public String cadastrar(){
        return "cadcliente";
    }

    @GetMapping("/agendamento")
    public String agendamento() {
        return "agendamento";
    }

    /**
     * @param model
     * @return
     */
    @GetMapping("/admin")
    public String admin(Model model){
        List<Usuario> usuarios = (List<Usuario>)repo.findAll();
        model.addAttribute("usuarios", usuarios);
        return "listaAdmin";
    }
}