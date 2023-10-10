#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>
#include "buku.h"

int main()
{
	do
	{
		system("cls");
		printf("======SELAMAT DATANG DI PERPUSTAKAAN======\n");
		printf("==========================================\n");
		printf("\n\n");
		printf("		Menu Pilihan			  \n");
		printf("========================================\n\n");
		printf("\t\tAnda Masuk Sebagai : ");
		printf("\n\t\t1. Petugas Perpustakaan\n\t\t2. Pengunjung Perpustakaan\n");
		printf("Pilihan : "); scanf("%d",&pil);
		if(pil==1){
			btt:
			system("cls");
			printf("Username\t: "); scanf("%s",&user);
			printf("Password\t: "); scanf("%s",&pass);
			if(strcmp(user,"aaa")==0&&strcmp(pass,"123")==0)
			{
				do{
					system("cls");
					printf("\tMenu Pilihan			\n");
					printf("==============================\n\n");
					printf("\t1.Input Data Buku\n\t2.Lihat Data Buku\n\t3.Data Pinjaman\n\t4.Data Pengembalian\n\t5.Exit\n");
					printf("Pilihan : "); scanf("%d",&pil1);
					switch(pil1){
						case 1 :
							input();
							system("pause");
							break;
						case 2 :
							lihat();
							system("pause");
							break;
						case 3 :
							datapinjam();
							system("pause");
							break;
						case 4 :
							datakembali();
							system("pause");
							break;
						case 5 :
							break;	
					}
				}while(pil1!=5);
			}
		else{
			system("cls");
			printf("Username dan Password SALAH!\n\n");
			system("pause");
			goto btt;
		}
	}
	else if (pil==2){
		do{
			system("Pause");
			system("cls");
			printf("\t Menu Pilihan			\n");
			printf("==============================\n\n");
			printf("\t1.List Buku\n\t2.Cari Buku\n\t3.Peminjaman Buku\n\t4.Pengembalian Buku\n\t5.Exit\n");
			printf("Pilihan : "); scanf("%d",&pil2);
			switch(pil2){
				case 1 :
					lihat();
					break;
				case 2 :
					cari();
					break;
				case 3 :
					pinjam();
					break;
				case 4 :
					kembali();
					break;
				case 5 :
					break;
			}
		} while(pil2!=5);
	}
}while(pil!=3);
return 0;
}
