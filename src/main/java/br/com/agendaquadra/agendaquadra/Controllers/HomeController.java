package br.com.agendaquadra.agendaquadra.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {

    @GetMapping("/home")
    public String home() {
        return "home/index"; // Isso assume que você tem uma página chamada "home" (home.jsp, home.html, etc.) na pasta resources/templates
    }
}