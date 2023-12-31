package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.ModelAndView;

import br.com.agendaquadra.agendaquadra.Enums.TipoAcesso;
import br.com.agendaquadra.agendaquadra.Models.Usuario;
import br.com.agendaquadra.agendaquadra.dao.UsuarioDao;

@Controller
public class UsuarioController {
    
    @Autowired
    private UsuarioDao usuariorepositorio;

    @GetMapping("/cadastro")
    public ModelAndView cadastro(Usuario usuario){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("cadcliente");
        mv.addObject("usuario", new Usuario());
        return mv;
    }

    @PostMapping("cadastrarUsuario")
    public ModelAndView cadastrarUsuario(Usuario usuario){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("redirect:/cadcliente");
        // Defina um valor padrão para tipoacesso, por exemplo, "Usuario"
        usuario.setTipoacesso(TipoAcesso.USUARIO);
        usuario.setAtivo(1);
        usuariorepositorio.save(usuario);
        return mv;
    }


}
