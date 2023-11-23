package com.webspring.hello.service;

import com.webspring.hello.entity.Nasabah;
import com.webspring.hello.repository.NasabahRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class NasabahService {

    @Autowired
    private NasabahRepository nasabahRepository;

    public void simpanNasabah(Nasabah nasabah) {
        nasabahRepository.save(nasabah);
    }
}
