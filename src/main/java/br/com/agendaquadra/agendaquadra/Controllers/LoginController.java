package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import br.com.agendaquadra.agendaquadra.Models.Usuario;
import br.com.agendaquadra.agendaquadra.Repositorios.AdministradorRepo;
import jakarta.servlet.http.HttpServletResponse;

@Controller
public class LoginController {
    
    @Autowired
    private AdministradorRepo repo;

    @GetMapping("/login")
    public String index(){
        return "login";
    }

    @PostMapping("/verificaLogin")
    public String autenticar(Model model, Usuario addParametros, HttpServletResponse response){
        
        Usuario user = this.repo.Login(addParametros.getEmail(), addParametros.getSenha());
        
        if(user != null){
            return "redirect:/admin";
        }
        model.addAttribute("erro", "Usuário ou senha inválida!");
        return "login";
        
    }

    
}
