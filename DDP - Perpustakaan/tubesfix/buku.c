#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>
#include "buku.h"


void input(){
	system("cls");
	FILE*fp;
	fp=fopen("Data_buku.txt","a");
	printf("		Input Data Buku			\n");
	printf("==============================\n\n");
	if(fp == NULL){
		printf("File tidak dapat dibuka\n");
	}else{
		int a = 1, b;
		printf(" Masukkan jumlah data yang akan ditambahkan : "); scanf("%d", &b);
		while(a <= b){
			fflush(stdin);
			printf(" Kode Buku\t: "); gets(perpus.kode);
			printf(" Judul Buku\t: "); gets(perpus.judul);
			printf(" Letak Buku\t: "); scanf ("%s", &perpus.letak);
			printf(" Stok Buku \t: "); scanf ("%d", &perpus.stok);
			fwrite(&perpus, sizeof(perpus), 1, fp);
			a++;
		}	
	}
	fclose(fp);
}

void lihat()
{
	system("cls");
	FILE *fptr;
	if ((fptr=fopen("Data_buku.txt", "r"))==NULL)
		{
			printf ("File tidak dapat dibuka\n");
		exit(1);
		}
		printf("\t|==================================================================================|\n");
		printf("\t|					LIST BUKU				   |\n");
		printf("\t|==================================================================================|\n");
		printf("\t|Kode buku\t\tJudul Buku\t\tStok Buku\t\tLetak buku |\n");
		printf("\t|==================================================================================|\n");
		while (fread(&perpus, sizeof(perpus), 1, fptr))
			{
				//fscanf(fptr,"%s %s %d %s", &perpus.kode, &perpus.judul, &perpus.stok, &perpus.letak);
				printf("\t|   %-20s %-25s %-25d %-5s |\n", perpus.kode, perpus.judul, perpus.stok, perpus.letak);
			}
	fclose(fptr);
}

void cari (){
	system("cls");
	char s_judul[20];
	int isFound=0;
	FILE *fp;
	fp = fopen("Data_buku.txt","a+");
	
	printf("		Cari Data Buku			\n");
	printf("==============================\n\n");
	printf("Masukkan Judul :");  fflush(stdin); gets(s_judul);
	while(fread(&perpus, sizeof(perpus), 1, fp)==1)
	{
		if((strcmp(s_judul ,perpus.judul)==0))
		{
			isFound = 1;
			break;
		}
	}
	if(isFound == 1){
		printf(" Data ditemukan...\n");
		printf(" Kode buku\t : %s \n", perpus.kode);
		printf(" Judul buku\t : %s\n", perpus.judul);
		printf(" Stok buku\t : %d \n", perpus.stok);
		printf(" Letak buku\t : %s\n", perpus.letak);
	} else {
		printf("Maaf, data tidak ditemukan...\n");
	}
	fclose(fp);
	return;
}

void pinjam(){
	pinjem:
	system("cls");
	char s_judul[100];
	FILE*fp;
	FILE*fptr;
	fp=fopen("Data_buku.txt","r+");
	fptr=fopen("Data_pinjam.txt","a");
	
	printf("		Menu Pinjaman			\n");
	printf("==============================\n\n");
	printf("Nama Peminjam \t\t\t: "); scanf("%s",&buku.nama);fflush(stdin);
	printf("NIM Peminjam \t\t\t: "); scanf("%d",&buku.nim);fflush(stdin);
	printf("Masukkan Judul Buku \t\t: "); 
	scanf("%s",&s_judul); fflush(stdin);
	
		while (fread(&perpus, sizeof(perpus), 1, fp)==1)
			{
				if((strcmp(s_judul, perpus.judul)==0)){
					printf("Judul buku\t\t\t: %s\n",perpus.judul);
					strcpy(buku.judul, perpus.judul);
					printf("Stok buku\t\t\t: %d\n",perpus.stok);
					break;
				}
			}
			
	printf("Jumlah dipinjam\t\t\t: ");  scanf("%d",&jml);fflush(stdin);
	buku.jumlah=jml;
		if(perpus.stok>jml){
			perpus.stok-jml;
			}
				else {
				goto pinjem;
				system("pause");
				printf("Stok tidak mencukupi\n");
				}	
	printf("Lama Meminjam\t\t\t: "); scanf("%d",&hari,&buku.minjam);fflush(stdin);
	buku.minjam=hari;
//	fprintf(fptr,"%d\t",buku.minjam);
	
	bayar=hari*500*jml;
//	printf("Biaya yang dibayarkan\t\t: Rp %d\n",bayar); 
	buku.biaya=bayar;
//	fprintf(fptr,"%d\t",buku.biaya);
	
	printf("Data Berhasil diinput!");
	
	fwrite(&buku, sizeof(buku), 1, fptr);
	fclose(fp);
	fclose(fptr);
	
	return;
}

int kembali (){
	system("cls");
	char nama[50];
	int is_found, uang, biaya, kembali;
	FILE*fp;
	FILE*fptr;
	fp=fopen("Data_pinjam.txt","r+");
	fptr=fopen("Data_kembali.txt","a");
	
	printf("		Menu Pengembalian		\n");
	printf("================================\n\n");
	printf("Nama Peminjam\t\t\t: "); fflush(stdin);
	scanf("%s", &nama);
		while (fread(&buku, sizeof(buku), 1, fp)==1)
		{
			if((strcmp(nama, buku.nama)==0)){
				is_found=1;
				break;
			}
		}
		if(is_found==1){
				printf("Nama Peminjam\t\t\t: %s\n", buku.nama);
				strcpy(balik.nama, buku.nama);
				printf("NIM Peminjam\t\t\t: %d\n", buku.nim);
				balik.nim=buku.nim;
				printf("Judul Buku\t\t\t: %s\n", buku.judul);
				strcpy(balik.judul, buku.judul);
				printf("JUmlah dipinjam\t\t\t: %d\n", buku.jumlah);
				balik.jumlah=buku.jumlah;
				printf("Lama Meminjam\t\t\t: %d\n", buku.minjam);
				balik.minjam=buku.minjam;
				printf("Biaya yang dibayarkan\t\t: Rp %d\n", buku.biaya);
				balik.biaya=buku.biaya;
		}
		uang:
		printf("Masukkan jumlah uang\t\t: \n"); scanf("%d", &uang);
		if(uang > buku.biaya)
		{
			kembali = uang - buku.biaya;
			printf("Kembalian : %d\n", kembali);
		}
		else if (uang == buku.biaya)
		{
			printf("\n Terimakasih!\n");
			
		} else {
			printf("\n Uang tidak cukup!\n");
			goto uang;	
		}
//		
//		printf("Data Berhasil di input!");
		fwrite(&balik, sizeof(balik), 1, fptr);
		fclose(fp);
		fclose(fptr);
		return;
}

void datapinjam(){
	system("cls");
	FILE *fptr;
	if ((fptr=fopen("Data_pinjam.txt", "r"))==NULL)
		{
			printf ("File tidak dapat dibuka\n");
		exit(1);
		}
		printf("\t|==================================================================================|\n");
		printf("\t|				DATA PEMINJAM BUKU				   |\n");
		printf("\t|==================================================================================|\n");
		printf("\t|  Nama\t\tNIM\t\tJudul Buku\tJumlah buku\tLama pinjam\t   |\n");
		printf("\t|==================================================================================|\n");
		while (fread(&buku, sizeof(buku), 1, fptr))
			{
				//fscanf(fptr,"%s %d %s %d %d %d", &buku.nama, &buku.nim, &buku.judul, &buku.jumlah, &buku.minjam, &buku.biaya);
				printf("\t|%8s %13d %13s %13d %18d\t\t   |\n", buku.nama, buku.nim, buku.judul, buku.jumlah, buku.minjam);
			}
	fclose(fptr);
}


void datakembali(){
	system("cls");
	FILE *fptr;
	if ((fptr=fopen("Data_kembali.txt", "r"))==NULL)
		{
			printf ("File tidak dapat dibuka\n");
		exit(1);
		}
		printf("\t|========================================================================================|\n");
		printf("\t|				DATA PEMINJAM BUKU				         |\n");
		printf("\t|========================================================================================|\n");
		printf("\t|  Nama\t\tNIM\tJudul Buku\tJumlah buku\tLama pinjam\tBiaya pinjam\t |\n");
		printf("\t|========================================================================================|\n");
		while (fread(&balik, sizeof(balik), 1, fptr))
			{
				//fscanf(fptr,"%s %d %s %d %d %d", &buku.nama, &buku.nim, &buku.judul, &buku.jumlah, &buku.minjam, &buku.biaya);
				printf("\t|%7s %13d %10s %13d %18d %18d\t |\n", balik.nama, balik.nim, balik.judul, balik.jumlah, balik.minjam, balik.biaya);
			}
	fclose(fptr);
}
