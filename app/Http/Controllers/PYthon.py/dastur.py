class ToqOrindaMatn:
    def __init__(self, matn):
        self.matn = matn

    def ajratib_yozish(self):
        toq_harf = ''
        juft_harf = ''
        for indeks, harf in enumerate(self.matn):
            if indeks % 2 == 0:
                toq_harf += harf
            else:
                juft_harf += harf
        ajratib_yozilgan_matn = toq_harf + ' ' + juft_harf
        return ajratib_yozilgan_matn

# Matn kiriting
matn = input("Matnni kiriting: ")

# Sinfga doir nusxa yaratish
matn_sinfi = ToqOrindaMatn(matn)

# Ajratib yozilgan matnni chiqarish
print("Ajratib yozilgan matn:", matn_sinfi.ajratib_yozish())
