package com.webspring.hello.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.webspring.hello.entity.Nasabah;

@Repository
public interface NasabahRepository extends JpaRepository<Nasabah, Long> {
    // ...
}
