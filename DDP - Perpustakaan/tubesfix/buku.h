#ifndef buku_h
#define buku_h

#include <stdio.h>
#include <conio.h>
#include <string.h>
#include <stdlib.h>
#include <windows.h>


typedef struct { char kode[10], judul [50], letak [2]; 
				 int stok;  } data;
				 
typedef struct { char nama[20], judul [50]; 
				 int nim, jumlah, minjam, biaya; } minjam;
					 
typedef struct { char nama[20], judul [50]; 
				 int nim, jumlah, minjam, biaya; } book;

data perpus;
minjam buku;
book balik;

char kode,jd[100],user[10],pass[10],yt;
int pil,pil1,pil2,pil3,cuy,x,i,j,hari,bayar,jml;

void input();
void lihat();
void cari();
void pinjam();
int kembali();
void datapinjam();
void datakembali();

#endif
