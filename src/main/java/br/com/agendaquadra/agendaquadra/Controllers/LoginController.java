package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
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

    private final BCryptPasswordEncoder passwordEncoder;

    public LoginController(BCryptPasswordEncoder passwordEncoder) {
        this.passwordEncoder = passwordEncoder;
    }

    @GetMapping("/login")
    public String index(){
        return "login";
    }

    @PostMapping("/verificaLogin")
    public String autenticar(Model model, Usuarios addParametros){

        String senhaCriptografada = passwordEncoder.encode(addParametros.getSenha());
        
        Usuarios user = this.repo.Login(addParametros.getEmail(), senhaCriptografada);
        
        if(user != null){
            return "redirect:/admin";
        }
        model.addAttribute("erro", "Usuário ou senha inválida!");
        return "login";
        
    }
}
