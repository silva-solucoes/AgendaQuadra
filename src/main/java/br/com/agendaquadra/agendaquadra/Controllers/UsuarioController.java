package br.com.agendaquadra.agendaquadra.Controllers;

import java.security.NoSuchAlgorithmException;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.ModelAndView;

import br.com.agendaquadra.agendaquadra.Enums.TipoAcesso;
import br.com.agendaquadra.agendaquadra.Models.Usuario;
import br.com.agendaquadra.agendaquadra.Service.ServiceExc;
import br.com.agendaquadra.agendaquadra.Service.ServiceUsuario;
import br.com.agendaquadra.agendaquadra.Util.Util;
import br.com.agendaquadra.agendaquadra.dao.UsuarioDao;
import jakarta.servlet.http.HttpSession;
import jakarta.validation.Valid;

@Controller
@Validated
public class UsuarioController {
    
    @Autowired
    private UsuarioDao usuariorepositorio;
    
    @Autowired
    private ServiceUsuario serviceUsuario;

    @GetMapping("/")
    public ModelAndView index(){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("index");
        return mv;
    }

    @GetMapping("/login")
    public ModelAndView login(){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("login");
        mv.addObject("usuario", new Usuario());
        return mv;
    }

    @GetMapping("/cadastro")
    public ModelAndView cadastro(Usuario usuario){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("cadcliente");
        mv.addObject("usuario", new Usuario());
        return mv;
    }

    @PostMapping("cadastrarUsuario")
    public ModelAndView cadastrarUsuario(Usuario usuario) throws Exception{
        ModelAndView mv = new ModelAndView();
        mv.setViewName("redirect:/cadastro");

        // Defina um valor padrão para tipoacesso, por exemplo, "Usuario"
        usuario.setTipoacesso(TipoAcesso.USUARIO);
        usuario.setAtivo(1);
        
        serviceUsuario.cadastrarUsuario(usuario);
        
        return mv;
    }

    @PostMapping("/login")
    public ModelAndView login(@Valid Usuario usuario, BindingResult br, HttpSession session) throws NoSuchAlgorithmException, ServiceExc {
        ModelAndView mv = new ModelAndView();
        mv.addObject("usuario", new Usuario());
        
        // Verifica se a senha é nula
        if (usuario.getSenha() == null) {
            mv.setViewName("/");
        }

        if (br.hasErrors()) {
            mv.setViewName("login");
            return mv;
        }

        Usuario usuarioLogin = serviceUsuario.loginUser(usuario.getEmail(), Util.md5(usuario.getSenha()));
        if (usuarioLogin == null) {
            mv.addObject("msgErro", "Usuário não encontrado. Tente novamente");
        } else {
            session.setAttribute("usuarioLogado", usuarioLogin);
            return index();
        }

        return mv;
    }

    @PostMapping("/logout")
    public ModelAndView logout(HttpSession session){
        session.invalidate();
        return index();
    }

}