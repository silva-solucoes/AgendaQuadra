package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.ModelAndView;

import br.com.agendaquadra.agendaquadra.Models.Agenda;
import br.com.agendaquadra.agendaquadra.dao.AgendaDao;

@Controller
public class AgendaController {
    
    @Autowired
    private AgendaDao agendamentoRepo;

    @GetMapping("/agendamento")
    public ModelAndView agendamento(Agenda agenda){
        ModelAndView mv = new ModelAndView();
        mv.addObject("agenda", new Agenda());
        mv.setViewName("agendamento");
        return mv;
    }

    @PostMapping("cadastrarAgendamento")
    public ModelAndView cadastrarAgenda(Agenda agenda){
        ModelAndView mv = new ModelAndView();
        agenda.setAceito("Pendente");
        agendamentoRepo.save(agenda);
        mv.setViewName("redirect:/agendamento");
        return mv;
    }

}