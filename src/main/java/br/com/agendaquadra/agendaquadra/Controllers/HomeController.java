package br.com.agendaquadra.agendaquadra.Controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import br.com.agendaquadra.agendaquadra.Models.Usuarios;
import br.com.agendaquadra.agendaquadra.Repositorios.AdministradorRepo;

@Controller
public class HomeController {

    @Autowired
    private AdministradorRepo repo;

    @GetMapping("/")
    public String home() {
        return "index";
    }

    @GetMapping("/login")
    public String login(){
        return "login";
    }

    @GetMapping("/cadcliente")
    public String cadastrar(){
        return "cadcliente";
    }

    /**
     * @param model
     * @return
     */
    @GetMapping("/admin")
    public String admin(Model model){
        List<Usuarios> usuarios = (List<Usuarios>)repo.findAll();
        model.addAttribute("usuarios", usuarios);
        return "listaAdmin";
    }
}