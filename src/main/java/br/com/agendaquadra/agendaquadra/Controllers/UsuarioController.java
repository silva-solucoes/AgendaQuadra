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

    @GetMapping("/admin")
    public ModelAndView admin(){
        ModelAndView mv = new ModelAndView();
        mv.setViewName("admin/index");
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
        try {
            if (usuariorepositorio.findByEmail(usuario.getEmail()) != null) {
                // E-mail já existe, retorna para /cadastro com a mensagem de erro
                mv.setViewName("redirect:/cadastro");
                mv.addObject("emailErro", "Já existe um e-mail cadastrado para: " + usuario.getEmail());
                return mv;
            }
    
            usuario.setSenha(Util.md5(usuario.getSenha()));
        } catch (NoSuchAlgorithmException e) {
            // Tratamento para erro na criptografia da senha
            mv.setViewName("redirect:/cadastro");
            mv.addObject("msgErro", "Erro na criptografia da senha");
            return mv;
        }
        
        // Defina um valor padrão para tipoacesso, por exemplo, "Usuario"
        usuario.setTipoacesso(TipoAcesso.USUARIO);
        usuario.setAtivo(1);
        // Se não houver erros, salva o usuário e redireciona para /login
        usuariorepositorio.save(usuario);
        mv.setViewName("redirect:/login");
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

            // Verifica o tipo de acesso do usuário
            if (usuarioLogin.getTipoacesso() == TipoAcesso.USUARIO) {
                return index();
            } else if (usuarioLogin.getTipoacesso() == TipoAcesso.ADMINISTRADORSISTEMA) {
                return admin();
            }
        }

        return mv;
    }

    @PostMapping("/logout")
    public ModelAndView logout(HttpSession session){
        session.invalidate();
        return index();
    }

}
