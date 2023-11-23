package com.webspring.hello.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import java.util.Date;

@Entity
@Table(name = "mst_cifpersnl")
public class Nasabah {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long cifId;
    private String fullNm;
    private String preDegree;
    private String postDegree;
    private String sureNm;
    private String monthRnm;
    private Character religionId;
    private Character marriageId;
    private String lastdueId;
    private String npwp;
    private Date brtdt;
    private String brtPlace;
    private Character typeId;
    private String idnBr;
    private String addr;
    private String rt;
    private String rw;
    private String kelNm;
    private String postalCode;
    private String kecNm;
    private String cityId;
    private String provId;
    private String countryId;
    private String noTelp;
    private String noFax;
    private Date expdate;
    private Short stsnation;
    private Short sex;
    private String nohp;
    private String bloodType;
    private String hobby;
    private Short insured;
    private Short homeId;
    private String ownid;
    private String alias;
    private Short flgCitizen;
    private String note;
    private String nip;
    private String jobid;

    
}
