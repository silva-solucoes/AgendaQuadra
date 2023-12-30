package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import br.com.agendaquadra.agendaquadra.Models.Usuarios;
import br.com.agendaquadra.agendaquadra.Repositorios.AdministradorRepo;

@Controller
public class LoginController {
    
    @Autowired
    private AdministradorRepo repo;

    @GetMapping("/login")
    public String index(){
        return "login";
    }

    @PostMapping("/verificaLogin")
    public String autenticar(Model model, Usuarios addParametros){
        String email = addParametros.getEmail();
        String senha = addParametros.getSenha();

        if (email == null || email.isEmpty()) {
            model.addAttribute("erroEmail", "Por favor, preencha o campos E-mail.");
            return "login";
        }else if(senha == null || senha.isEmpty()){
            model.addAttribute("erroSenha", "Por favor, preencha o campos Senha.");
            return "login";
        }
        Usuarios user = this.repo.Login(addParametros.getEmail(), addParametros.getSenha());
        
        if(user != null){
            return "redirect:/listaAdmin";
        }
        model.addAttribute("erro", "Usuário ou senha inválida!");
        return "login";
        
    }
}
