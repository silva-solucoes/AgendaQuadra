package br.com.agendaquadra.agendaquadra.Service;

import java.security.NoSuchAlgorithmException;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.agendaquadra.agendaquadra.Exceptions.CriptoExistException;
import br.com.agendaquadra.agendaquadra.Exceptions.EmailExistsException;
import br.com.agendaquadra.agendaquadra.Models.Usuario;
import br.com.agendaquadra.agendaquadra.Util.Util;
import br.com.agendaquadra.agendaquadra.dao.UsuarioDao;

@Service
public class ServiceUsuario {
    
    @Autowired
    private UsuarioDao repositorioUsuario;

    public void cadastrarUsuario(Usuario usuario) throws Exception{
        try {
            
            if(repositorioUsuario.findByEmail(usuario.getEmail()) != null){
                throw new EmailExistsException("Já existe um email cadastrado para: "+usuario.getEmail());
            }

            usuario.setSenha(Util.md5(usuario.getSenha()));

        } catch (NoSuchAlgorithmException e) {
            throw new CriptoExistException("Erro na criptografia da senha");

        }

        repositorioUsuario.save(usuario);
    }

    public Usuario loginUser(String email, String senha) throws ServiceExc{

        Usuario usuarioLogin = repositorioUsuario.buscarLogin(email, senha);
        return usuarioLogin;

    }

}
