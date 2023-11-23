package com.webspring.hello.controller;



import com.webspring.hello.service.NasabahService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class HelloController {

    @Autowired
    private NasabahService nasabahService;

    @GetMapping("/hello")
    public String hello(Model model) {
        model.addAttribute("nasabah", new com.webspring.hello.entity.Nasabah());
        return "form";
    }

    @PostMapping("/submit")
    public String kirimFormulir(com.webspring.hello.entity.Nasabah nasabah) {
        nasabahService.simpanNasabah(nasabah);
        return "sukses"; 
    }
}
